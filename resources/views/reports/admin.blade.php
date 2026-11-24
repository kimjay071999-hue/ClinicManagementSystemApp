
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Reports | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        canvas {
            max-width: 100%;
        }

        .report-card {
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .report-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 30px -15px rgba(15, 23, 42, .16);
        }

        .stat-icon {
            display: flex;
            width: 48px;
            height: 48px;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            flex-shrink: 0;
        }

        .chart-container {
            position: relative;
            height: 290px;
        }

        .section-label {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        @media (max-width: 640px) {
            .chart-container {
                height: 250px;
            }
        }

        @media print {
            body {
                background: #fff !important;
                color: #111827 !important;
                font-size: 10px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print,
            #sidebar,
            #sidebarOverlay,
            #mobileHeader {
                display: none !important;
            }

            #mainContent {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .report-card {
                box-shadow: none !important;
                break-inside: avoid;
                border: 1px solid #d1d5db !important;
            }

            .chart-grid {
                display: grid !important;
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                gap: 10px !important;
            }

            .chart-container {
                height: 210px !important;
            }

            .overview-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }

            table {
                width: 100% !important;
                border-collapse: collapse !important;
            }

            th,
            td {
                border: 1px solid #d1d5db !important;
                padding: 6px !important;
            }

            thead {
                display: table-header-group;
            }

            tr {
                break-inside: avoid;
            }

            @page {
                size: A4 landscape;
                margin: 10mm;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

<div class="flex min-h-screen">

    {{-- =====================================================
         MOBILE SIDEBAR OVERLAY
    ====================================================== --}}

    <div id="sidebarOverlay"
         class="fixed inset-0 z-40 hidden bg-black/40 md:hidden">
    </div>


    {{-- =====================================================
         ADMIN SIDEBAR
    ====================================================== --}}

    <aside id="sidebar"
           class="fixed left-0 top-0 z-50 flex h-screen w-64
                  -translate-x-full flex-col border-r border-slate-200
                  bg-white transition-transform duration-300 ease-in-out
                  md:sticky md:translate-x-0">

        {{-- LOGO --}}

        <div class="border-b border-slate-200 px-5 py-5 sm:px-6">

            <div class="flex items-center justify-between gap-3">

                <a href="{{ route('dashboard') }}"
                   class="block min-w-0">

                    <img src="{{ asset('img/clinic_logo.png') }}"
                         alt="Clinic Logo"
                         class="h-auto max-h-14 w-auto max-w-[175px] object-contain">

                    <p class="mt-2 text-xs text-slate-500">
                        Clinic Management System
                    </p>

                </a>

                <button id="closeSidebar"
                        type="button"
                        aria-label="Close navigation"
                        class="text-2xl text-slate-500 hover:text-slate-800 md:hidden">
                    &times;
                </button>

            </div>

        </div>


        {{-- NAVIGATION --}}

        <nav class="flex-1 overflow-y-auto px-3 py-5 sm:px-4">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Main Menu
            </p>


            {{-- DASHBOARD --}}

            <a href="{{ route('dashboard') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">🏠</span>
                <span class="font-medium">Dashboard</span>

            </a>


            {{-- PATIENTS --}}

            <a href="{{ route('patients.index') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">👥</span>
                <span class="font-medium">Patients</span>

            </a>


            {{-- DOCTORS --}}

            <a href="{{ url('/doctors') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">👨‍⚕️</span>
                <span class="font-medium">Doctors</span>

            </a>


            {{-- APPOINTMENTS --}}

            <a href="{{ route('appointments.index') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">📅</span>
                <span class="font-medium">Appointments</span>

            </a>


            {{-- MEDICAL RECORDS --}}

            <a href="{{ route('medical_records.index') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">🗂️</span>
                <span class="font-medium">Medical Records</span>

            </a>


            {{-- PRESCRIPTIONS --}}

            <a href="{{ route('prescriptions.index') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">💊</span>
                <span class="font-medium">Prescriptions</span>

            </a>


            {{-- BILLS --}}

            <a href="{{ route('bills.index') }}"
               class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-blue-50 hover:text-blue-600">

                <span class="text-lg">💰</span>
                <span class="font-medium">Bills</span>

            </a>


            {{-- REPORTS: ACTIVE MENU --}}

            <a href="{{ route('reports.admin') }}"
               aria-current="page"
               class="mb-1 flex items-center gap-3 rounded-lg bg-blue-50
                      px-3 py-3 text-blue-600 transition">

                <span class="text-lg">📈</span>
                <span class="font-semibold">Reports</span>

            </a>


            {{-- PATIENT SECTION --}}

            <div class="my-5 border-t border-slate-200"></div>

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                Patient
            </p>


            <a href="{{ route('patients.create') }}"
               class="flex items-center gap-3 rounded-lg bg-blue-600
                      px-3 py-3 text-white shadow-sm transition hover:bg-blue-700">

                <span class="text-lg">➕</span>
                <span class="font-medium">Add Patient</span>

            </a>

        </nav>


        {{-- SIDEBAR BOTTOM --}}

        <div class="border-t border-slate-200 px-3 py-4 sm:px-4">

            <a href="{{ route('settings.index') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-3
                      text-slate-600 transition hover:bg-slate-100">

                <span class="text-lg">⚙️</span>
                <span class="font-medium">Settings</span>

            </a>


            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-3 py-3
                               text-left text-red-500 transition hover:bg-red-50">

                    <span class="text-lg">🚪</span>
                    <span class="font-medium">Logout</span>

                </button>
            </form>

        </div>

    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <div id="mainContent" class="min-w-0 flex-1">


        {{-- MOBILE HEADER --}}

        <header id="mobileHeader"
                class="sticky top-0 z-30 border-b border-slate-200
                       bg-white px-4 py-4 md:hidden">

            <div class="flex items-center gap-3">

                <button id="openSidebar"
                        type="button"
                        aria-label="Open navigation"
                        aria-controls="sidebar"
                        aria-expanded="false"
                        class="flex h-10 w-10 flex-shrink-0 items-center
                               justify-center rounded-lg bg-blue-50 text-xl
                               text-blue-600 transition hover:bg-blue-100">

                    ☰

                </button>

                <div class="min-w-0">

                  

                    <p class="truncate text-xs text-slate-500">
                        Admin Reports
                    </p>

                </div>

            </div>

        </header>


        {{-- DESKTOP HEADER --}}

        <header class="hidden border-b border-slate-200 bg-white
                       px-6 py-5 md:block lg:px-8">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Admin Reports
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Clinic operations, appointments and financial analytics.
                    </p>

                </div>

                <div class="rounded-xl border border-blue-100 bg-blue-50
                            px-4 py-2 text-sm font-semibold text-blue-700">

                     Reports Center

                </div>

            </div>

        </header>


        {{-- =====================================================
             REPORT PAGE
        ====================================================== --}}

        <main class="mx-auto max-w-[1600px] space-y-7 p-4 sm:p-6 lg:p-8">


            {{-- PAGE HEADER --}}

            <header class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div class="mb-3 flex flex-wrap items-center gap-2 text-xs font-medium text-slate-400">

                        <span>Clinic Management System</span>
                        <span>/</span>
                        <span>Administration</span>
                        <span>/</span>
                        <span class="text-blue-600">Reports</span>

                    </div>

                    <div class="flex items-start gap-4">

                        

                        <div>

                            <h1 class="text-2xl font-extrabold tracking-tight
                                       text-slate-900 sm:text-3xl">
                                Admin Reports
                            </h1>

                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                                Monitor clinic operations, appointment activity,
                                patient records, and financial performance in one place.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="no-print flex flex-wrap items-center gap-3">

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl
                              border border-slate-200 bg-white px-4 py-3 text-sm
                              font-semibold text-slate-600 shadow-sm transition
                              hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">

                        <span aria-hidden="true">←</span>
                        Dashboard

                    </a>

                    <button type="button"
                            onclick="window.print()"
                            class="inline-flex items-center justify-center gap-2
                                   rounded-xl bg-blue-600 px-5 py-3 text-sm
                                   font-bold text-white shadow-lg shadow-blue-200
                                   transition hover:bg-blue-700 active:scale-[.98]">

                        <span aria-hidden="true">🖨️</span>
                        Print Report

                    </button>

                </div>

            </header>


            {{-- =====================================================
                 REPORT PERIOD
            ====================================================== --}}

            <section class="report-card overflow-hidden rounded-2xl
                            border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col gap-4 border-b border-slate-100
                            p-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                    <div class="flex items-center gap-3">

                        <div class="stat-icon bg-blue-50 text-xl">
                            📅
                        </div>

                        <div>

                            <h2 class="font-bold text-slate-900">
                                Report Period
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Customize the dates for your report.
                            </p>

                        </div>

                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-xs">

                        <span class="rounded-full bg-slate-100 px-3 py-1.5
                                     font-semibold text-slate-600">

                            Generated {{ now()->format('M d, Y') }}

                        </span>

                        <span class="rounded-full bg-emerald-50 px-3 py-1.5
                                     font-semibold text-emerald-700">

                            ● Report Ready

                        </span>

                    </div>

                </div>


                <div class="p-5 sm:p-6">

                    <form method="GET"
                          action="{{ route('reports.admin') }}"
                          class="no-print grid grid-cols-1 gap-4 sm:grid-cols-2
                                 xl:grid-cols-4 xl:items-end">

                        <div>

                            <label for="start_date"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Start Date
                            </label>

                            <input type="date"
                                   id="start_date"
                                   name="start_date"
                                   value="{{ $startDate }}"
                                   max="{{ $endDate ?: now()->toDateString() }}"
                                   class="w-full rounded-xl border border-slate-200
                                          bg-slate-50 px-4 py-3 text-sm text-slate-700
                                          outline-none transition focus:border-blue-500
                                          focus:bg-white focus:ring-4 focus:ring-blue-100">

                        </div>


                        <div>

                            <label for="end_date"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                End Date
                            </label>

                            <input type="date"
                                   id="end_date"
                                   name="end_date"
                                   value="{{ $endDate }}"
                                   min="{{ $startDate }}"
                                   max="{{ now()->toDateString() }}"
                                   class="w-full rounded-xl border border-slate-200
                                          bg-slate-50 px-4 py-3 text-sm text-slate-700
                                          outline-none transition focus:border-blue-500
                                          focus:bg-white focus:ring-4 focus:ring-blue-100">

                        </div>


                        <div class="flex flex-wrap gap-2 sm:col-span-2 xl:col-span-2">

                            <button type="submit"
                                    class="inline-flex items-center justify-center
                                           rounded-xl bg-blue-600 px-5 py-3 text-sm
                                           font-bold text-white transition hover:bg-blue-700">

                                Apply Filter

                            </button>

                            <a href="{{ route('reports.admin') }}"
                               class="inline-flex items-center justify-center
                                      rounded-xl border border-slate-200 bg-white
                                      px-5 py-3 text-sm font-semibold text-slate-600
                                      transition hover:bg-slate-50">

                                Reset

                            </a>

                        </div>

                    </form>


                    <div class="mt-5 flex flex-wrap items-center gap-2
                                border-t border-slate-100 pt-4">

                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Selected period:
                        </span>

                        <span class="rounded-lg bg-blue-50 px-3 py-1.5
                                     text-xs font-bold text-blue-700">

                            {{ $startDate
                                ? \Carbon\Carbon::parse($startDate)->format('M d, Y')
                                : 'Beginning' }}

                            &nbsp;–&nbsp;

                            {{ $endDate
                                ? \Carbon\Carbon::parse($endDate)->format('M d, Y')
                                : 'Present' }}

                        </span>

                    </div>

                </div>

            </section>


            {{-- =====================================================
                 OVERVIEW
            ====================================================== --}}

            <section>

                <div class="mb-5 flex flex-col gap-2 sm:flex-row
                            sm:items-end sm:justify-between">

                    <div>

                        <p class="section-label text-blue-600">
                            Overview
                        </p>

                        <h2 class="mt-2 text-xl font-extrabold tracking-tight text-slate-900">
                            Clinic at a Glance
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            A quick summary of your clinic's key indicators.
                        </p>

                    </div>

                    <p class="text-xs text-slate-400">
                        Figures based on available clinic records.
                    </p>

                </div>


                <div class="overview-grid grid grid-cols-1 gap-4
                            sm:grid-cols-2 xl:grid-cols-3">


                    {{-- TOTAL PATIENTS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Total Patients
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalPatients) }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Registered patient profiles
                                </p>

                            </div>

                            <div class="stat-icon bg-blue-50 text-2xl">
                                👥
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-full rounded-full bg-blue-500"></div>
                        </div>

                    </div>


                    {{-- TOTAL DOCTORS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Total Doctors
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalDoctors) }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Registered medical staff
                                </p>

                            </div>

                            <div class="stat-icon bg-indigo-50 text-2xl">
                                🩺
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-full rounded-full bg-indigo-500"></div>
                        </div>

                    </div>


                    {{-- TOTAL APPOINTMENTS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Total Appointments
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalAppointments) }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Appointments in the report period
                                </p>

                            </div>

                            <div class="stat-icon bg-emerald-50 text-2xl">
                                📅
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-full rounded-full bg-emerald-500"></div>
                        </div>

                    </div>


                    {{-- MEDICAL RECORDS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Medical Records
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalMedicalRecords) }}
                                </h3>

                                <p class="mt-2 text-xs text-slate-400">
                                    Records created in the period
                                </p>

                            </div>

                            <div class="stat-icon bg-violet-50 text-2xl">
                                🗂️
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-full rounded-full bg-violet-500"></div>
                        </div>

                    </div>


                    {{-- TOTAL BILLS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Total Bills
                                </p>

                                <h3 class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalBills) }}
                                </h3>

                                <div class="mt-3 flex flex-wrap gap-2">

                                    <span class="rounded-lg bg-emerald-50 px-2.5 py-1.5
                                                 text-xs font-bold text-emerald-700">
                                        Paid {{ number_format($paidBills) }}
                                    </span>

                                    <span class="rounded-lg bg-amber-50 px-2.5 py-1.5
                                                 text-xs font-bold text-amber-700">
                                        Pending {{ number_format($pendingBills) }}
                                    </span>

                                </div>

                            </div>

                            <div class="stat-icon bg-amber-50 text-2xl">
                                🧾
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-full rounded-full bg-amber-500"></div>
                        </div>

                    </div>


                    {{-- TOTAL COLLECTIONS --}}

                    <div class="report-card rounded-2xl border border-emerald-200
                                bg-gradient-to-br from-white to-emerald-50/70
                                p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p class="text-sm font-semibold text-slate-500">
                                    Total Collections
                                </p>

                                <h3 class="mt-3 break-words text-2xl font-extrabold
                                           tracking-tight text-emerald-700 sm:text-3xl">

                                    ₱{{ number_format((float) $totalCollections, 2) }}

                                </h3>

                                <p class="mt-2 text-xs text-slate-500">
                                    Payments recorded in the selected period
                                </p>

                            </div>

                            <div class="stat-icon bg-emerald-100 text-2xl">
                                💰
                            </div>

                        </div>

                        <div class="mt-5 h-1 w-full overflow-hidden rounded-full bg-emerald-100">
                            <div class="h-full w-full rounded-full bg-emerald-500"></div>
                        </div>

                    </div>

                </div>

            </section>


            {{-- =====================================================
                 ANALYTICS
            ====================================================== --}}

            <section>

                <div class="mb-5">

                    <p class="section-label text-blue-600">
                        Analytics
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold tracking-tight text-slate-900">
                        Reports &amp; Insights
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Visual summaries of appointments, billing status, and payment activity.
                    </p>

                </div>


                <div class="chart-grid grid grid-cols-1 gap-5 xl:grid-cols-2">


                    {{-- APPOINTMENT STATUS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-3">

                            <div>

                                <h3 class="font-bold text-slate-900">
                                    Appointment Status
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Appointment distribution by status.
                                </p>

                            </div>

                            <span class="rounded-lg bg-blue-50 px-2.5 py-1.5
                                         text-xs font-bold text-blue-700">
                                Appointments
                            </span>

                        </div>

                        <div class="chart-container mt-5">
                            <canvas id="appointmentStatusChart"></canvas>
                        </div>

                    </div>


                    {{-- MONTHLY APPOINTMENTS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-3">

                            <div>

                                <h3 class="font-bold text-slate-900">
                                    Monthly Appointment Trends
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Appointment activity across the available months.
                                </p>

                            </div>

                            <span class="rounded-lg bg-indigo-50 px-2.5 py-1.5
                                         text-xs font-bold text-indigo-700">
                                Trends
                            </span>

                        </div>

                        <div class="chart-container mt-5">
                            <canvas id="monthlyAppointmentsChart"></canvas>
                        </div>

                    </div>


                    {{-- BILLING STATUS --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-3">

                            <div>

                                <h3 class="font-bold text-slate-900">
                                    Billing Status
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Breakdown of bills according to payment status.
                                </p>

                            </div>

                            <span class="rounded-lg bg-amber-50 px-2.5 py-1.5
                                         text-xs font-bold text-amber-700">
                                Billing
                            </span>

                        </div>

                        <div class="chart-container mt-5">
                            <canvas id="billStatusChart"></canvas>
                        </div>

                    </div>


                    {{-- PAYMENT METHOD --}}

                    <div class="report-card rounded-2xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-start justify-between gap-3">

                            <div>

                                <h3 class="font-bold text-slate-900">
                                    Collections by Payment Method
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Recorded collections grouped by payment method.
                                </p>

                            </div>

                            <span class="rounded-lg bg-emerald-50 px-2.5 py-1.5
                                         text-xs font-bold text-emerald-700">
                                Collections
                            </span>

                        </div>

                        <div class="chart-container mt-5">
                            <canvas id="paymentMethodChart"></canvas>
                        </div>

                    </div>

                </div>

            </section>


            {{-- =====================================================
                 APPOINTMENT STATUS SUMMARY
            ====================================================== --}}

            <section class="report-card overflow-hidden rounded-2xl
                            border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col gap-3 border-b border-slate-100
                            p-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                    <div>

                        <p class="section-label text-blue-600">
                            Appointment Breakdown
                        </p>

                        <h2 class="mt-2 text-lg font-extrabold text-slate-900">
                            Appointment Status Summary
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Number of appointments grouped by their current status.
                        </p>

                    </div>

                    <span class="w-fit rounded-lg bg-slate-100 px-3 py-2
                                 text-xs font-bold text-slate-600">

                        {{ number_format($totalAppointments) }} Total

                    </span>

                </div>


                <div class="p-5 sm:p-6">

                    @forelse ($appointmentStatuses as $status => $total)

                        @php
                            $normalizedStatus = strtolower((string) $status);

                            $statusStyles = [
                                'pending' => 'bg-amber-50 text-amber-700 ring-amber-200',
                                'confirmed' => 'bg-blue-50 text-blue-700 ring-blue-200',
                                'completed' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                                'cancelled' => 'bg-red-50 text-red-700 ring-red-200',
                                'canceled' => 'bg-red-50 text-red-700 ring-red-200',
                                'scheduled' => 'bg-violet-50 text-violet-700 ring-violet-200',
                            ];

                            $badgeClass = $statusStyles[$normalizedStatus]
                                ?? 'bg-slate-100 text-slate-600 ring-slate-200';
                        @endphp

                        <div class="flex items-center justify-between gap-4
                                    border-b border-slate-100 py-4 last:border-0">

                            <div class="flex min-w-0 items-center gap-3">

                                <span class="h-2.5 w-2.5 flex-shrink-0 rounded-full
                                    {{ match($normalizedStatus) {
                                        'pending' => 'bg-amber-500',
                                        'confirmed' => 'bg-blue-500',
                                        'completed' => 'bg-emerald-500',
                                        'cancelled', 'canceled' => 'bg-red-500',
                                        'scheduled' => 'bg-violet-500',
                                        default => 'bg-slate-400'
                                    } }}">
                                </span>

                                <span class="text-sm font-semibold text-slate-700">
                                    {{ $status ? ucfirst($status) : 'Unspecified' }}
                                </span>

                            </div>

                            <span class="inline-flex min-w-12 items-center
                                         justify-center rounded-lg px-3 py-2
                                         text-sm font-extrabold ring-1 ring-inset
                                         {{ $badgeClass }}">

                                {{ number_format($total) }}

                            </span>

                        </div>

                    @empty

                        <div class="py-12 text-center">

                            <div class="mb-3 text-3xl">📅</div>

                            <p class="font-semibold text-slate-700">
                                No appointment data available
                            </p>

                            <p class="mt-1 text-sm text-slate-400">
                                No appointments were found for the selected period.
                            </p>

                        </div>

                    @endforelse

                </div>

            </section>


            {{-- =====================================================
                 APPOINTMENT DETAILS TABLE
            ====================================================== --}}

            <section class="report-card overflow-hidden rounded-2xl
                            border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col gap-4 border-b border-slate-100
                            p-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">

                    <div>

                        <p class="section-label text-blue-600">
                            Detailed Records
                        </p>

                        <h2 class="mt-2 text-lg font-extrabold text-slate-900">
                            Appointment Details
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Review appointments included in this report.
                        </p>

                    </div>

                    <div class="flex items-center gap-2">

                        <span class="flex h-9 w-9 items-center justify-center
                                     rounded-xl bg-blue-50 text-lg">
                            📋
                        </span>

                        <div>

                            <p class="text-lg font-extrabold text-slate-900">
                                {{ number_format($appointments->count()) }}
                            </p>

                            <p class="text-xs text-slate-400">
                                Records
                            </p>

                        </div>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full min-w-[850px] text-left text-sm">

                        <thead class="bg-slate-50">

                            <tr class="text-[11px] uppercase tracking-wider text-slate-500">

                                <th class="px-5 py-4 font-extrabold">
                                    Appointment Date
                                </th>

                                <th class="px-5 py-4 font-extrabold">
                                    Patient
                                </th>

                                <th class="px-5 py-4 font-extrabold">
                                    Doctor
                                </th>

                                <th class="px-5 py-4 font-extrabold">
                                    Reason
                                </th>

                                <th class="px-5 py-4 font-extrabold">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse ($appointments as $appointment)

                                @php
                                    $appointmentStatus = strtolower(
                                        (string) ($appointment->status ?? '')
                                    );

                                    $appointmentStatusStyles = [
                                        'pending' => 'bg-amber-50 text-amber-700',
                                        'confirmed' => 'bg-blue-50 text-blue-700',
                                        'completed' => 'bg-emerald-50 text-emerald-700',
                                        'cancelled' => 'bg-red-50 text-red-700',
                                        'canceled' => 'bg-red-50 text-red-700',
                                        'scheduled' => 'bg-violet-50 text-violet-700',
                                    ];

                                    $appointmentBadgeClass =
                                        $appointmentStatusStyles[$appointmentStatus]
                                        ?? 'bg-slate-100 text-slate-600';
                                @endphp

                                <tr class="transition hover:bg-blue-50/40">

                                    <td class="whitespace-nowrap px-5 py-4">

                                        <p class="font-bold text-slate-800">

                                            {{ $appointment->appointment_date
                                                ? \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y')
                                                : '—' }}

                                        </p>

                                        @if($appointment->appointment_time)

                                            <p class="mt-1 text-xs text-slate-400">

                                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}

                                            </p>

                                        @endif

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="font-bold text-slate-800">

                                            {{ $appointment->patient?->first_name ?? 'N/A' }}
                                            {{ $appointment->patient?->last_name ?? '' }}

                                        </p>

                                        @if($appointment->patient?->patient_id)

                                            <p class="mt-1 text-xs font-medium text-slate-400">

                                                ID: {{ $appointment->patient->patient_id }}

                                            </p>

                                        @endif

                                    </td>


                                    <td class="px-5 py-4">

                                        @if($appointment->doctor)

                                            <p class="font-semibold text-slate-700">

                                                Dr. {{ $appointment->doctor->first_name }}
                                                {{ $appointment->doctor->last_name }}

                                            </p>

                                            @if($appointment->doctor->specialization)

                                                <p class="mt-1 text-xs text-slate-400">

                                                    {{ $appointment->doctor->specialization }}

                                                </p>

                                            @endif

                                        @else

                                            <span class="text-slate-400">
                                                Unassigned
                                            </span>

                                        @endif

                                    </td>


                                    <td class="max-w-xs px-5 py-4">

                                        <p class="max-w-[250px] truncate text-slate-600"
                                           title="{{ $appointment->reason ?: '' }}">

                                            {{ $appointment->reason ?: '—' }}

                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex items-center gap-1.5
                                                     whitespace-nowrap rounded-lg px-3
                                                     py-1.5 text-xs font-bold
                                                     {{ $appointmentBadgeClass }}">

                                            <span>●</span>

                                            {{ $appointment->status
                                                ? ucfirst($appointment->status)
                                                : 'Unspecified' }}

                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="px-5 py-16 text-center">

                                        <div class="mb-3 text-4xl">📂</div>

                                        <p class="font-bold text-slate-700">
                                            No appointments found
                                        </p>

                                        <p class="mt-1 text-sm text-slate-400">
                                            Try selecting a different report period.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <div class="flex flex-col gap-2 border-t border-slate-100
                            bg-slate-50/70 px-5 py-4 sm:flex-row
                            sm:items-center sm:justify-between sm:px-6">

                    <p class="text-xs text-slate-500">

                        Showing
                        <span class="font-bold text-slate-700">
                            {{ number_format($appointments->count()) }}
                        </span>
                        appointment records.

                    </p>

                    <p class="text-xs text-slate-400">
                        Clinic Management System
                    </p>

                </div>

            </section>


            {{-- =====================================================
                 FOOTER
            ====================================================== --}}

            <footer class="border-t border-slate-200 py-6 text-center">

                <p class="text-xs font-semibold text-slate-500">
                    Clinic Management System
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Admin Reports · Generated {{ now()->format('F d, Y \a\t h:i A') }}
                </p>

                <p class="mt-2 text-[11px] text-slate-400">
                    Confidential clinic information. For authorized use only.
                </p>

            </footer>

        </main>

    </div>

</div>


{{-- =====================================================
     MOBILE SIDEBAR SCRIPT
====================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const openSidebar = document.getElementById('openSidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    function showSidebar() {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        if (openSidebar) {
            openSidebar.setAttribute('aria-expanded', 'true');
        }
    }

    function hideSidebar() {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');

        if (openSidebar) {
            openSidebar.setAttribute('aria-expanded', 'false');
        }
    }

    if (openSidebar) {
        openSidebar.addEventListener('click', showSidebar);
    }

    if (closeSidebar) {
        closeSidebar.addEventListener('click', hideSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', hideSidebar);
    }

    // Close the mobile sidebar after selecting a navigation link.
    sidebar.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth < 768) {
                hideSidebar();
            }
        });
    });

    // Reset mobile navigation when switching to desktop size.
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768) {
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');

            if (openSidebar) {
                openSidebar.setAttribute('aria-expanded', 'false');
            }
        } else {
            sidebar.classList.add('-translate-x-full');
        }
    });

});
</script>


