```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Reports | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: Inter, ui-sans-serif, system-ui, sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --border: #e2e8f0;
            --muted: #64748b;
            --heading: #0f172a;
        }

        /* SIDEBAR */

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 11px;
            min-height: 44px;
            padding: 7px 10px;
            border: 1px solid transparent;
            border-radius: 9px;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
            transition: all .2s ease;
        }

        .sidebar-link:hover {
            background: #f8fafc;
            color: var(--primary);
        }

        .sidebar-link.active {
            border-color: #dbeafe;
            background: #eff6ff;
            color: var(--primary-dark);
            font-weight: 700;
        }

        .nav-icon {
            display: flex;
            width: 31px;
            height: 31px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 15px;
        }

        .sidebar-link.active .nav-icon {
            background: var(--primary);
            color: white;
        }

        /* CARDS */

        .report-card {
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: white;
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .report-card:hover {
            border-color: #bfdbfe;
            box-shadow: 0 8px 22px rgb(15 23 42 / 5%);
            transform: translateY(-1px);
        }

        .section-title {
            color: var(--heading);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.025em;
        }

        .section-description {
            margin-top: 4px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .section-label {
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .stat-icon {
            display: flex;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 1px solid #dbeafe;
            border-radius: 11px;
            background: #eff6ff;
            color: var(--primary);
            font-size: 18px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 270px;
        }

        /* FORMS AND BUTTONS */

        .form-control {
            width: 100%;
            min-height: 42px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            background: white;
            padding: 9px 12px;
            color: #334155;
            font-size: 13px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgb(59 130 246 / 12%);
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            min-height: 40px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 9px;
            padding: 9px 14px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            transition: all .2s ease;
            cursor: pointer;
        }

        .btn-primary {
            border: 1px solid var(--primary);
            background: var(--primary);
            color: white;
            box-shadow: 0 2px 4px rgb(37 99 235 / 12%);
        }

        .btn-primary:hover {
            border-color: var(--primary-dark);
            background: var(--primary-dark);
        }

        .btn-secondary {
            border: 1px solid var(--border);
            background: white;
            color: #475569;
        }

        .btn-secondary:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        /* TABLES */

        .table-heading {
            background: #f8fafc;
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .table-heading th {
            padding: 14px 18px;
            white-space: nowrap;
        }

        .table-cell {
            padding: 15px 18px;
            vertical-align: middle;
        }

        .soft-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .soft-scroll::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        .soft-scroll::-webkit-scrollbar-thumb {
            border-radius: 20px;
            background: #cbd5e1;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid;
            border-radius: 999px;
            padding: 5px 9px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* RESPONSIVE */

        @media (max-width: 640px) {
            .chart-container {
                height: 240px;
            }

            .table-heading th,
            .table-cell {
                padding-right: 13px;
                padding-left: 13px;
            }
        }

        /* PRINT */

        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            body {
                background: white !important;
                color: #0f172a !important;
                font-size: 9pt;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            #sidebar,
            #sidebarOverlay,
            .no-print,
            .mobile-header {
                display: none !important;
            }

            .print-main {
                width: 100% !important;
                margin: 0 !important;
            }

            .print-container {
                width: 100% !important;
                max-width: none !important;
                padding: 0 !important;
            }

            .report-card,
            .print-panel {
                box-shadow: none !important;
                break-inside: avoid;
                transform: none !important;
            }

            .print-card-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
            }

            .print-analytics-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            .chart-container {
                height: 190px !important;
            }

            .print-container > section,
            .print-container > footer {
                margin-bottom: 12px !important;
            }

            .table-heading th,
            .table-cell {
                padding: 8px 10px !important;
            }

            table {
                width: 100% !important;
                font-size: 8pt !important;
            }

            thead {
                display: table-header-group;
            }

            tr {
                break-inside: avoid;
            }

            a {
                text-decoration: none !important;
            }

            canvas {
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

@php
    $doctorFirstName = $doctor->first_name ?? '';
    $doctorLastName = $doctor->last_name ?? '';

    $doctorFullName = trim($doctorFirstName . ' ' . $doctorLastName);

    $doctorInitials = strtoupper(
        substr($doctorFirstName ?: 'D', 0, 1) .
        substr($doctorLastName ?: 'R', 0, 1)
    );

    $doctorSpecialization = $doctor->specialization ?? 'Medical Doctor';

    $totalAppointments = (int) ($totalAppointments ?? 0);
    $completedAppointments = (int) ($completedAppointments ?? 0);
    $pendingAppointments = (int) ($pendingAppointments ?? 0);
    $totalPatients = (int) ($totalPatients ?? 0);
    $totalMedicalRecords = (int) ($totalMedicalRecords ?? 0);

    $completionRate = $totalAppointments > 0
        ? (int) round(($completedAppointments / $totalAppointments) * 100)
        : 0;

    $pendingRate = $totalAppointments > 0
        ? (int) round(($pendingAppointments / $totalAppointments) * 100)
        : 0;

    $completionRate = min(100, max(0, $completionRate));
    $pendingRate = min(100, max(0, $pendingRate));

    $appointments = $appointments ?? collect();
    $medicalRecords = $medicalRecords ?? collect();

    $appointmentStatusChart = $appointmentStatusChart ?? [];

    $startDate = $startDate ?? request('start_date', '');
    $endDate = $endDate ?? request('end_date', '');
@endphp

<div class="flex min-h-screen">

    {{-- MOBILE OVERLAY --}}
    <div
        id="sidebarOverlay"
        class="fixed inset-0 z-40 hidden bg-slate-950/40 md:hidden"
    ></div>

    {{-- SIDEBAR --}}
    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 z-50 flex h-screen w-64 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 md:sticky md:top-0 md:translate-x-0"
    >
        {{-- BRAND --}}
        <div class="flex h-[72px] shrink-0 items-center gap-3 border-b border-slate-200 px-5">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-white">
                <img
                    src="{{ asset('img/clinic_logo.png') }}"
                    alt="Clinic Logo"
                    class="h-full w-full object-contain"
                >
            </div>

            <div class="min-w-0">
                <h1 class="truncate text-sm font-extrabold text-slate-900">
                    Clinic System
                </h1>
                <p class="mt-0.5 text-xs text-slate-500">
                    Doctor Portal
                </p>
            </div>

            <button
                id="closeSidebar"
                type="button"
                class="ml-auto rounded-lg p-2 text-slate-400 hover:bg-slate-100 md:hidden"
                aria-label="Close sidebar"
            >
                ✕
            </button>
        </div>

        {{-- DOCTOR PROFILE --}}
        <div class="mx-4 mt-4 rounded-xl border border-slate-200 bg-slate-50/70 p-3">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-600 text-xs font-extrabold text-white shadow-sm">
                    {{ $doctorInitials }}
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-bold text-slate-900">
                        Dr. {{ $doctorFullName ?: 'Doctor' }}
                    </p>
                    <p class="mt-1 truncate text-xs text-slate-500">
                        {{ $doctorSpecialization }}
                    </p>
                </div>
            </div>

            <div class="mt-3 flex items-center gap-2 border-t border-slate-200 pt-3">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                <span class="text-xs text-slate-500">Doctor account</span>
            </div>
        </div>

        {{-- NAVIGATION --}}
        <div class="px-4 pb-2 pt-6">
            <p class="px-3 text-[10px] font-bold uppercase tracking-[.13em] text-slate-400">
                Workspace
            </p>
        </div>

        <nav class="soft-scroll flex-1 space-y-1 overflow-y-auto px-4 pb-4">
            <a href="{{ route('doctor.dashboard') }}" class="sidebar-link">
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('patients.index') }}" class="sidebar-link">
                <span class="nav-icon">♙</span>
                <span>Patients</span>
            </a>

            <a href="{{ route('appointments.index') }}" class="sidebar-link">
                <span class="nav-icon">▦</span>
                <span>Appointments</span>
            </a>

            <a href="{{ route('medical_records.index') }}" class="sidebar-link">
                <span class="nav-icon">▤</span>
                <span>Medical Records</span>
            </a>

            <a href="{{ route('prescriptions.index') }}" class="sidebar-link">
                <span class="nav-icon">℞</span>
                <span>Prescriptions</span>
            </a>

            <a href="{{ route('doctor.notifications') }}" class="sidebar-link">
                <span class="nav-icon">♧</span>
                <span>Notifications</span>
            </a>

            <a
                href="{{ route('doctor.reports') }}"
                class="sidebar-link active"
                aria-current="page"
            >
                <span class="nav-icon">▥</span>
                <span>Reports & Analytics</span>
            </a>
        </nav>

        {{-- SIDEBAR FOOTER --}}
        <div class="shrink-0 space-y-1 border-t border-slate-200 p-4">
            <a href="{{ route('settings.index') }}" class="sidebar-link">
                <span class="nav-icon">⚙</span>
                <span>Settings</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="flex min-h-[44px] w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-[13px] font-medium text-rose-600 transition hover:bg-rose-50"
                >
                    <span class="nav-icon border border-rose-100 bg-rose-50 text-rose-600">
                        ↪
                    </span>
                    <span>Logout</span>
                </button>
            </form>

            <p class="px-3 pt-2 text-[10px] text-slate-400">
                Clinic Management System
            </p>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="print-main min-w-0 flex-1">

        {{-- MOBILE HEADER --}}
        <header class="mobile-header no-print sticky top-0 z-30 flex h-[64px] items-center gap-3 border-b border-slate-200 bg-white px-4 md:hidden">
            <button
                id="openSidebar"
                type="button"
                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-lg text-slate-700"
                aria-label="Open sidebar"
                aria-expanded="false"
            >
                ☰
            </button>

            <div>
                <p class="text-sm font-bold text-slate-900">Reports & Analytics</p>
                <p class="text-xs text-slate-500">Doctor workspace</p>
            </div>
        </header>

        <div class="print-container mx-auto max-w-[1450px] space-y-6 p-4 sm:p-6 lg:p-8">

            {{-- PAGE HEADER --}}
            <section class="flex flex-col justify-between gap-4 border-b border-slate-200 pb-5 lg:flex-row lg:items-center">
                <div>
                    <div class="mb-2 flex items-center gap-2 text-xs text-slate-400">
                        <span>Doctor Portal</span>
                        <span>/</span>
                        <span class="font-semibold text-blue-600">Reports</span>
                    </div>

                    <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-[28px]">
                        Reports & Analytics
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                        Review your patient activity, appointments, and medical records.
                    </p>
                </div>

                <div class="no-print flex flex-wrap items-center gap-2">
                    <a href="{{ route('doctor.dashboard') }}" class="btn-secondary">
                        <span>←</span>
                        Dashboard
                    </a>

                    <button type="button" id="printReport" class="btn-primary">
                        <span>⎙</span>
                        Print Report
                    </button>
                </div>
            </section>

            {{-- REPORT INFORMATION --}}
            <section class="print-panel overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="h-1 bg-blue-600"></div>

                <div class="p-5 sm:p-6">
                    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                        <div class="flex items-center gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-blue-600 text-lg font-extrabold text-white shadow-sm">
                                {{ $doctorInitials }}
                            </div>

                            <div class="min-w-0">
                                <p class="section-label">Doctor Activity Report</p>

                                <h3 class="mt-1 text-lg font-extrabold text-slate-900 sm:text-xl">
                                    Dr. {{ $doctorFullName ?: 'Doctor' }}
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $doctorSpecialization }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-xl border border-slate-200 bg-slate-50/70 px-4 py-3">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                    Generated On
                                </p>
                                <p class="mt-1.5 text-sm font-bold text-slate-800">
                                    {{ now()->format('M d, Y') }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-emerald-100 bg-emerald-50/60 px-4 py-3">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                    Report Status
                                </p>
                                <p class="mt-1.5 flex items-center gap-2 text-sm font-semibold text-emerald-700">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Ready to review
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- DATE FILTER --}}
            <section class="no-print overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4 sm:px-6">
                    <div class="stat-icon">▦</div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Report Period</h3>
                        <p class="section-description">
                            Filter the report by appointment and record dates.
                        </p>
                    </div>
                </div>

                <form
                    id="reportFilter"
                    method="GET"
                    action="{{ route('doctor.reports') }}"
                    class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2 sm:p-6 lg:grid-cols-[1fr_1fr_auto_auto] lg:items-end"
                >
                    <div>
                        <label for="start_date" class="mb-2 block text-xs font-bold text-slate-600">
                            Start Date
                        </label>
                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{ $startDate }}"
                            max="{{ $endDate ?: now()->toDateString() }}"
                            class="form-control"
                        >
                    </div>

                    <div>
                        <label for="end_date" class="mb-2 block text-xs font-bold text-slate-600">
                            End Date
                        </label>
                        <input
                            type="date"
                            id="end_date"
                            name="end_date"
                            value="{{ $endDate }}"
                            min="{{ $startDate ?: '' }}"
                            max="{{ now()->toDateString() }}"
                            class="form-control"
                        >
                    </div>

                    <button type="submit" class="btn-primary">
                        <span>⌕</span>
                        Apply Filter
                    </button>

                    <a href="{{ route('doctor.reports') }}" class="btn-secondary">
                        Reset
                    </a>
                </form>

                @if ($startDate || $endDate)
                    <div class="border-t border-slate-100 bg-slate-50 px-5 py-3 sm:px-6">
                        <p class="text-xs text-slate-500">
                            Selected period:
                            <span class="font-semibold text-slate-700">
                                {{ $startDate ? \Illuminate\Support\Carbon::parse($startDate)->format('M d, Y') : 'Beginning' }}
                            </span>
                            <span class="px-1">–</span>
                            <span class="font-semibold text-slate-700">
                                {{ $endDate ? \Illuminate\Support\Carbon::parse($endDate)->format('M d, Y') : 'Today' }}
                            </span>
                        </p>
                    </div>
                @endif
            </section>

            {{-- CLINICAL SUMMARY --}}
            <section>
                <div class="mb-4 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="section-label">Overview</p>
                        <h3 class="section-title mt-1">Clinical Summary</h3>
                        <p class="section-description">
                            A summary of your clinical activity during the selected period.
                        </p>
                    </div>

                    <p class="text-xs text-slate-400">
                        Updated {{ now()->format('M d, Y') }}
                    </p>
                </div>

                <div class="print-card-grid grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                    {{-- PATIENTS --}}
                    <article class="report-card p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Unique Patients</p>
                                <p class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalPatients) }}
                                </p>
                            </div>
                            <div class="stat-icon">♙</div>
                        </div>

                        <div class="mt-4 border-t border-slate-100 pt-3">
                            <p class="text-xs text-slate-500">
                                Patients associated with your activity
                            </p>
                        </div>
                    </article>

                    {{-- APPOINTMENTS --}}
                    <article class="report-card p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Total Appointments</p>
                                <p class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($totalAppointments) }}
                                </p>
                            </div>
                            <div class="stat-icon">▦</div>
                        </div>

                        <div class="mt-4 border-t border-slate-100 pt-3">
                            <p class="text-xs text-slate-500">
                                Clinical visits in this report
                            </p>
                        </div>
                    </article>

                    {{-- COMPLETED --}}
                    <article class="report-card p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Completed</p>
                                <p class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($completedAppointments) }}
                                </p>
                            </div>

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-emerald-100 bg-emerald-50 text-lg text-emerald-700">
                                ✓
                            </div>
                        </div>

                        <div class="mt-4 border-t border-slate-100 pt-3">
                            <p class="text-xs text-slate-500">
                                Completed appointments
                            </p>
                        </div>
                    </article>

                    {{-- PENDING --}}
                    <article class="report-card p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Pending</p>
                                <p class="mt-3 text-3xl font-extrabold tracking-tight text-slate-900">
                                    {{ number_format($pendingAppointments) }}
                                </p>
                            </div>

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-amber-100 bg-amber-50 text-lg text-amber-700">
                                ◷
                            </div>
                        </div>

                        <div class="mt-4 border-t border-slate-100 pt-3">
                            <p class="text-xs text-slate-500">
                                Appointments awaiting completion
                            </p>
                        </div>
                    </article>
                </div>

                {{-- MEDICAL RECORDS SUMMARY --}}
                <div class="report-card mt-4 flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                    <div class="flex items-center gap-3">
                        <div class="stat-icon">▤</div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">
                                Medical Records Created
                            </h4>
                            <p class="mt-1 text-xs text-slate-500">
                                Clinical records associated with your account.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-3xl font-extrabold tracking-tight text-slate-900">
                            {{ number_format($totalMedicalRecords) }}
                        </span>
                        <span class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-600">
                            Total Records
                        </span>
                    </div>
                </div>
            </section>

            {{-- APPOINTMENT ANALYTICS --}}
            <section>
                <div class="mb-4">
                    <p class="section-label">Analytics</p>
                    <h3 class="section-title mt-1">Appointment Insights</h3>
                    <p class="section-description">
                        Analyze appointment status and completion performance.
                    </p>
                </div>

                <div class="print-analytics-grid grid grid-cols-1 gap-4 xl:grid-cols-2">

                    {{-- STATUS CHART --}}
                    <div class="print-panel rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900">
                                    Appointment Status
                                </h4>
                                <p class="section-description">
                                    Distribution by appointment status.
                                </p>
                            </div>

                            <span class="rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                Overview
                            </span>
                        </div>

                        <div class="chart-container mt-5">
                            <canvas
                                id="appointmentStatusChart"
                                role="img"
                                aria-label="Appointment status distribution chart"
                            ></canvas>
                        </div>
                    </div>

                    {{-- PERFORMANCE --}}
                    <div class="print-panel rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900">
                                    Appointment Performance
                                </h4>
                                <p class="section-description">
                                    Completion and pending rates.
                                </p>
                            </div>

                            <span class="rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-1.5 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                Statistics
                            </span>
                        </div>

                        {{-- COMPLETION RATE --}}
                        <div class="mt-7">
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <span class="text-xs font-semibold text-slate-600">
                                    Completed Appointments
                                </span>
                                <span class="text-sm font-bold text-emerald-700">
                                    {{ $completionRate }}%
                                </span>
                            </div>

                            <div
                                class="h-2.5 overflow-hidden rounded-full bg-slate-100"
                                role="progressbar"
                                aria-label="Completed appointments"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                aria-valuenow="{{ $completionRate }}"
                            >
                                <div
                                    class="h-full rounded-full bg-emerald-500 transition-all"
                                    style="width: {{ $completionRate }}%"
                                ></div>
                            </div>
                        </div>

                        {{-- PENDING RATE --}}
                        <div class="mt-6">
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <span class="text-xs font-semibold text-slate-600">
                                    Pending Appointments
                                </span>
                                <span class="text-sm font-bold text-amber-700">
                                    {{ $pendingRate }}%
                                </span>
                            </div>

                            <div
                                class="h-2.5 overflow-hidden rounded-full bg-slate-100"
                                role="progressbar"
                                aria-label="Pending appointments"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                aria-valuenow="{{ $pendingRate }}"
                            >
                                <div
                                    class="h-full rounded-full bg-amber-400 transition-all"
                                    style="width: {{ $pendingRate }}%"
                                ></div>
                            </div>
                        </div>

                        {{-- KEY FIGURES --}}
                        <div class="mt-7 grid grid-cols-2 gap-3 border-t border-slate-100 pt-5">
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-xs font-medium text-slate-500">
                                    Total Appointments
                                </p>
                                <p class="mt-2 text-2xl font-extrabold text-slate-900">
                                    {{ number_format($totalAppointments) }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-xs font-medium text-slate-500">
                                    Medical Records
                                </p>
                                <p class="mt-2 text-2xl font-extrabold text-slate-900">
                                    {{ number_format($totalMedicalRecords) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- APPOINTMENT DETAILS --}}
            <section class="print-panel overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div class="flex items-center gap-3">
                        <div class="stat-icon">▦</div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">
                                Appointment Details
                            </h3>
                            <p class="section-description">
                                Appointments included in this report.
                            </p>
                        </div>
                    </div>

                    <span class="w-fit rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-600">
                        {{ $appointments->count() }} appointments
                    </span>
                </div>

                <div class="soft-scroll overflow-x-auto">
                    <table class="w-full min-w-[740px] text-left text-sm">
                        <thead class="table-heading">
                            <tr class="border-b border-slate-200">
                                <th>Date & Time</th>
                                <th>Patient</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse ($appointments as $appointment)
                                @php
                                    $status = strtolower(
                                        (string) ($appointment->status ?? 'unknown')
                                    );

                                    $statusClasses = match ($status) {
                                        'completed' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                        'pending' => 'border-amber-200 bg-amber-50 text-amber-700',
                                        'confirmed' => 'border-blue-200 bg-blue-50 text-blue-700',
                                        'cancelled', 'canceled' => 'border-rose-200 bg-rose-50 text-rose-700',
                                        'scheduled' => 'border-violet-200 bg-violet-50 text-violet-700',
                                        default => 'border-slate-200 bg-slate-100 text-slate-600',
                                    };

                                    $displayStatus = ucfirst($status);
                                @endphp

                                <tr class="transition hover:bg-blue-50/40">
                                    <td class="table-cell whitespace-nowrap">
                                        <p class="font-semibold text-slate-800">
                                            {{ $appointment->appointment_date
                                                ? \Illuminate\Support\Carbon::parse($appointment->appointment_date)->format('M d, Y')
                                                : 'N/A' }}
                                        </p>
                                        <p class="mt-1 text-xs text-slate-400">
                                            {{ $appointment->appointment_time
                                                ? \Illuminate\Support\Carbon::parse($appointment->appointment_time)->format('h:i A')
                                                : 'Time not set' }}
                                        </p>
                                    </td>

                                    <td class="table-cell">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl border border-blue-100 bg-blue-50 text-xs font-bold text-blue-700">
                                                {{ strtoupper(
                                                    substr($appointment->patient?->first_name ?? 'P', 0, 1) .
                                                    substr($appointment->patient?->last_name ?? '', 0, 1)
                                                ) }}
                                            </div>

                                            <div class="min-w-0">
                                                <p class="font-semibold text-slate-800">
                                                    {{ $appointment->patient?->first_name ?? 'Unknown' }}
                                                    {{ $appointment->patient?->last_name ?? '' }}
                                                </p>
                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ $appointment->patient?->patient_id ?? 'Patient ID unavailable' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="table-cell max-w-xs text-slate-600">
                                        {{ $appointment->reason ?: 'No reason specified' }}
                                    </td>

                                    <td class="table-cell whitespace-nowrap">
                                        <span class="status-badge {{ $statusClasses }}">
                                            <span></span>
                                            {{ $displayStatus }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-lg text-slate-500">
                                            ▦
                                        </div>
                                        <p class="mt-3 text-sm font-bold text-slate-800">
                                            No Appointments Found
                                        </p>
                                        <p class="mt-1 text-xs text-slate-500">
                                            Try selecting a different report period.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-slate-200 bg-slate-50/70 px-5 py-3 sm:px-6">
                    <p class="text-xs text-slate-500">
                        Appointment information is restricted to authorized clinic personnel.
                    </p>
                </div>
            </section>

            {{-- MEDICAL RECORDS --}}
            <section class="print-panel overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div class="flex items-center gap-3">
                        <div class="stat-icon">▤</div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">
                                Medical Records
                            </h3>
                            <p class="section-description">
                                Clinical records associated with your account.
                            </p>
                        </div>
                    </div>

                    <span class="w-fit rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-600">
                        {{ $medicalRecords->count() }} records
                    </span>
                </div>

                <div class="soft-scroll overflow-x-auto">
                    <table class="w-full min-w-[800px] text-left text-sm">
                        <thead class="table-heading">
                            <tr class="border-b border-slate-200">
                                <th>Date Recorded</th>
                                <th>Patient</th>
                                <th>Diagnosis</th>
                                <th>Treatment</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse ($medicalRecords as $record)
                                <tr class="transition hover:bg-blue-50/40">
                                    <td class="table-cell whitespace-nowrap">
                                        <p class="font-medium text-slate-700">
                                            {{ $record->created_at?->format('M d, Y') ?? 'N/A' }}
                                        </p>
                                    </td>

                                    <td class="table-cell">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl border border-blue-100 bg-blue-50 text-xs font-bold text-blue-700">
                                                {{ strtoupper(
                                                    substr($record->patient?->first_name ?? 'P', 0, 1) .
                                                    substr($record->patient?->last_name ?? '', 0, 1)
                                                ) }}
                                            </div>

                                            <div class="min-w-0">
                                                <p class="font-semibold text-slate-800">
                                                    {{ $record->patient?->first_name ?? 'Unknown' }}
                                                    {{ $record->patient?->last_name ?? '' }}
                                                </p>
                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ $record->patient?->patient_id ?? 'Patient ID unavailable' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="table-cell max-w-xs text-slate-600">
                                        {{ $record->diagnosis ?: 'Not recorded' }}
                                    </td>

                                    <td class="table-cell max-w-xs text-slate-600">
                                        {{ $record->treatment ?: 'Not recorded' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-lg text-slate-500">
                                            ▤
                                        </div>
                                        <p class="mt-3 text-sm font-bold text-slate-800">
                                            No Medical Records Found
                                        </p>
                                        <p class="mt-1 text-xs text-slate-500">
                                            No medical records are available for this report.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-slate-200 bg-slate-50/70 px-5 py-3 sm:px-6">
                    <p class="text-xs text-slate-500">
                        Confidential patient information — authorized clinic use only.
                    </p>
                </div>
            </section>

            {{-- FOOTER --}}
            <footer class="flex flex-col gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-700">
                        Clinic Management System
                    </p>
                    <p class="mt-1 text-xs text-slate-400">
                        Doctor Reports & Analytics
                    </p>
                </div>

                <div class="text-xs leading-5 text-slate-400 sm:text-right">
                    <p>Generated {{ now()->format('M d, Y h:i A') }}</p>
                    <p>Confidential medical information</p>
                </div>
            </footer>

        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | MOBILE SIDEBAR
    |--------------------------------------------------------------------------
    */

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const openButton = document.getElementById('openSidebar');
    const closeButton = document.getElementById('closeSidebar');

    function showSidebar() {
        if (!sidebar || window.innerWidth >= 768) {
            return;
        }

        sidebar.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        openButton?.setAttribute('aria-expanded', 'true');
    }

    function hideSidebar() {
        if (!sidebar || window.innerWidth >= 768) {
            return;
        }

        sidebar.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');

        openButton?.setAttribute('aria-expanded', 'false');
    }

    openButton?.addEventListener('click', showSidebar);
    closeButton?.addEventListener('click', hideSidebar);
    overlay?.addEventListener('click', hideSidebar);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            hideSidebar();
        }
    });

    sidebar?.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', hideSidebar);
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768) {
            overlay?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            sidebar?.classList.remove('-translate-x-full');
            openButton?.setAttribute('aria-expanded', 'false');
        } else {
            sidebar?.classList.add('-translate-x-full');
            overlay?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            openButton?.setAttribute('aria-expanded', 'false');
        }
    });

    /*
    |--------------------------------------------------------------------------
    | DATE FILTER VALIDATION
    |--------------------------------------------------------------------------
    */

    const filterForm = document.getElementById('reportFilter');
    const startInput = document.getElementById('start_date');
    const endInput = document.getElementById('end_date');

    function updateDateLimits() {
        if (!startInput || !endInput) {
            return;
        }

        endInput.min = startInput.value || '';
        startInput.max = endInput.value || '{{ now()->toDateString() }}';
    }

    startInput?.addEventListener('change', updateDateLimits);
    endInput?.addEventListener('change', updateDateLimits);

    filterForm?.addEventListener('submit', function (event) {
        const start = startInput?.value;
        const end = endInput?.value;
        const today = '{{ now()->toDateString() }}';

        if (start && end && start > end) {
            event.preventDefault();
            alert('The start date cannot be later than the end date.');
            endInput?.focus();
            return;
        }

        if ((start && start > today) || (end && end > today)) {
            event.preventDefault();
            alert('Future dates are not allowed.');
        }
    });

    updateDateLimits();

    /*
    |--------------------------------------------------------------------------
    | PRINT REPORT
    |--------------------------------------------------------------------------
    */

    document.getElementById('printReport')?.addEventListener('click', function () {
        window.print();
    });

    /*
    |--------------------------------------------------------------------------
    | APPOINTMENT STATUS CHART
    |--------------------------------------------------------------------------
    */

    const chartElement = document.getElementById('appointmentStatusChart');

    if (!chartElement) {
        return;
    }

    if (typeof Chart === 'undefined') {
        const container = chartElement.parentElement;

        if (container) {
            container.innerHTML = `
                <div class="flex h-full items-center justify-center rounded-xl border border-dashed border-amber-200 bg-amber-50 px-5 text-center text-sm text-amber-700">
                    The chart library could not be loaded. Please check your internet connection.
                </div>
            `;
        }

        return;
    }

    const chartData = {{ Illuminate\Support\Js::from($appointmentStatusChart)->toHtml() }};

    const validChartData =
        chartData !== null &&
        typeof chartData === 'object' &&
        !Array.isArray(chartData);

    const normalizedChartData = validChartData ? chartData : {};

    const entries = Object.entries(normalizedChartData)
        .map(function ([status, value]) {
            return {
                status: String(status),
                count: Number(value)
            };
        })
        .filter(function (item) {
            return Number.isFinite(item.count) && item.count >= 0;
        });

    const labels = entries.map(function (item) {
        const text = item.status;
        return text.charAt(0).toUpperCase() + text.slice(1);
    });

    const values = entries.map(function (item) {
        return item.count;
    });

    const totalChartAppointments = values.reduce(function (total, value) {
        return total + value;
    }, 0);

    if (labels.length === 0 || totalChartAppointments === 0) {
        const container = chartElement.parentElement;

        if (container) {
            container.innerHTML = `
                <div class="flex h-full items-center justify-center rounded-xl border border-dashed border-slate-200 bg-slate-50 px-5 text-center text-sm text-slate-400">
                    No appointment data available for this period.
                </div>
            `;
        }

        return;
    }

    const chartColors = [
        '#2563eb',
        '#10b981',
        '#f59e0b',
        '#f43f5e',
        '#8b5cf6',
        '#06b6d4',
        '#64748b'
    ];

    const appointmentChart = new Chart(chartElement, {
        type: 'doughnut',

        data: {
            labels: labels,

            datasets: [{
                label: 'Appointments',
                data: values,

                backgroundColor: labels.map(function (_, index) {
                    return chartColors[index % chartColors.length];
                }),

                borderColor: '#ffffff',
                borderWidth: 3,
                hoverOffset: 5
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
                        boxWidth: 8,
                        boxHeight: 8,
                        padding: 18,
                        color: '#64748b',

                        font: {
                            size: 11,
                            weight: '500'
                        }
                    }
                },

                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: true,

                    callbacks: {
                        label: function (context) {
                            const value = Number(context.raw) || 0;

                            const percentage = totalChartAppointments > 0
                                ? ((value / totalChartAppointments) * 100).toFixed(1)
                                : '0.0';

                            return ` ${context.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    /*
    |--------------------------------------------------------------------------
    | PRINT CHART SUPPORT
    |--------------------------------------------------------------------------
    */

    window.addEventListener('beforeprint', function () {
        appointmentChart.resize();
    });

    window.addEventListener('afterprint', function () {
        appointmentChart.resize();
    });

});
</script>

</body>
</html>
```