
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cashier Dashboard | Clinic Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden w-64 shrink-0 flex-col border-r border-slate-200 bg-white md:flex">

        <!-- LOGO -->
        <div class="border-b border-slate-100 px-6 py-6">
            <div class="flex items-center gap-3">
                <h1 class="text-lg sm:text-xl font-bold text-slate-800">
                            <img src="{{ asset('img/clinic_logo.png') }}" alt="Clinic Logo">
                        </h1>

               
            </div>
        </div>

        <!-- NAVIGATION -->
        <nav class="flex-1 space-y-2 px-4 py-6">

            <a href="{{ route('cashier.index') }}"
               class="flex items-center gap-3 rounded-xl bg-blue-50 px-4 py-3 font-semibold text-blue-700">
                <i class="fa-solid fa-chart-pie w-5"></i>
                Dashboard
            </a>

            <a href="{{ route('cashier.index') }}#pending-bills"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-slate-100 hover:text-blue-700">
                <i class="fa-solid fa-file-invoice-dollar w-5"></i>
                Pending Bills
            </a>

            <a href="{{ route('cashier.history') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-slate-100 hover:text-blue-700">
                <i class="fa-solid fa-clock-rotate-left w-5"></i>
                Payment History
            </a>
          
<a href="{{ route('bills.create') }}"
   class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700">
    <i class="fa-solid fa-plus"></i>
    Create New Bill
