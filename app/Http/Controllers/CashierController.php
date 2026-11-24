<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CashierController extends Controller
{
    /**
     * Display bills and cashier summary.
     */
   
/**
 * Display bills and cashier summary.
 */
public function index(Request $request)
{
    // Patient search
    $search = trim($request->input('search', ''));

    // Get pending bills
    $billsQuery = Bill::with('patient')
        ->where('status', 'Pending');

    // Search by patient name or patient ID
    if ($search !== '') {
        $billsQuery->whereHas('patient', function ($query) use ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('patient_id', 'like', "%{$search}%");
        });
    }

    $bills = $billsQuery->latest()->get();

    // Summary cards
    $totalBills = Bill::where('status', '!=', 'Cancelled')
        ->sum('amount');

    $totalCollections = Payment::sum('amount_paid');

    $pendingBills = Bill::where('status', 'Pending')
        ->count();

    $todayCollections = Payment::whereDate(
        'payment_date',
        today()
    )->sum('amount_paid');

    return view('cashier.index', compact(
        'bills',
        'totalBills',
        'totalCollections',
        'pendingBills',
        'todayCollections',
        'search'
    ));
}


    /**
     * Display a bill and its payment history.
     */
    public function show(string $id)
    {
        $bill = Bill::with([
            'patient',
            'payments.cashier',
        ])->findOrFail($id);

        $totalPaid = $bill->payments->sum('amount_paid');

        $remainingBalance = max(
            0,
            (float) $bill->amount - (float) $totalPaid
        );

        return view('cashier.show', compact(
            'bill',
            'totalPaid',
            'remainingBalance'
        ));
    }

    /**
     * Process a payment for a bill.
     */
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'amount_paid' => [
                'required',
                'numeric',
                'gt:0',
                'decimal:0,2',
            ],

            'payment_method' => [
                'required',
                'in:Cash,GCash,Bank Transfer',
            ],

            'reference_number' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        if (
            in_array(
                $validated['payment_method'],
                ['GCash', 'Bank Transfer'],
                true
            ) &&
            empty($validated['reference_number'])
        ) {
            throw ValidationException::withMessages([
                'reference_number' =>
                    'Please provide the reference number for this payment method.',
            ]);
        }

        $payment = DB::transaction(function () use (
            $id,
            $validated
        ) {
            $bill = Bill::whereKey($id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($bill->status === 'Cancelled') {
                throw ValidationException::withMessages([
                    'amount_paid' =>
                        'Cannot accept payment for a cancelled bill.',
                ]);
            }

            $totalPaid = (float) Payment::where(
                'bill_id',
                $bill->id
            )->sum('amount_paid');

            $remainingBalance = round(
                (float) $bill->amount - $totalPaid,
                2
            );

            $amountPaid = round(
                (float) $validated['amount_paid'],
                2
            );

            if ($remainingBalance <= 0) {
                throw ValidationException::withMessages([
                    'amount_paid' =>
                        'This bill has already been fully paid.',
                ]);
            }

            if ($amountPaid > $remainingBalance) {
                throw ValidationException::withMessages([
                    'amount_paid' =>
                        'Payment cannot exceed the remaining balance of ₱'
                        . number_format($remainingBalance, 2) . '.',
                ]);
            }

            $payment = Payment::create([
                'bill_id' => $bill->id,

                'receipt_number' => 'RCT-'
                    . now()->format('YmdHis')
                    . '-'
                    . Str::upper(Str::random(6)),

                'amount_paid' => $amountPaid,

                'payment_method' =>
                    $validated['payment_method'],

                'reference_number' =>
                    $validated['reference_number'] ?? null,

                'received_by' => Auth::id(),

                'payment_date' => now(),
            ]);

            $newTotalPaid = round(
                $totalPaid + $amountPaid,
                2
            );

            if ($newTotalPaid >= (float) $bill->amount) {
                $bill->update([
                    'status' => 'Paid',
                    'payment_date' => now()->toDateString(),
                ]);
            }

            return $payment;
        });

        return redirect()
            ->route('cashier.receipt', $payment->id)
            ->with('success', 'Payment successfully recorded!');
    }

    /**
     * Display a payment receipt.
     */
    public function receipt(string $id)
    {
        $payment = Payment::with([
            'bill.patient',
            'cashier',
        ])->findOrFail($id);

        return view('cashier.receipt', compact('payment'));
    }

    /**
     * Display payment history.
     */
    public function history()
    {
        $payments = Payment::with([
            'bill.patient',
            'cashier',
        ])
        ->latest('payment_date')
        ->get();

        return view('cashier.history', compact('payments'));
    }
}

