<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class BillController extends Controller
{

public function index(\Illuminate\Http\Request $request)
{
    $search = trim($request->input('search', ''));

    // Pending bills with patient information
    $billsQuery = \App\Models\Bill::with('patient')
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

    // Dashboard summary
    $totalBills = \App\Models\Bill::where('status', '!=', 'Cancelled')
        ->sum('amount');

    $totalCollections = \App\Models\Payment::sum('amount_paid');

    $pendingBills = \App\Models\Bill::where('status', 'Pending')
        ->count();

    $todayCollections = \App\Models\Payment::whereDate('payment_date', today())
        ->sum('amount_paid');

    return view('cashier.index', compact(
        'bills',
        'totalBills',
        'totalCollections',
        'pendingBills',
        'todayCollections',
        'search'
    ));
}


    public function create()
    {
        $patients = Patient::all();

        $appointments = Appointment::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        $medicalRecords = MedicalRecord::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        return view('bills.create', compact(
            'patients',
            'appointments',
            'medicalRecords'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'medical_record_id' => 'nullable|exists:medical_records,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Paid,Cancelled',
            'payment_date' => 'nullable|date',
        ]);

        Bill::create($validated);

        return redirect()
            ->route('bills.index')
            ->with('success', 'Bill successfully added!');
    }

    public function show(string $id)
    {
        $bill = Bill::with([
            'patient',
            'appointment',
            'medicalRecord'
        ])
        ->findOrFail($id);

        return view('bills.show', compact('bill'));
    }

    public function edit(string $id)
    {
        $bill = Bill::findOrFail($id);

        $patients = Patient::all();

        $appointments = Appointment::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        $medicalRecords = MedicalRecord::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        return view('bills.edit', compact(
            'bill',
            'patients',
            'appointments',
            'medicalRecords'
        ));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'medical_record_id' => 'nullable|exists:medical_records,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Paid,Cancelled',
            'payment_date' => 'nullable|date',
        ]);

        $bill = Bill::findOrFail($id);

        $bill->update($validated);

        return redirect()
            ->route('bills.index')
            ->with('success', 'Bill successfully updated!');
    }

    public function destroy(string $id)
    {
        $bill = Bill::findOrFail($id);

        $bill->delete();

        return redirect()
            ->route('bills.index')
            ->with('success', 'Bill successfully deleted!');
    }
}