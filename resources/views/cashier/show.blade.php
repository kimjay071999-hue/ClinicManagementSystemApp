<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment | Clinic Management System</title>

```
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
```

</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

```
<!-- Header -->
<header class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5
                flex flex-col sm:flex-row sm:items-center
                sm:justify-between gap-4">

        <div>
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-blue-600 text-white
                            flex items-center justify-center">
                    <i class="fa-solid fa-cash-register text-xl"></i>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-slate-900">
                        Process Payment
                    </h1>
                    <p class="text-sm text-slate-500">
                        Clinic Management System
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('cashier.index') }}"
           class="inline-flex items-center justify-center gap-2
                  rounded-lg border border-slate-300 bg-white
                  px-4 py-2.5 text-sm font-semibold text-slate-700
                  hover:bg-slate-50 transition">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Dashboard
        </a>

    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50
                    p-4 text-sm text-green-700">
            <i class="fa-solid fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
            Cashier / Payment
        </p>

        <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900">
            Bill #{{ $bill->id }}
        </h2>

        <p class="mt-2 text-slate-500">
            Review the bill information and record the patient's payment.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left: Bill Information -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Patient Information -->
            <section class="rounded-2xl border border-slate-200
                            bg-white shadow-sm overflow-hidden">

                <div class="border-b border-slate-200 px-6 py-5">
                    <h3 class="font-bold text-slate-900">
                        <i class="fa-solid fa-user-injured mr-2 text-blue-600"></i>
                        Patient Information
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <p class="text-sm text-slate-500">Patient Name</p>
                        <p class="mt-1 font-semibold text-slate-900">
                            {{ $bill->patient->first_name ?? '' }}
                            {{ $bill->patient->last_name ?? '' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Patient ID</p>
                        <p class="mt-1 font-semibold text-slate-900">
                            {{ $bill->patient->patient_id ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Bill Number</p>
                        <p class="mt-1 font-semibold text-slate-900">
                            BILL-{{ str_pad($bill->id, 5, '0', STR_PAD_LEFT) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Bill Status</p>

                        @if($bill->status === 'Paid')
                            <span class="mt-1 inline-flex rounded-full
                                         bg-green-100 px-3 py-1 text-xs
                                         font-semibold text-green-700">
                                Paid
                            </span>
                        @elseif($bill->status === 'Cancelled')
                            <span class="mt-1 inline-flex rounded-full
                                         bg-red-100 px-3 py-1 text-xs
                                         font-semibold text-red-700">
                                Cancelled
                            </span>
                        @else
                            <span class="mt-1 inline-flex rounded-full
                                         bg-amber-100 px-3 py-1 text-xs
                                         font-semibold text-amber-700">
                                Pending
                            </span>
                        @endif
                    </div>

                </div>
            </section>

            <!-- Bill Details -->
            <section class="rounded-2xl border border-slate-200
                            bg-white shadow-sm overflow-hidden">

                <div class="border-b border-slate-200 px-6 py-5">
                    <h3 class="font-bold text-slate-900">
                        <i class="fa-solid fa-file-invoice-dollar mr-2 text-blue-600"></i>
                        Bill Details
                    </h3>
                </div>

                <div class="p-6">
                    <div class="mb-5">
                        <p class="text-sm text-slate-500">Description</p>
                        <p class="mt-1 font-semibold text-slate-900">
                            {{ $bill->description }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                        <div class="rounded-xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Total Bill</p>
                            <p class="mt-2 text-xl font-bold text-slate-900">
                                ₱{{ number_format((float) $bill->amount, 2) }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-green-50 p-4">
                            <p class="text-sm text-green-700">Total Paid</p>
                            <p class="mt-2 text-xl font-bold text-green-700">
                                ₱{{ number_format((float) $totalPaid, 2) }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-blue-50 p-4">
                            <p class="text-sm text-blue-700">Balance Due</p>
                            <p class="mt-2 text-xl font-bold text-blue-700">
                                ₱{{ number_format((float) $remainingBalance, 2) }}
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Previous Payments -->
            <section class="rounded-2xl border border-slate-200
                            bg-white shadow-sm overflow-hidden">

                <div class="border-b border-slate-200 px-6 py-5">
                    <h3 class="font-bold text-slate-900">
                        <i class="fa-solid fa-clock-rotate-left mr-2 text-blue-600"></i>
                        Payment History for This Bill
                    </h3>
                </div>

                @if($bill->payments->isNotEmpty())

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">

                            <thead class="bg-slate-50 text-slate-500">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Receipt</th>
                                    <th class="px-6 py-4 font-semibold">Method</th>
                                    <th class="px-6 py-4 font-semibold">Amount</th>
                                    <th class="px-6 py-4 font-semibold">Date</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @foreach($bill->payments as $payment)
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-700">
                                            {{ $payment->receipt_number }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $payment->payment_method }}
                                        </td>

                                        <td class="px-6 py-4 font-semibold text-green-700">
                                            ₱{{ number_format((float) $payment->amount_paid, 2) }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-600">
                                            {{ $payment->payment_date
                                                ? $payment->payment_date->format('M d, Y h:i A')
                                                : 'N/A' }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @else
                    <div class="px-6 py-10 text-center">
                        <i class="fa-solid fa-receipt text-3xl text-slate-300"></i>

                        <p class="mt-3 font-medium text-slate-700">
                            No payments recorded yet.
                        </p>

                        <p class="mt-1 text-sm text-slate-500">
                            The patient's payment history will appear here.
                        </p>
                    </div>
                @endif

            </section>

        </div>

        <!-- Right: Payment Form -->
        <div class="lg:col-span-1">

            <section class="rounded-2xl border border-slate-200
                            bg-white shadow-sm overflow-hidden">

                <div class="bg-blue-600 px-6 py-5 text-white">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center
                                    rounded-xl bg-white/20">
                            <i class="fa-solid fa-money-bill-wave text-lg"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Record Payment</h3>
                            <p class="text-sm text-blue-100">
                                Enter payment details
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6">

                    @if($errors->any())
                        <div class="mb-5 rounded-xl border border-red-200
                                    bg-red-50 p-4 text-sm text-red-700">
                            <p class="font-semibold mb-2">
                                Please check the following:
                            </p>

                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($remainingBalance > 0 && $bill->status !== 'Cancelled')

                        <form action="{{ route('cashier.store', $bill->id) }}"
                              method="POST"
                              class="space-y-5">

                            @csrf

                            <!-- Remaining Balance -->
                            <div class="rounded-xl border border-blue-100
                                        bg-blue-50 p-4">
                                <p class="text-sm text-blue-700">
                                    Remaining Balance
                                </p>

                                <p class="mt-1 text-2xl font-bold text-blue-800">
                                    ₱{{ number_format((float) $remainingBalance, 2) }}
                                </p>
                            </div>

                            <!-- Amount -->
                            <div>
                                <label for="amount_paid"
                                       class="mb-2 block text-sm font-semibold text-slate-700">
                                    Amount to Pay <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">
                                    <span class="absolute left-3 top-1/2
                                                 -translate-y-1/2 text-slate-500">
                                        ₱
                                    </span>

                                    <input
                                        type="number"
                                        name="amount_paid"
                                        id="amount_paid"
                                        step="0.01"
                                        min="0.01"
                                        max="{{ number_format((float) $remainingBalance, 2, '.', '') }}"
                                        value="{{ old('amount_paid') }}"
                                        placeholder="0.00"
                                        required
                                        class="w-full rounded-lg border border-slate-300
                                               py-3 pl-8 pr-3 outline-none
                                               focus:border-blue-500 focus:ring-2
                                               focus:ring-blue-100">
                                </div>

                                @error('amount_paid')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror

                                <p class="mt-2 text-xs text-slate-500">
                                    Do not enter more than the remaining balance.
                                </p>
                            </div>

                            <!-- Payment Method -->
                            <div>
                                <label for="payment_method"
                                       class="mb-2 block text-sm font-semibold text-slate-700">
                                    Payment Method <span class="text-red-500">*</span>
                                </label>

                                <select
                                    name="payment_method"
                                    id="payment_method"
                                    required
                                    class="w-full rounded-lg border border-slate-300
                                           bg-white px-3 py-3 outline-none
                                           focus:border-blue-500 focus:ring-2
                                           focus:ring-blue-100">

                                    <option value="Cash"
                                        {{ old('payment_method', 'Cash') === 'Cash' ? 'selected' : '' }}>
                                        Cash
                                    </option>

                                    <option value="GCash"
                                        {{ old('payment_method') === 'GCash' ? 'selected' : '' }}>
                                        GCash
                                    </option>

                                    <option value="Bank Transfer"
                                        {{ old('payment_method') === 'Bank Transfer' ? 'selected' : '' }}>
                                        Bank Transfer
                                    </option>

                                </select>

                                @error('payment_method')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Reference Number -->
                            <div id="reference_wrapper" class="hidden">
                                <label for="reference_number"
                                       class="mb-2 block text-sm font-semibold text-slate-700">
                                    Reference Number <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="reference_number"
                                    id="reference_number"
                                    value="{{ old('reference_number') }}"
                                    placeholder="Enter transaction reference"
                                    maxlength="255"
                                    class="w-full rounded-lg border border-slate-300
                                           px-3 py-3 outline-none
                                           focus:border-blue-500 focus:ring-2
                                           focus:ring-blue-100">

                                @error('reference_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to record this payment?')"
                                class="flex w-full items-center justify-center gap-2
                                       rounded-lg bg-blue-600 px-4 py-3
                                       font-semibold text-white transition
                                       hover:bg-blue-700 focus:ring-4
                                       focus:ring-blue-100">

                                <i class="fa-solid fa-check-circle"></i>
                                Record Payment
                            </button>

                            <p class="text-center text-xs text-slate-500">
                                A receipt will be generated after recording payment.
                            </p>

                        </form>

                    @elseif($bill->status === 'Cancelled')

                        <div class="rounded-xl bg-red-50 p-5 text-center">
                            <i class="fa-solid fa-ban text-3xl text-red-500"></i>

                            <p class="mt-3 font-semibold text-red-700">
                                This bill has been cancelled.
                            </p>

                            <p class="mt-1 text-sm text-red-600">
                                Payments cannot be accepted for cancelled bills.
                            </p>
                        </div>

                    @else

                        <div class="rounded-xl bg-green-50 p-5 text-center">
                            <i class="fa-solid fa-circle-check text-3xl text-green-600"></i>

                            <p class="mt-3 font-semibold text-green-700">
                                This bill is fully paid.
                            </p>

                            <p class="mt-1 text-sm text-green-600">
                                No remaining balance.
                            </p>
                        </div>

                    @endif

                </div>
            </section>

        </div>

    </div>

    <footer class="py-8 text-center text-sm text-slate-500">
        &copy; {{ date('Y') }} Clinic Management System.
        All rights reserved.
    </footer>

</main>

<script>
    const paymentMethod = document.getElementById('payment_method');
    const referenceWrapper = document.getElementById('reference_wrapper');
    const referenceInput = document.getElementById('reference_number');

    function toggleReferenceField() {
        if (!paymentMethod || !referenceWrapper || !referenceInput) {
            return;
        }

        const needsReference =
            paymentMethod.value === 'GCash' ||
            paymentMethod.value === 'Bank Transfer';

        referenceWrapper.classList.toggle('hidden', !needsReference);
        referenceInput.required = needsReference;
    }

    if (paymentMethod) {
        paymentMethod.addEventListener('change', toggleReferenceField);
        toggleReferenceField();
    }
</script>
```

</body>
</html>