</a>



        </nav>

        <!-- USER PROFILE -->
        <div class="border-t border-slate-100 p-4">

            <div class="mb-4 flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-700">
                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold">
                        {{ auth()->user()->name ?? 'Cashier' }}
                    </p>

                    <p class="text-xs text-slate-500">Cashier Account</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-red-600 transition hover:bg-red-50">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    Logout
                </button>
            </form>

        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="min-w-0 flex-1">

        <!-- MOBILE HEADER + DESKTOP HEADER -->
        <header class="flex flex-col gap-4 border-b border-slate-200 bg-white px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">

            <div>
                <div class="mb-1 flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-blue-600">
                    <!-- <i class="fa-solid fa-hospital"></i> -->
                    <!-- Clinic Management System -->
                </div>

                <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                    Cashier Dashboard
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Manage patient bills, record payments, and print receipts.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-semibold text-slate-700">
                        {{ now()->format('F d, Y') }}
                    </p>

                    <p class="text-xs text-slate-500">Today's Overview</p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <i class="fa-regular fa-calendar text-lg"></i>
                </div>
            </div>

        </header>

        <div class="space-y-8 p-5 sm:p-8">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                    <i class="fa-solid fa-circle-check mt-0.5 text-lg"></i>

                    <div>
                        <p class="font-semibold">Success!</p>
                        <p class="mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- VALIDATION ERRORS -->
            @if($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    <div class="flex items-center gap-2 font-semibold">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        Please check the following errors:
                    </div>

                    <ul class="mt-2 list-inside list-disc space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- WELCOME BANNER -->
            <section class="overflow-hidden rounded-2xl bg-gradient-to-r from-blue-700 to-blue-500 p-6 text-white shadow-sm sm:p-8">

                <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-center">

                    <div>
                        <p class="text-sm font-medium text-blue-100">
                            Welcome back, Cashier!
                        </p>

                        <h3 class="mt-2 text-2xl font-bold sm:text-3xl">
                            {{ auth()->user()->name ?? 'Cashier' }}
                        </h3>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">
                            Search for a patient, open their pending bill,
                            enter the payment amount, and generate a receipt.
                        </p>

                   
<a href="{{ route('cashier.show', ['id' => $bills->first()->id ?? 1]) }}"
   class="mt-5 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-blue-700 shadow-sm transition hover:bg-blue-50">
    <i class="fa-solid fa-file-invoice-dollar"></i>
    Process Patient Payment
</a>


                    </div>

                    <div class="hidden h-24 w-24 items-center justify-center rounded-2xl bg-white/15 sm:flex">
                        <i class="fa-solid fa-cash-register text-5xl"></i>
                    </div>

                </div>
            </section>

            <!-- SUMMARY CARDS -->
            <section class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <!-- TOTAL COLLECTIONS -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <i class="fa-solid fa-wallet text-xl"></i>
                        </div>

                        <span class="text-xs font-medium text-slate-400">
                            All time
                        </span>
                    </div>

                    <p class="mt-5 text-sm text-slate-500">Total Collections</p>

                    <h3 class="mt-1 text-2xl font-bold text-slate-800">
                        ₱{{ number_format((float) $totalCollections, 2) }}
                    </h3>

                    <p class="mt-2 text-xs text-slate-400">
                        Total recorded payments
                    </p>
                </div>

                <!-- TODAY'S COLLECTIONS -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 text-green-600">
                            <i class="fa-solid fa-money-bill-wave text-xl"></i>
                        </div>

                        <span class="text-xs font-medium text-green-600">
                            Today
                        </span>
                    </div>

                    <p class="mt-5 text-sm text-slate-500">Today's Collections</p>

                    <h3 class="mt-1 text-2xl font-bold text-slate-800">
                        ₱{{ number_format((float) $todayCollections, 2) }}
                    </h3>

                    <p class="mt-2 text-xs text-slate-400">
                        Payments received today
                    </p>
                </div>

                <!-- PENDING BILLS -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-file-invoice text-xl"></i>
                        </div>

                        <span class="text-xs font-medium text-amber-600">
                            Awaiting payment
                        </span>
                    </div>

                    <p class="mt-5 text-sm text-slate-500">Pending Bills</p>

                    <h3 class="mt-1 text-2xl font-bold text-slate-800">
                        {{ number_format($pendingBills) }}
                    </h3>

                    <a href="#pending-bills"
                       class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800">
                        View pending bills
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- TOTAL BILL AMOUNT -->
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
                            <i class="fa-solid fa-receipt text-xl"></i>
                        </div>

                        <span class="text-xs font-medium text-purple-600">
                            Excluding cancelled
                        </span>
                    </div>

                    <p class="mt-5 text-sm text-slate-500">Total Bill Amount</p>

                    <h3 class="mt-1 text-2xl font-bold text-slate-800">
                        ₱{{ number_format((float) $totalBills, 2) }}
                    </h3>

                    <p class="mt-2 text-xs text-slate-400">
                        Total non-cancelled bills
                    </p>
                </div>

            </section>

            <!-- PATIENT SEARCH -->
            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex items-start gap-3">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-slate-800">
                            Find a Patient
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-slate-500">
                            Search by patient first name, last name, or Patient ID
                            to find their pending bills.
                        </p>
                    </div>
                </div>

                <form action="{{ route('cashier.index') }}"
                      method="GET"
                      class="flex flex-col gap-3 sm:flex-row">

                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Enter patient name or Patient ID..."
                            aria-label="Search patient"
                            class="w-full rounded-xl border border-slate-200 py-3 pl-11 pr-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                        >
                    </div>

                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search Patient
                    </button>

                    @if(request()->filled('search'))
                        <a href="{{ route('cashier.index') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                            <i class="fa-solid fa-xmark"></i>
                            Clear
                        </a>
                    @endif

                </form>

                @if(request()->filled('search'))
                    <div class="mt-4 flex items-center gap-2 rounded-lg bg-blue-50 px-4 py-3 text-sm text-blue-700">
                        <i class="fa-solid fa-circle-info"></i>

                        <p>
                            Search results for:
                            <strong>{{ request('search') }}</strong>
                        </p>
                    </div>
                @endif

            </section>

            <!-- PENDING BILLS -->
            <section id="pending-bills"
                     class="scroll-mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <!-- TABLE HEADER -->
                <div class="flex flex-col gap-3 border-b border-slate-100 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">

                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-bold text-slate-800">
                                Pending Patient Bills
                            </h3>

                            <span class="rounded-full bg-amber-50 px-2.5 py-1 text-xs font-bold text-amber-700">
                                {{ $pendingBills }}
                            </span>
                        </div>

                        <p class="mt-1 text-sm text-slate-500">
                            Select a bill and click Process Payment to enter the amount received.
                        </p>
                    </div>

                    <a href="{{ route('cashier.history') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-blue-700">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Payment History
                    </a>
                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[800px] text-left text-sm">

                        <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Patient</th>
                                <th class="px-6 py-4 font-semibold">Description</th>
                                <th class="px-6 py-4 text-right font-semibold">Bill Amount</th>
                                <th class="px-6 py-4 text-center font-semibold">Status</th>
                                <th class="px-6 py-4 text-center font-semibold">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($bills as $bill)

                                <tr class="transition hover:bg-slate-50">

                                    <!-- PATIENT -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-50 font-bold text-blue-600">
                                                {{ strtoupper(substr($bill->patient->first_name ?? 'P', 0, 1)) }}
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-800">
                                                    {{ $bill->patient->first_name ?? '' }}
                                                    {{ $bill->patient->last_name ?? '' }}
                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">
                                                    Patient ID:
                                                    {{ $bill->patient->patient_id ?? $bill->patient_id }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>

                                    <!-- DESCRIPTION -->
                                    <td class="px-6 py-4">
                                        <p class="max-w-xs truncate font-medium text-slate-700">
                                            {{ $bill->description }}
                                        </p>

                                        <p class="mt-1 text-xs text-slate-400">
                                            Bill #{{ $bill->id }}
                                        </p>
                                    </td>

                                    <!-- BILL AMOUNT -->
                                    <td class="px-6 py-4 text-right">
                                        <span class="font-bold text-slate-800">
                                            ₱{{ number_format((float) $bill->amount, 2) }}
                                        </span>
                                    </td>

                                    <!-- STATUS -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            {{ $bill->status }}
                                        </span>
                                    </td>

                                    <!-- PROCESS PAYMENT BUTTON -->
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('cashier.show', ['id' => $bill->id]) }}"
                                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-xl bg-blue-600 px-4 py-3 text-xs font-bold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">

                                            <i class="fa-solid fa-money-bill-wave"></i>

                                            Process Payment

                                            <i class="fa-solid fa-arrow-right text-xs"></i>
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <!-- EMPTY STATE -->
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">

                                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                            <i class="fa-solid fa-file-circle-check text-2xl"></i>
                                        </div>

                                        <h4 class="mt-4 font-semibold text-slate-700">
                                            @if(request()->filled('search'))
                                                No Matching Pending Bills
                                            @else
                                                No Pending Bills
                                            @endif
                                        </h4>

                                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                                            @if(request()->filled('search'))
                                                Walay pending bill nga nagtugma sa imong search.
                                                Susiha ang patient name o Patient ID.
                                            @else
                                                Walay bill nga naghulat sa payment karon.
                                                Ang bag-ong pending bills makita dinhi.
                                            @endif
                                        </p>

                                        @if(request()->filled('search'))
                                            <a href="{{ route('cashier.index') }}"
                                               class="mt-4 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                                <i class="fa-solid fa-arrow-left"></i>
                                                View All Pending Bills
                                            </a>
                                        @endif

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                <!-- TABLE FOOTER -->
                <div class="flex flex-col gap-2 border-t border-slate-100 bg-slate-50 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-xs text-slate-500">
                        Showing
                        <strong>{{ $bills->count() }}</strong>
                        {{ $bills->count() === 1 ? 'bill' : 'bills' }}
                        in this list.
                    </p>

                    <a href="{{ route('cashier.history') }}"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-blue-600 hover:text-blue-800">
                        View payment history
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </section>

            <!-- FOOTER -->
            <footer class="pb-3 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} Clinic Management System. All rights reserved.
            </footer>

        </div>
    </main>

</div>

</body>
</html>

