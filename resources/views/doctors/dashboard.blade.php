<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="flex min-h-screen">

        <!-- ================= MOBILE OVERLAY ================= -->
        <div id="sidebarOverlay"
             class="fixed inset-0 z-40 hidden bg-slate-900/40 md:hidden">
        </div>


        <!-- ================= SIDEBAR ================= -->
        <aside id="sidebar"
               class="fixed left-0 top-0 z-50 flex h-screen w-64
                      -translate-x-full flex-col border-r border-slate-200
                      bg-white transition-transform duration-300 ease-in-out
                      md:sticky md:translate-x-0">

            <!-- LOGO -->
            <div class="border-b border-slate-200 px-5 py-5 sm:px-6">

                <div class="flex items-center justify-between gap-3">

                    <div class="min-w-0">

                        <img
                            src="{{ asset('img/clinic_logo.png') }}"
                            alt="Clinic Logo"
                            class="max-w-full object-contain"
                            style="max-height: 55px;"
                        >

                        <p class="mt-2 text-xs text-slate-500">
                            Doctor Portal
                        </p>

                    </div>

                    <button id="closeSidebar"
                            type="button"
                            aria-label="Close sidebar"
                            class="flex-shrink-0 text-2xl text-slate-500
                                   hover:text-slate-800 md:hidden">
                        &times;
                    </button>

                </div>

            </div>


            <!-- ================= NAVIGATION ================= -->
            <nav class="flex-1 overflow-y-auto px-3 py-5 sm:px-4">

                <p class="mb-3 px-3 text-xs font-semibold uppercase
                          text-slate-400">
                    Main Menu
                </p>

                <!-- DASHBOARD -->
                <a href="{{ route('doctor.dashboard') }}"
                   class="mb-1 flex items-center gap-3 rounded-lg
                          bg-blue-50 px-3 py-3 text-blue-600">

                    <span class="text-lg">🏠</span>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>

                <!-- APPOINTMENTS -->
                <a href="{{ route('appointments.index') }}"
                   class="mb-1 flex items-center gap-3 rounded-lg
                          px-3 py-3 text-slate-600 transition
                          hover:bg-blue-50 hover:text-blue-600">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>

                <!-- PATIENTS -->
                <a href="{{ route('patients.index') }}"
                   class="mb-1 flex items-center gap-3 rounded-lg
                          px-3 py-3 text-slate-600 transition
                          hover:bg-blue-50 hover:text-blue-600">

                    <span class="text-lg">👥</span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a>

                <!-- MEDICAL RECORDS -->
                <a href="{{ route('medical_records.index') }}"
                   class="mb-1 flex items-center gap-3 rounded-lg
                          px-3 py-3 text-slate-600 transition
                          hover:bg-blue-50 hover:text-blue-600">

                    <span class="text-lg">🗂️</span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>

                <!-- PRESCRIPTIONS -->
                <a href="{{ route('prescriptions.index') }}"
                   class="mb-1 flex items-center gap-3 rounded-lg
                          px-3 py-3 text-slate-600 transition
                          hover:bg-blue-50 hover:text-blue-600">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a>

            </nav>


            <!-- ================= SIDEBAR BOTTOM ================= -->
            <div class="border-t border-slate-200 px-3 py-4 sm:px-4">

                <!-- USER INFORMATION -->
                <div class="mb-2 px-3 py-3">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 flex-shrink-0
                                    items-center justify-center rounded-full
                                    bg-blue-100 font-bold text-blue-700">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div class="min-w-0">

                            <p class="truncate text-sm font-semibold text-slate-800">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs capitalize text-slate-500">
                                {{ auth()->user()->role }}
                            </p>

                        </div>

                    </div>

                </div>

                <!-- SETTINGS -->
                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-3
                          text-slate-600 transition hover:bg-slate-100">

                    <span class="text-lg">⚙️</span>

                    <span class="font-medium">
                        Settings
                    </span>

                </a>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="flex w-full items-center gap-3 rounded-lg
                                   px-3 py-3 text-left text-red-500
                                   transition hover:bg-red-50">

                        <span class="text-lg">🚪</span>

                        <span class="font-medium">
                            Logout
                        </span>

                    </button>
                </form>

            </div>

        </aside>


        <!-- ================= MAIN CONTENT ================= -->
        <main class="min-w-0 w-full flex-1">


            <!-- ================= MOBILE HEADER ================= -->
            <header class="sticky top-0 z-30 border-b border-slate-200
                           bg-white px-4 py-4 md:hidden">

                <div class="flex items-center gap-3">

                    <button id="openSidebar"
                            type="button"
                            aria-label="Open sidebar"
                            class="flex h-10 w-10 flex-shrink-0
                                   items-center justify-center rounded-lg
                                   bg-blue-50 text-xl text-blue-600
                                   hover:bg-blue-100">

                        ☰

                    </button>

                    <div class="min-w-0 flex-1">

                        <h1 class="truncate text-lg font-bold text-slate-800">
                            🏥 Clinic System
                        </h1>

                        <p class="truncate text-xs text-slate-500">
                            Doctor Dashboard
                        </p>

                    </div>

                    <!-- MOBILE NOTIFICATION BELL -->
                    <a href="#upcoming-appointments"
                       aria-label="View upcoming appointments"
                       class="relative flex h-10 w-10 flex-shrink-0
                              items-center justify-center rounded-xl
                              border border-slate-200 bg-white
                              text-xl hover:bg-slate-50">

                        🔔

                        @if (($upcomingCount ?? 0) > 0)
                            <span class="absolute -right-1 -top-1
                                         flex h-5 min-w-5 items-center
                                         justify-center rounded-full
                                         bg-red-500 px-1 text-xs
                                         font-bold text-white">

                                {{ $upcomingCount > 99 ? '99+' : $upcomingCount }}

                            </span>
                        @endif

                    </a>

                </div>

            </header>


            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden border-b border-slate-200 bg-white
                           px-6 py-5 md:block lg:px-8">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            Doctor Dashboard
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Welcome back, Dr. {{ auth()->user()->name }}.
                        </p>

                    </div>

                    <div class="flex items-center gap-4">

                        <!-- NOTIFICATION BELL -->
                        <a href="#upcoming-appointments"
                           aria-label="View upcoming appointments"
                           class="relative flex h-11 w-11 items-center
                                  justify-center rounded-xl border
                                  border-slate-200 bg-white text-xl
                                  transition hover:bg-blue-50">

                            🔔

                            @if (($upcomingCount ?? 0) > 0)
                                <span class="absolute -right-1 -top-1
                                             flex h-5 min-w-5 items-center
                                             justify-center rounded-full
                                             bg-red-500 px-1 text-xs
                                             font-bold text-white">

                                    {{ $upcomingCount > 99 ? '99+' : $upcomingCount }}

                                </span>
                            @endif

                        </a>

                        <!-- DOCTOR PROFILE -->
                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 flex-shrink-0
                                        items-center justify-center rounded-full
                                        bg-blue-100 font-bold text-blue-700">

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            </div>

                            <div>

                                <p class="text-sm font-semibold text-slate-800">
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="text-xs text-slate-500">
                                    Doctor
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </header>


            <!-- ================= DASHBOARD CONTENT ================= -->
            <section class="space-y-6 px-4 py-5 sm:px-6 sm:py-6
                            lg:px-8 lg:py-8">


                <!-- ================= WELCOME BANNER ================= -->
                <div class="overflow-hidden rounded-2xl
                            bg-gradient-to-r from-blue-700 to-indigo-600
                            p-6 text-white shadow-sm sm:p-8">

                    <p class="text-sm font-medium text-blue-100">
                        CLINIC MANAGEMENT SYSTEM
                    </p>

                    <h3 class="mt-2 text-2xl font-bold sm:text-3xl">
                        Good day, Dr. {{ auth()->user()->name }}!
                    </h3>

                    <p class="mt-3 max-w-2xl text-sm leading-6 text-blue-100">
                        Manage your appointments, review patient information,
                        maintain medical records, and provide prescriptions
                        through your doctor portal.
                    </p>

                    <a href="{{ route('appointments.index') }}"
                       class="mt-5 inline-flex items-center rounded-lg
                              bg-white px-5 py-3 text-sm font-semibold
                              text-blue-700 transition hover:bg-blue-50">

                        View Appointments →

                    </a>

                </div>


                <!-- ================= STATISTICS ================= -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3
                            lg:gap-5">

                    <!-- TOTAL APPOINTMENTS -->
                    <div class="rounded-xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Appointments
                                </p>

                                <p class="mt-2 text-3xl font-bold text-slate-800">
                                    {{ $totalAppointments ?? 0 }}
                                </p>

                                <p class="mt-2 text-xs text-slate-500">
                                    Appointments assigned to you
                                </p>

                            </div>

                            <div class="flex h-12 w-12 flex-shrink-0
                                        items-center justify-center rounded-xl
                                        bg-blue-100 text-2xl text-blue-600">

                                📅

                            </div>

                        </div>

                        <a href="{{ route('appointments.index') }}"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-blue-600 hover:text-blue-800">

                            View Appointments →

                        </a>

                    </div>


                    <!-- TODAY'S APPOINTMENTS -->
                    <div class="rounded-xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Today's Appointments
                                </p>

                                <p class="mt-2 text-3xl font-bold text-slate-800">
                                    {{ $todayCount ?? 0 }}
                                </p>

                                <p class="mt-2 text-xs text-slate-500">
                                    Scheduled for today
                                </p>

                            </div>

                            <div class="flex h-12 w-12 flex-shrink-0
                                        items-center justify-center rounded-xl
                                        bg-emerald-100 text-2xl text-emerald-600">

                                🗓️

                            </div>

                        </div>

                        <a href="#today-appointments"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-emerald-600 hover:text-emerald-800">

                            View Today's Schedule →

                        </a>

                    </div>


                    <!-- UPCOMING APPOINTMENTS -->
                    <div class="rounded-xl border border-slate-200
                                bg-white p-5 shadow-sm sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Upcoming Appointments
                                </p>

                                <p class="mt-2 text-3xl font-bold text-slate-800">
                                    {{ $upcomingCount ?? 0 }}
                                </p>

                                <p class="mt-2 text-xs text-slate-500">
                                    Starting today
                                </p>

                            </div>

                            <div class="flex h-12 w-12 flex-shrink-0
                                        items-center justify-center rounded-xl
                                        bg-amber-100 text-2xl text-amber-600">

                                🔔

                            </div>

                        </div>

                        <a href="#upcoming-appointments"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-amber-600 hover:text-amber-800">

                            View Schedule →

                        </a>

                    </div>

                </div>


                <!-- ================= TODAY'S APPOINTMENTS ================= -->
                <div id="today-appointments"
                     class="overflow-hidden rounded-xl border
                            border-slate-200 bg-white shadow-sm">

                    <div class="flex flex-col gap-3 border-b border-slate-200
                                px-5 py-5 sm:flex-row sm:items-center
                                sm:justify-between sm:px-6">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">
                                Today's Appointments
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Your scheduled consultations for today.
                            </p>

                        </div>

                        <span class="inline-flex w-fit items-center rounded-full
                                     bg-blue-50 px-3 py-1 text-xs font-semibold
                                     text-blue-700">

                            {{ ($todayAppointments ?? collect())->count() }}
                            appointment(s)

                        </span>

                    </div>


                    @if (($todayAppointments ?? collect())->isNotEmpty())

                        <div class="divide-y divide-slate-100">

                            @foreach ($todayAppointments as $appointment)

                                <div class="flex flex-col gap-4 px-5 py-5
                                            transition hover:bg-slate-50
                                            sm:flex-row sm:items-center
                                            sm:justify-between sm:px-6">

                                    <div class="flex min-w-0 items-start gap-3">

                                        <div class="flex h-11 w-11 flex-shrink-0
                                                    items-center justify-center
                                                    rounded-xl bg-blue-50 text-xl">

                                            👤

                                        </div>

                                        <div class="min-w-0">

                                            <p class="truncate font-semibold
                                                      text-slate-800">

                                                {{ $appointment->patient?->first_name ?? 'Unknown' }}
                                                {{ $appointment->patient?->last_name ?? 'Patient' }}

                                            </p>

                                            <p class="mt-1 text-sm text-slate-500">

                                                {{ $appointment->reason ?: 'General consultation' }}

                                            </p>

                                            <p class="mt-2 text-xs text-slate-500">

                                                📅
                                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}

                                                <span class="mx-1">·</span>

                                                🕒
                                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}

                                            </p>

                                        </div>

                                    </div>


                                    <div class="flex flex-wrap items-center gap-3 sm:justify-end">

                                        @php
                                            $status = strtolower($appointment->status ?? 'pending');

                                            $statusClasses = match ($status) {
                                                'confirmed' => 'bg-blue-100 text-blue-700',
                                                'completed' => 'bg-emerald-100 text-emerald-700',
                                                'cancelled', 'canceled' => 'bg-red-100 text-red-700',
                                                'pending' => 'bg-amber-100 text-amber-700',
                                                default => 'bg-slate-100 text-slate-700',
                                            };
                                        @endphp

                                        <span class="inline-flex rounded-full px-3 py-1
                                                     text-xs font-semibold capitalize
                                                     {{ $statusClasses }}">

                                            {{ $appointment->status ?? 'Pending' }}

                                        </span>

                                        <a href="{{ route('appointments.index') }}"
                                           class="text-sm font-semibold text-blue-600
                                                  hover:text-blue-800">

                                            View →

                                        </a>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="px-5 py-12 text-center sm:px-6">

                            <div class="text-4xl">📅</div>

                            <h4 class="mt-3 font-semibold text-slate-800">
                                No appointments today
                            </h4>

                            <p class="mt-1 text-sm text-slate-500">
                                You don't have any appointments scheduled for today.
                            </p>

                        </div>

                    @endif

                </div>


                <!-- ================= UPCOMING APPOINTMENTS ================= -->
                <div id="upcoming-appointments"
                     class="overflow-hidden rounded-xl border
                            border-slate-200 bg-white shadow-sm">

                    <div class="flex flex-col gap-3 border-b border-slate-200
                                px-5 py-5 sm:flex-row sm:items-center
                                sm:justify-between sm:px-6">

                        <div>

                            <h3 class="text-lg font-semibold text-slate-800">
                                Upcoming Appointments
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Keep track of your upcoming patient consultations.
                            </p>

                        </div>

                        <a href="{{ route('appointments.index') }}"
                           class="inline-flex w-fit items-center rounded-lg
                                  border border-slate-200 px-4 py-2 text-sm
                                  font-semibold text-slate-700 transition
                                  hover:bg-slate-50">

                            All Appointments →

                        </a>

                    </div>


                    @if (($upcomingAppointments ?? collect())->isNotEmpty())

                        <div class="overflow-x-auto">

                            <table class="w-full min-w-[700px] text-left">

                                <thead class="bg-slate-50">

                                    <tr class="text-xs uppercase tracking-wide
                                               text-slate-500">

                                        <th class="px-6 py-4 font-semibold">
                                            Patient
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Date
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Time
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Reason
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Status
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-slate-100">

                                    @foreach ($upcomingAppointments as $appointment)

                                        <tr class="transition hover:bg-slate-50">

                                            <td class="px-6 py-4">

                                                <div class="flex items-center gap-3">

                                                    <div class="flex h-9 w-9 flex-shrink-0
                                                                items-center justify-center
                                                                rounded-full bg-blue-100
                                                                text-sm font-bold text-blue-700">

                                                        {{ strtoupper(substr($appointment->patient?->first_name ?? 'P', 0, 1)) }}

                                                    </div>

                                                    <div>

                                                        <p class="font-semibold text-slate-800">

                                                            {{ $appointment->patient?->first_name ?? 'Unknown' }}
                                                            {{ $appointment->patient?->last_name ?? 'Patient' }}

                                                        </p>

                                                        <p class="mt-1 text-xs text-slate-500">
                                                            Patient
                                                        </p>

                                                    </div>

                                                </div>

                                            </td>


                                            <td class="whitespace-nowrap px-6 py-4">

                                                <p class="text-sm font-medium text-slate-700">

                                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}

                                                </p>

                                                <p class="mt-1 text-xs text-slate-500">

                                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l') }}

                                                </p>

                                            </td>


                                            <td class="whitespace-nowrap px-6 py-4
                                                       text-sm text-slate-600">

                                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}

                                            </td>


                                            <td class="max-w-xs px-6 py-4">

                                                <p class="truncate text-sm text-slate-600">

                                                    {{ $appointment->reason ?: 'General consultation' }}

                                                </p>

                                            </td>


                                            <td class="whitespace-nowrap px-6 py-4">

                                                @php
                                                    $status = strtolower($appointment->status ?? 'pending');

                                                    $statusClasses = match ($status) {
                                                        'confirmed' => 'bg-blue-100 text-blue-700',
                                                        'completed' => 'bg-emerald-100 text-emerald-700',
                                                        'cancelled', 'canceled' => 'bg-red-100 text-red-700',
                                                        'pending' => 'bg-amber-100 text-amber-700',
                                                        default => 'bg-slate-100 text-slate-700',
                                                    };
                                                @endphp

                                                <span class="inline-flex rounded-full px-3 py-1
                                                             text-xs font-semibold capitalize
                                                             {{ $statusClasses }}">

                                                    {{ $appointment->status ?? 'Pending' }}

                                                </span>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        <div class="border-t border-slate-100 px-5 py-4 sm:px-6">

                            <p class="text-xs text-slate-500">
                                Showing up to 10 scheduled appointments.
                            </p>

                        </div>

                    @else

                        <div class="px-5 py-12 text-center sm:px-6">

                            <div class="text-4xl">🗓️</div>

                            <h4 class="mt-3 font-semibold text-slate-800">
                                No upcoming appointments
                            </h4>

                            <p class="mt-1 text-sm text-slate-500">
                                Your upcoming appointments will appear here when scheduled.
                            </p>

                        </div>

                    @endif

                </div>


                <!-- ================= QUICK ACTIONS ================= -->
                <div class="rounded-xl border border-slate-200
                            bg-white p-5 shadow-sm sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-lg font-semibold text-slate-800">
                            Quick Actions
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Quickly access your clinic activities.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                        <!-- APPOINTMENTS -->
                        <a href="{{ route('appointments.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-blue-300 hover:bg-blue-50">

                            <span class="text-2xl">📅</span>

                            <h4 class="mt-3 font-semibold text-slate-800">
                                Manage Appointments
                            </h4>

                            <p class="mt-1 text-sm text-slate-500">
                                Review your scheduled clinic appointments.
                            </p>

                        </a>


                        <!-- PATIENTS -->
                        <a href="{{ route('patients.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-emerald-300 hover:bg-emerald-50">

                            <span class="text-2xl">👥</span>

                            <h4 class="mt-3 font-semibold text-slate-800">
                                Patient Directory
                            </h4>

                            <p class="mt-1 text-sm text-slate-500">
                                View registered patient information.
                            </p>

                        </a>


                        <!-- PRESCRIPTIONS -->
                        <a href="{{ route('prescriptions.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-purple-300 hover:bg-purple-50">

                            <span class="text-2xl">💊</span>

                            <h4 class="mt-3 font-semibold text-slate-800">
                                Prescriptions
                            </h4>

                            <p class="mt-1 text-sm text-slate-500">
                                Access the prescription management page.
                            </p>

                        </a>

                    </div>

                </div>


                <!-- ================= FOOTER ================= -->
                <footer class="py-4 text-center text-xs text-slate-500">

                    © {{ date('Y') }} Clinic Management System.
                    Doctor Portal.

                </footer>

            </section>

        </main>

    </div>


    <!-- ================= MOBILE SIDEBAR SCRIPT ================= -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        function showSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function hideSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
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

        const sidebarLinks = sidebar.querySelectorAll('nav a');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    hideSidebar();
                }
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>

</body>
</html>