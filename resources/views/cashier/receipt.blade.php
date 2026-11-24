<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Payment Receipt | Clinic Management System</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    @media print {
        body {
            background: white !important;
        }

        .no-print {
            display: none !important;
        }

        .receipt-card {
            box-shadow: none !important;
            border: none !important;
            max-width: 100% !important;
            margin: 0 !important;
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    }
</style>


</head>

<body class="min-h-screen bg-slate-100 text-slate-800">


@php
    $bill = $payment->bill;
    $patient = $bill?->patient;

    $totalBill = (float) ($bill?->amount ?? 0);

    $totalPaid = (float) \App\Models\Payment::where(
        'bill_id',
        $payment->bill_id
    )->sum('amount_paid');

    $remainingBalance = max(0, $totalBill - $totalPaid);
@endphp

<!-- Top Navigation -->
<header class="no-print border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-5xl flex-col gap-4 px-4 py-5
                sm:flex-row sm:items-center sm:justify-between">

        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center
                        rounded-xl bg-blue-600 text-white">
                <i class="fa-solid fa-hospital text-xl"></i>
            </div>

            <div>
                <h1 class="text-lg font-bold text-slate-900">
                    Clinic Management System
                </h1>

                <p class="text-sm text-slate-500">
                    Cashier Payment Receipt
                </p>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">

            <a href="{{ route('cashier.index') }}"
               class="inline-flex items-center gap-2 rounded-lg
                      border border-slate-300 bg-white px-4 py-2.5
                      text-sm font-semibold text-slate-700
                      transition hover:bg-slate-50">

                <i class="fa-solid fa-arrow-left"></i>
                Dashboard
            </a>

            <button onclick="window.print()"
                    class="inline-flex items-center gap-2 rounded-lg
                           bg-blue-600 px-4 py-2.5 text-sm
                           font-semibold text-white transition
                           hover:bg-blue-700">

                <i class="fa-solid fa-print"></i>
                Print Receipt
            </button>

        </div>
    </div>
</header>

<!-- Receipt -->
<main class="mx-auto max-w-5xl px-4 py-8 sm:px-6">

    @if(session('success'))
        <div class="no-print mb-6 rounded-xl border border-green-200
                    bg-green-50 p-4 text-sm font-medium text-green-700">

            <i class="fa-solid fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="receipt-card mx-auto max-w-3xl overflow-hidden
                rounded-2xl border border-slate-200 bg-white shadow-lg">

        <!-- Receipt Header -->
        <div class="border-b border-slate-200 px-6 py-8 sm:px-10">

            <div class="flex flex-col gap-6 sm:flex-row
                        sm:items-start sm:justify-between">

                <div>
                    <div class="mb-4 flex items-center gap-3">
                        <div class="flex h-14 w-14 items-center
                                    justify-center rounded-2xl
                                    bg-blue-600 text-white">
                            <i class="fa-solid fa-hospital text-2xl"></i>
                        </div>

                        <div>
                            <h2 class="text-xl font-extrabold
                                       text-slate-900">
                                CLINIC
                            </h2>

                            <p class="text-sm font-semibold
                                      tracking-widest text-blue-600">
                                MANAGEMENT SYSTEM
                            </p>
                        </div>
                    </div>

                    <p class="text-sm text-slate-500">
                        Official Payment Receipt
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Please keep this receipt for your records.
                    </p>
                </div>

                <div class="sm:text-right">
                    <span class="inline-flex items-center gap-2
                                 rounded-full bg-green-100 px-3 py-1.5
                                 text-xs font-bold text-green-700">

                        <i class="fa-solid fa-circle-check"></i>
                        PAYMENT RECORDED
                    </span>

                    <p class="mt-4 text-sm text-slate-500">
                        Receipt Number
                    </p>

                    <p class="mt-1 break-all text-lg font-extrabold
                              text-blue-700">
                        {{ $payment->receipt_number }}
                    </p>

                    <p class="mt-2 text-sm text-slate-500">
                        Payment Date
                    </p>

                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $payment->payment_date
                            ? $payment->payment_date->format('F d, Y')
                            : 'N/A' }}
                    </p>

                    <p class="text-sm text-slate-500">
                        {{ $payment->payment_date
                            ? $payment->payment_date->format('h:i A')
                            : '' }}
                    </p>
                </div>

            </div>
        </div>

        <!-- Patient and Payment Information -->
        <div class="grid grid-cols-1 gap-8 border-b border-slate-200
                    px-6 py-8 sm:grid-cols-2 sm:px-10">

            <!-- Patient -->
            <section>
                <h3 class="mb-4 flex items-center gap-2
                           text-sm font-bold uppercase
                           tracking-wider text-slate-500">

                    <i class="fa-solid fa-user text-blue-600"></i>
                    Patient Information
                </h3>

                <p class="text-lg font-bold text-slate-900">
                    {{ $patient->first_name ?? '' }}
                    {{ $patient->last_name ?? '' }}
                </p>

                <div class="mt-3 space-y-2 text-sm">

                    <p>
                        <span class="text-slate-500">Patient ID:</span>

                        <span class="ml-1 font-semibold text-slate-800">
                            {{ $patient->patient_id ?? 'N/A' }}
                        </span>
                    </p>

                    <p>
                        <span class="text-slate-500">Bill Number:</span>

                        <span class="ml-1 font-semibold text-slate-800">
                            BILL-{{ str_pad($payment->bill_id, 5, '0', STR_PAD_LEFT) }}
                        </span>
                    </p>

                </div>
            </section>

            <!-- Payment -->
            <section>
                <h3 class="mb-4 flex items-center gap-2
                           text-sm font-bold uppercase
                           tracking-wider text-slate-500">

                    <i class="fa-solid fa-money-bill-wave text-blue-600"></i>
                    Payment Information
                </h3>

                <div class="space-y-3 text-sm">

                    <div>
                        <p class="text-slate-500">Payment Method</p>

                        <p class="mt-1 font-bold text-slate-900">
                            {{ $payment->payment_method }}
                        </p>
                    </div>

                    @if($payment->reference_number)
                        <div>
                            <p class="text-slate-500">Reference Number</p>

                            <p class="mt-1 break-all font-semibold
                                      text-slate-900">
                                {{ $payment->reference_number }}
                            </p>
                        </div>
                    @endif

                    <div>
                        <p class="text-slate-500">Received By</p>

                        <p class="mt-1 font-semibold text-slate-900">
                            {{ $payment->cashier?->name ?? 'Cashier' }}
                        </p>
                    </div>

                </div>
            </section>

        </div>

        <!-- Bill Description -->
        <div class="px-6 py-8 sm:px-10">

            <h3 class="mb-5 text-sm font-bold uppercase
                       tracking-wider text-slate-500">
                Payment Summary
            </h3>

            <div class="overflow-x-auto rounded-xl border
                        border-slate-200">

                <table class="w-full text-left text-sm">

                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-5 py-4 font-semibold">
                                Description
                            </th>

                            <th class="px-5 py-4 text-right font-semibold">
                                Bill Amount
                            </th>

                            <th class="px-5 py-4 text-right font-semibold">
                                Paid Now
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="px-5 py-5">
                                <p class="font-semibold text-slate-900">
                                    {{ $bill->description ?? 'Clinic Service' }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Bill #{{ $payment->bill_id }}
                                </p>
                            </td>

                            <td class="whitespace-nowrap px-5 py-5
                                       text-right font-medium text-slate-700">

                                ₱{{ number_format($totalBill, 2) }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-5
                                       text-right font-bold text-green-700">

                                ₱{{ number_format((float) $payment->amount_paid, 2) }}
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <!-- Totals -->
            <div class="ml-auto mt-6 max-w-sm space-y-4">

                <div class="flex items-center justify-between gap-4
                            text-sm">

                    <span class="text-slate-500">Total Bill</span>

                    <span class="font-semibold text-slate-900">
                        ₱{{ number_format($totalBill, 2) }}
                    </span>
                </div>

                <div class="flex items-center justify-between gap-4
                            text-sm">

                    <span class="text-slate-500">Total Paid</span>

                    <span class="font-semibold text-green-700">
                        ₱{{ number_format($totalPaid, 2) }}
                    </span>
                </div>

                <div class="flex items-center justify-between gap-4
                            border-t border-slate-200 pt-4">

                    <span class="font-bold text-slate-900">
                        Remaining Balance
                    </span>

                    <span class="text-xl font-extrabold
                                 {{ $remainingBalance > 0
                                    ? 'text-amber-600'
                                    : 'text-green-700' }}">

                        ₱{{ number_format($remainingBalance, 2) }}
                    </span>
                </div>

            </div>

        </div>

        <!-- Payment Status -->
        <div class="mx-6 mb-8 rounded-xl p-5 sm:mx-10
                    {{ $remainingBalance <= 0
                        ? 'bg-green-50'
                        : 'bg-amber-50' }}">

            <div class="flex items-start gap-3">

                <i class="fa-solid
                          {{ $remainingBalance <= 0
                              ? 'fa-circle-check text-green-600'
                              : 'fa-circle-info text-amber-600' }}
                          mt-1 text-xl">
                </i>

                <div>
                    <p class="font-bold
                              {{ $remainingBalance <= 0
                                  ? 'text-green-800'
                                  : 'text-amber-800' }}">

                        {{ $remainingBalance <= 0
                            ? 'Bill Fully Paid'
                            : 'Partial Payment Received' }}
                    </p>

                    <p class="mt-1 text-sm
                              {{ $remainingBalance <= 0
                                  ? 'text-green-700'
                                  : 'text-amber-700' }}">

                        {{ $remainingBalance <= 0
                            ? 'The full bill amount has been paid. Thank you!'
                            : 'A remaining balance is still due. Please keep this receipt for reference.' }}
                    </p>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="border-t border-dashed border-slate-300
                    bg-slate-50 px-6 py-8 text-center sm:px-10">

            <div class="mx-auto mb-4 flex h-12 w-12 items-center
                        justify-center rounded-full bg-blue-100
                        text-blue-600">

                <i class="fa-solid fa-heart-pulse text-xl"></i>
            </div>

            <h3 class="font-bold text-slate-900">
                Thank You!
            </h3>

            <p class="mt-2 text-sm text-slate-500">
                Thank you for choosing our clinic.
            </p>

            <p class="mt-4 text-xs text-slate-400">
                This receipt was generated by the Clinic Management System.
            </p>

            <p class="mt-1 text-xs text-slate-400">
                Receipt No: {{ $payment->receipt_number }}
            </p>

        </div>

    </div>

    <!-- Bottom Buttons -->
    <div class="no-print mx-auto mt-6 flex max-w-3xl
                flex-col justify-end gap-3 sm:flex-row">

        <a href="{{ route('cashier.history') }}"
           class="inline-flex items-center justify-center gap-2
                  rounded-lg border border-slate-300 bg-white
                  px-5 py-3 text-sm font-semibold text-slate-700
                  hover:bg-slate-50">

            <i class="fa-solid fa-clock-rotate-left"></i>
            Payment History
        </a>

        <button onclick="window.print()"
                class="inline-flex items-center justify-center gap-2
                       rounded-lg bg-blue-600 px-5 py-3 text-sm
                       font-semibold text-white hover:bg-blue-700">

            <i class="fa-solid fa-print"></i>
            Print Receipt
        </button>

    </div>

</main>


</body>
</html>
