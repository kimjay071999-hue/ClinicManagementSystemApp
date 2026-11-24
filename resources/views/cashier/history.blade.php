<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Payment History | Clinic Management System</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

<!-- Header -->
<header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-5
                sm:flex-row sm:items-center sm:justify-between
                sm:px-6 lg:px-8">

        <div class="flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center
                        rounded-xl bg-blue-600 text-white">
                <i class="fa-solid fa-clock-rotate-left text-xl"></i>
            </div>

            <div>
                <h1 class="text-xl font-bold text-slate-900">
                    Payment History
                </h1>

                <p class="text-sm text-slate-500">
                    Clinic Management System
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
                Print
            </button>

        </div>
    </div>
</header>

<main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200
                    bg-green-50 p-4 text-sm text-green-700">

            <i class="fa-solid fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider
                  text-blue-600">
            Cashier Management
        </p>

        <h2 class="mt-2 text-2xl font-bold text-slate-900 sm:text-3xl">
            Transaction Records
        </h2>

        <p class="mt-2 text-slate-500">
            Review, search, and view recorded patient payments.
        </p>
    </div>

    @php
        $totalTransactions = $payments->count();

        $totalCollections = $payments->sum('amount_paid');

        $todayCollections = $payments
            ->filter(function ($payment) {
                return $payment->payment_date
                    && $payment->payment_date->isToday();
            })
            ->sum('amount_paid');

        $cashCollections = $payments
            ->where('payment_method', 'Cash')
            ->sum('amount_paid');

        $gcashCollections = $payments
            ->where('payment_method', 'GCash')
            ->sum('amount_paid');

        $bankCollections = $payments
            ->where('payment_method', 'Bank Transfer')
            ->sum('amount_paid');
    @endphp

    <!-- Summary Cards -->
    <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        <!-- Total Transactions -->
        <div class="rounded-2xl border border-slate-200
                    bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Transactions
                    </p>

                    <h3 class="mt-2 text-3xl font-bold text-slate-900">
                        {{ number_format($totalTransactions) }}
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-xl bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-receipt text-xl"></i>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-500">
                All recorded payment transactions
            </p>
        </div>

        <!-- Total Collections -->
        <div class="rounded-2xl border border-slate-200
                    bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total Collections
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-green-700">
                        ₱{{ number_format((float) $totalCollections, 2) }}
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-xl bg-green-100 text-green-600">
                    <i class="fa-solid fa-sack-dollar text-xl"></i>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-500">
                Total money received from payments
            </p>
        </div>

        <!-- Today's Collections -->
        <div class="rounded-2xl border border-slate-200
                    bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Today's Collections
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-blue-700">
                        ₱{{ number_format((float) $todayCollections, 2) }}
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-xl bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-calendar-day text-xl"></i>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-500">
                Payments received today
            </p>
        </div>

        <!-- Cash Collections -->
        <div class="rounded-2xl border border-slate-200
                    bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Cash Collections
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-purple-700">
                        ₱{{ number_format((float) $cashCollections, 2) }}
                    </h3>
                </div>

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-xl bg-purple-100 text-purple-600">
                    <i class="fa-solid fa-money-bill-wave text-xl"></i>
                </div>
            </div>

            <p class="mt-4 text-xs text-slate-500">
                Total payments received in cash
            </p>
        </div>

    </div>

    <!-- Payment Method Summary -->
    <section class="mb-8 rounded-2xl border border-slate-200
                    bg-white p-6 shadow-sm">

        <div class="mb-5">
            <h3 class="font-bold text-slate-900">
                Collection by Payment Method
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                Breakdown of recorded collections by payment type.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

            <div class="flex items-center gap-4 rounded-xl
                        border border-slate-200 p-4">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-lg bg-green-100 text-green-600">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Cash</p>

                    <p class="font-bold text-slate-900">
                        ₱{{ number_format((float) $cashCollections, 2) }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4 rounded-xl
                        border border-slate-200 p-4">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-lg bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>

                <div>
                    <p class="text-sm text-slate-500">GCash</p>

                    <p class="font-bold text-slate-900">
                        ₱{{ number_format((float) $gcashCollections, 2) }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4 rounded-xl
                        border border-slate-200 p-4">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-lg bg-purple-100 text-purple-600">
                    <i class="fa-solid fa-building-columns"></i>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Bank Transfer</p>

                    <p class="font-bold text-slate-900">
                        ₱{{ number_format((float) $bankCollections, 2) }}
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Payment Records -->
    <section class="overflow-hidden rounded-2xl border
                    border-slate-200 bg-white shadow-sm">

        <!-- Table Header -->
        <div class="flex flex-col gap-4 border-b border-slate-200
                    p-6 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <h3 class="text-lg font-bold text-slate-900">
                    All Payment Records
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Search using patient name, receipt number, or payment method.
                </p>
            </div>

            <!-- Search -->
            <div class="relative w-full lg:max-w-sm">

                <i class="fa-solid fa-magnifying-glass
                          absolute left-3 top-1/2
                          -translate-y-1/2 text-slate-400">
                </i>

                <input
                    type="search"
                    id="paymentSearch"
                    placeholder="Search payment records..."
                    class="w-full rounded-lg border border-slate-300
                           py-3 pl-10 pr-4 text-sm outline-none
                           transition focus:border-blue-500
                           focus:ring-2 focus:ring-blue-100">
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Receipt Number
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Patient
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Bill Number
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Payment Method
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-right font-semibold">
                            Amount Paid
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Received By
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 font-semibold">
                            Payment Date
                        </th>

                        <th class="whitespace-nowrap px-6 py-4 text-center font-semibold">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody id="paymentTableBody"
                       class="divide-y divide-slate-100">

                    @forelse($payments as $payment)

                        <tr class="payment-row transition hover:bg-slate-50">

                            <!-- Receipt Number -->
                            <td class="whitespace-nowrap px-6 py-5">
                                <span class="font-semibold text-blue-700">
                                    {{ $payment->receipt_number }}
                                </span>
                            </td>

                            <!-- Patient -->
                            <td class="whitespace-nowrap px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0
                                                items-center justify-center
                                                rounded-full bg-blue-100
                                                font-bold text-blue-700">

                                        {{ strtoupper(substr(
                                            $payment->bill?->patient?->first_name ?? 'P',
                                            0,
                                            1
                                        )) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-900">

                                            {{ $payment->bill?->patient?->first_name ?? 'Unknown' }}
                                            {{ $payment->bill?->patient?->last_name ?? '' }}

                                        </p>

                                        <p class="text-xs text-slate-500">
                                            ID:
                                            {{ $payment->bill?->patient?->patient_id ?? 'N/A' }}
                                        </p>
                                    </div>

                                </div>
                            </td>

                            <!-- Bill Number -->
                            <td class="whitespace-nowrap px-6 py-5
                                       font-medium text-slate-700">

                                BILL-{{ str_pad($payment->bill_id, 5, '0', STR_PAD_LEFT) }}

                            </td>

                            <!-- Payment Method -->
                            <td class="whitespace-nowrap px-6 py-5">

                                @if($payment->payment_method === 'Cash')

                                    <span class="inline-flex items-center gap-2
                                                 rounded-full bg-green-100
                                                 px-3 py-1.5 text-xs
                                                 font-semibold text-green-700">

                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        Cash
                                    </span>

                                @elseif($payment->payment_method === 'GCash')

                                    <span class="inline-flex items-center gap-2
                                                 rounded-full bg-blue-100
                                                 px-3 py-1.5 text-xs
                                                 font-semibold text-blue-700">

                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                        GCash
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2
                                                 rounded-full bg-purple-100
                                                 px-3 py-1.5 text-xs
                                                 font-semibold text-purple-700">

                                        <i class="fa-solid fa-building-columns"></i>
                                        Bank Transfer
                                    </span>

                                @endif

                            </td>

                            <!-- Amount -->
                            <td class="whitespace-nowrap px-6 py-5
                                       text-right font-bold text-green-700">

                                ₱{{ number_format((float) $payment->amount_paid, 2) }}

                            </td>

                            <!-- Cashier -->
                            <td class="whitespace-nowrap px-6 py-5">

                                <div class="flex items-center gap-2">

                                    <i class="fa-solid fa-user-tie text-slate-400"></i>

                                    <span class="font-medium text-slate-700">
                                        {{ $payment->cashier?->name ?? 'N/A' }}
                                    </span>

                                </div>

                            </td>

                            <!-- Date -->
                            <td class="whitespace-nowrap px-6 py-5">

                                @if($payment->payment_date)
                                    <p class="font-medium text-slate-800">
                                        {{ $payment->payment_date->format('M d, Y') }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $payment->payment_date->format('h:i A') }}
                                    </p>
                                @else
                                    <span class="text-slate-400">N/A</span>
                                @endif

                            </td>

                            <!-- Action -->
                            <td class="whitespace-nowrap px-6 py-5 text-center">

                                <a href="{{ route('cashier.receipt', $payment->id) }}"
                                   class="inline-flex items-center gap-2
                                          rounded-lg border border-blue-200
                                          bg-blue-50 px-3 py-2
                                          text-xs font-semibold text-blue-700
                                          transition hover:bg-blue-100">

                                    <i class="fa-solid fa-eye"></i>
                                    View Receipt
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr id="emptyPaymentsRow">
                            <td colspan="8" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-16 w-16
                                            items-center justify-center
                                            rounded-full bg-slate-100
                                            text-slate-400">

                                    <i class="fa-solid fa-receipt text-2xl"></i>
                                </div>

                                <h4 class="mt-4 font-bold text-slate-800">
                                    No Payment Records Yet
                                </h4>

                                <p class="mt-2 text-sm text-slate-500">
                                    Payments will appear here after the cashier records a transaction.
                                </p>

                                <a href="{{ route('cashier.index') }}"
                                   class="mt-5 inline-flex items-center gap-2
                                          rounded-lg bg-blue-600 px-4 py-2.5
                                          text-sm font-semibold text-white
                                          hover:bg-blue-700">

                                    <i class="fa-solid fa-cash-register"></i>
                                    Go to Cashier Dashboard
                                </a>

                            </td>
                        </tr>

                    @endforelse

                    <tr id="noSearchResults" class="hidden">
                        <td colspan="8" class="px-6 py-12 text-center">
                            <i class="fa-solid fa-magnifying-glass
                                      text-3xl text-slate-300"></i>

                            <p class="mt-3 font-semibold text-slate-700">
                                No matching payment records
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Try searching with a different keyword.
                            </p>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>

        <!-- Table Footer -->
        <div class="flex flex-col gap-2 border-t border-slate-200
                    bg-slate-50 px-6 py-4 sm:flex-row
                    sm:items-center sm:justify-between">

            <p class="text-sm text-slate-500">
                Showing
                <span id="visibleCount" class="font-semibold text-slate-800">
                    {{ $totalTransactions }}
                </span>
                of
                <span class="font-semibold text-slate-800">
                    {{ $totalTransactions }}
                </span>
                transactions
            </p>

            <p class="text-xs text-slate-500">
                All amounts are displayed in Philippine Peso (₱).
            </p>

        </div>

    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-slate-500">
        &copy; {{ date('Y') }} Clinic Management System.
        All rights reserved.
    </footer>

</main>

<!-- Search Script -->
<script>
    const searchInput = document.getElementById('paymentSearch');
    const paymentRows = document.querySelectorAll('.payment-row');
    const visibleCount = document.getElementById('visibleCount');
    const noSearchResults = document.getElementById('noSearchResults');

    function filterPayments() {
        const searchValue = searchInput.value.toLowerCase().trim();
        let visibleRows = 0;

        paymentRows.forEach(function(row) {
            const rowText = row.textContent.toLowerCase();
            const matches = rowText.includes(searchValue);

            row.classList.toggle('hidden', !matches);

            if (matches) {
                visibleRows++;
            }
        });

        visibleCount.textContent = visibleRows;

        if (noSearchResults) {
            noSearchResults.classList.toggle(
                'hidden',
                visibleRows !== 0 || searchValue === ''
            );
        }
    }

    searchInput.addEventListener('input', filterPayments);
</script>


</body>
</html>