{{-- =====================================================
     REPORT CHART CONFIGURATION
====================================================== --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof Chart === 'undefined') {
        console.error('Chart.js failed to load.');
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Data supplied by the existing Laravel controller
    |--------------------------------------------------------------------------
    */

    const appointmentStatusData = @json($appointmentStatusChart ?? []);
    const monthlyAppointmentsData = @json($monthlyAppointments ?? []);
    const billStatusData = @json($billsByStatus ?? []);
    const paymentMethodData = @json($paymentsByMethod ?? []);

    /*
    |--------------------------------------------------------------------------
    | Chart labels and values
    |--------------------------------------------------------------------------
    */

    const appointmentStatusLabels = Object.keys(appointmentStatusData);
    const appointmentStatusValues = Object.values(appointmentStatusData);

    const monthlyAppointmentLabels = Object.keys(monthlyAppointmentsData);
    const monthlyAppointmentValues = Object.values(monthlyAppointmentsData);

    const billStatusLabels = Object.keys(billStatusData);
    const billStatusValues = Object.values(billStatusData);

    const paymentMethodLabels = Object.keys(paymentMethodData);
    const paymentMethodValues = Object.values(paymentMethodData);

    /*
    |--------------------------------------------------------------------------
    | Shared Chart.js defaults
    |--------------------------------------------------------------------------
    */

    Chart.defaults.font.family =
        'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';

    Chart.defaults.color = '#64748b';
    Chart.defaults.plugins.tooltip.backgroundColor = '#0f172a';
    Chart.defaults.plugins.tooltip.padding = 12;
    Chart.defaults.plugins.tooltip.cornerRadius = 10;
    Chart.defaults.plugins.tooltip.displayColors = true;

    /*
    |--------------------------------------------------------------------------
    | 1. Appointment Status
    |--------------------------------------------------------------------------
    */

    const appointmentCanvas =
        document.getElementById('appointmentStatusChart');

    if (appointmentCanvas) {

        new Chart(appointmentCanvas, {
            type: 'bar',

            data: {
                labels: appointmentStatusLabels,

                datasets: [{
                    label: 'Appointments',
                    data: appointmentStatusValues,

                    backgroundColor: [
                        '#3b82f6',
                        '#f59e0b',
                        '#10b981',
                        '#ef4444',
                        '#8b5cf6',
                        '#64748b'
                    ],

                    borderRadius: 7,
                    borderSkipped: false,
                    maxBarThickness: 55
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    x: {
                        grid: {
                            display: false
                        },

                        border: {
                            display: false
                        }
                    },

                    y: {
                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: '#f1f5f9'
                        },

                        border: {
                            display: false,
                            dash: [4, 4]
                        }
                    }
                }
            }
        });

    }

    /*
    |--------------------------------------------------------------------------
    | 2. Monthly Appointment Trends
    |--------------------------------------------------------------------------
    */

    const monthlyCanvas =
        document.getElementById('monthlyAppointmentsChart');

    if (monthlyCanvas) {

        new Chart(monthlyCanvas, {
            type: 'line',

            data: {
                labels: monthlyAppointmentLabels,

                datasets: [{
                    label: 'Appointments',
                    data: monthlyAppointmentValues,

                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.10)',

                    fill: true,
                    tension: 0.35,

                    pointRadius: 4,
                    pointHoverRadius: 6,

                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#2563eb',
                    pointBorderWidth: 2,

                    borderWidth: 3
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    x: {
                        grid: {
                            display: false
                        },

                        border: {
                            display: false
                        }
                    },

                    y: {
                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: '#f1f5f9'
                        },

                        border: {
                            display: false,
                            dash: [4, 4]
                        }
                    }
                }
            }
        });

    }

    /*
    |--------------------------------------------------------------------------
    | 3. Billing Status
    |--------------------------------------------------------------------------
    */

    const billCanvas =
        document.getElementById('billStatusChart');

    if (billCanvas) {

        new Chart(billCanvas, {
            type: 'doughnut',

            data: {
                labels: billStatusLabels,

                datasets: [{
                    label: 'Bills',
                    data: billStatusValues,

                    backgroundColor: [
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                        '#64748b',
                        '#8b5cf6'
                    ],

                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverOffset: 7
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                cutout: '68%',

                plugins: {
                    legend: {
                        position: 'bottom',

                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 18
                        }
                    }
                }
            }
        });

    }

    /*
    |--------------------------------------------------------------------------
    | 4. Collections by Payment Method
    |--------------------------------------------------------------------------
    */

    const paymentCanvas =
        document.getElementById('paymentMethodChart');

    if (paymentCanvas) {

        new Chart(paymentCanvas, {
            type: 'pie',

            data: {
                labels: paymentMethodLabels,

                datasets: [{
                    label: 'Collections',
                    data: paymentMethodValues,

                    backgroundColor: [
                        '#2563eb',
                        '#10b981',
                        '#8b5cf6',
                        '#f59e0b',
                        '#64748b'
                    ],

                    borderWidth: 3,
                    borderColor: '#ffffff',
                    hoverOffset: 7
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        position: 'bottom',

                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 18
                        }
                    },

                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const amount = Number(context.raw || 0);

                                return context.label + ': ₱' +
                                    amount.toLocaleString('en-PH', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    });
                            }
                        }
                    }
                }
            }
        });

    }

});
</script>

</body>
</html>
