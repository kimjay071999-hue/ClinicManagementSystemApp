<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Clinic Management System</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        <!-- ================= MOBILE OVERLAY ================= -->
        <div id="sidebarOverlay"
             class="fixed inset-0 bg-black/40 z-40 hidden md:hidden">
        </div>


        <!-- ================= SIDEBAR ================= -->
        <aside id="sidebar"
               class="fixed md:sticky top-0 left-0 z-50
                      w-64 h-screen bg-white border-r border-slate-200
                      flex flex-col
                      transform -translate-x-full md:translate-x-0
                      transition-transform duration-300 ease-in-out">

            <!-- ================= LOGO ================= -->
            <div class="px-5 sm:px-6 py-5 border-b border-slate-200">

                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-lg sm:text-xl font-bold text-slate-800">
                            <img src="{{ asset('img/clinic_logo.png') }}" alt="Clinic Logo">
                        </h1>

                        <p class="text-xs text-slate-500 mt-1">
                            <!-- Management System -->
                        </p>
                    </div>

                    <!-- Close Button Mobile -->
                    <button id="closeSidebar"
                            type="button"
                            class="md:hidden text-slate-500
                                   hover:text-slate-800 text-2xl">
                        ✕
                    </button>

                </div>

            </div>


            <!-- ================= NAVIGATION ================= -->
            <nav class="flex-1 px-3 sm:px-4 py-5 overflow-y-auto">

                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Main Menu
                </p>


                <!-- ================= DASHBOARD ================= -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">🏠</span>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>


                <!-- ================= PATIENTS ================= -->
                <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👥</span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a>


                <!-- ================= DOCTORS ================= -->
                <a href="{{ url('/doctors') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>

                    <span class="font-medium">
                        Doctors
                    </span>

                </a>


                <!-- ================= APPOINTMENTS ================= -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>


                <!-- ================= MEDICAL RECORDS ================= -->
                <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">🗂️</span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>


                <!-- ================= PRESCRIPTIONS ================= -->
                <a href="{{ route('prescriptions.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a>


                <!-- ================= BILLS ================= -->
                <a href="{{ route('bills.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💰</span>

                    <span class="font-medium">
                        Bills
                    </span>

                </a>


                    <!-- ================= History ================= -->
               <a href="{{ route('reports.admin') }}"
   class="flex items-center gap-3 px-3 py-3 rounded-lg
          text-slate-600 hover:bg-blue-50
          hover:text-blue-600 transition mb-1">

    <span class="text-lg">📈</span>

    <span class="font-medium">
        Reports
    </span>

</a>

                <!-- Divider -->
                <div class="border-t border-slate-200 my-5"></div>


                <!-- Patient Section -->
                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Patient
                </p>


                <!-- Add Patient -->
                <a href="{{ route('patients.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm">

                    <span class="text-lg">➕</span>

                    <span class="font-medium">
                        Add Patient
                    </span>

                </a>

            </nav>


            <!-- ================= SIDEBAR BOTTOM ================= -->
            <div class="px-3 sm:px-4 py-4 border-t border-slate-200">

                <!-- Settings -->
               <a href="{{ route('settings.index') }}"
   class="flex items-center gap-3 px-3 py-3 rounded-lg
          text-slate-600 hover:bg-slate-100 transition">

    <span class="text-lg">⚙️</span>

    <span class="font-medium">
        Settings
    </span>

</a>


         <!-- Logout -->
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit"
        class="w-full flex items-center gap-3 px-3 py-3 rounded-lg
               text-red-500 hover:bg-red-50 transition text-left">

        <span class="text-lg">🚪</span>

        <span class="font-medium">
            Logout
        </span>

    </button>
</form>

            </div>

        </aside>


        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 min-w-0 w-full">


            <!-- ================= MOBILE HEADER ================= -->
            <header class="md:hidden bg-white border-b border-slate-200
                           px-4 py-4 sticky top-0 z-30">

                <div class="flex items-center justify-between gap-3">

                    <div class="flex items-center gap-3 min-w-0">

                        <!-- Menu Button -->
                        <button id="openSidebar"
                                type="button"
                                class="flex-shrink-0
                                       w-10 h-10 rounded-lg
                                       bg-blue-50 text-blue-600
                                       hover:bg-blue-100
                                       flex items-center justify-center
                                       text-xl">

                            ☰

                        </button>


                        <div class="min-w-0">

                            <h1 class="text-lg font-bold text-slate-800 truncate">
                                🏥 Clinic System
                            </h1>

                            <p class="text-xs text-slate-500 truncate">
                                Dashboard
                            </p>

                        </div>

                    </div>

                </div>

            </header>


            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            Dashboard
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Overview of your clinic management system.
                        </p>

                    </div>

                </div>

            </header>


            <!-- ================= CONTENT ================= -->
            <div class="px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">


                <!-- ================= PAGE TITLE MOBILE ================= -->
                <div class="md:hidden mb-5">

                    <h2 class="text-xl font-bold text-slate-800">
                        Dashboard
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Overview of your clinic management system.
                    </p>

                </div>


                <!-- ================= STATISTICS ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                            lg:grid-cols-4 gap-4 lg:gap-5 mb-6 lg:mb-8">


                    <!-- Total Patients -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Patients
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $totalPatients }}

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-blue-100 text-blue-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👥

                            </div>

                        </div>

                        <a href="{{ route('patients.index') }}"
                           class="inline-block mt-4 text-sm font-medium
                                  text-blue-600 hover:text-blue-700">

                            View Patients 

                        </a>

                    </div>


                    <!-- Total Doctors -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Doctors
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $totalDoctors }}

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-indigo-100 text-indigo-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👨‍⚕️

                            </div>

                        </div>

                        <a href="{{ url('/doctors') }}"
                           class="inline-block mt-4 text-sm font-medium
                                  text-indigo-600 hover:text-indigo-700">

                            View Doctors 

                        </a>
                        

                    </div>

                    


                    <!-- Appointments -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Appointments
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $totalAppointments }}

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-green-100 text-green-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                📅

                            </div>

                        </div>

                        <a href="{{ route('appointments.index') }}"
                           class="inline-block mt-4 text-sm font-medium
                                  text-green-600 hover:text-green-700">

                            View Appointments 

                        </a>

                    </div>


                    <!-- Total Bills -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Bills
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $totalBills }}

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-yellow-100 text-yellow-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                💰

                            </div>

                        </div>

                        <a href="{{ route('bills.index') }}"
                           class="inline-block mt-4 text-sm font-medium
                                  text-yellow-600 hover:text-yellow-700">

                            View Billing 

                        </a>

                    </div>

                </div>
                  
                
                <!-- ================= FINANCIAL SUMMARY ================= -->
                <div class="grid grid-cols-1 md:grid-cols-3
                            gap-4 lg:gap-5 mb-6 lg:mb-8">


                    <!-- Paid Revenue -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <p class="text-sm text-slate-500">
                            Paid Revenue
                        </p>

                        <p class="text-2xl font-bold text-green-600 mt-2">
                            ₱{{ number_format($totalRevenue, 2) }}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Total paid bill amount
                        </p>

                    </div>


                    <!-- Pending Bills -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <p class="text-sm text-slate-500">
                            Pending Bills
                        </p>

                        <p class="text-2xl font-bold text-yellow-600 mt-2">
                            {{ $pendingBills }}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Bills awaiting payment
                        </p>

                    </div>


                    <!-- Paid Bills -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <p class="text-sm text-slate-500">
                            Paid Bills
                        </p>

                        <p class="text-2xl font-bold text-green-600 mt-2">
                            {{ $paidBills }}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Successfully paid bills
                        </p>

                    </div>

                </div>


               <!-- ================= RECENT DATA ================= -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

    <!-- ================= RECENT APPOINTMENTS ================= -->
    <section class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between
                    px-5 py-4 border-b border-slate-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-blue-50
                            flex items-center justify-center text-blue-600">

                    <svg class="w-5 h-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>

                    </svg>

                </div>

                <div>
                    <h3 class="text-base font-bold text-slate-800">
                        Recent Appointments
                    </h3>

                    <p class="text-xs text-slate-500 mt-0.5">
                        Latest scheduled visits
                    </p>
                </div>

            </div>

            <a href="{{ route('appointments.index') }}"
               class="inline-flex items-center gap-1
                      text-sm font-semibold text-blue-600
                      hover:text-blue-800 transition">

                View all

                <svg class="w-4 h-4" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>

                </svg>

            </a>

        </div>

        <!-- Appointment List -->
        @if($recentAppointments->count() > 0)

            <div class="divide-y divide-slate-100">

                @foreach($recentAppointments as $appointment)

                    @php
                        $status = strtolower($appointment->status ?? 'pending');

                        $statusStyles = [
                            'pending' => 'bg-amber-50 text-amber-700',
                            'confirmed' => 'bg-blue-50 text-blue-700',
                            'completed' => 'bg-emerald-50 text-emerald-700',
                            'cancelled' => 'bg-red-50 text-red-700',
                            'canceled' => 'bg-red-50 text-red-700',
                            'scheduled' => 'bg-violet-50 text-violet-700',
                        ];

                        $statusClass = $statusStyles[$status]
                            ?? 'bg-slate-100 text-slate-600';
                    @endphp

                    <div class="px-5 py-4 hover:bg-slate-50
                                transition-colors duration-200">

                        <div class="flex items-center justify-between gap-3">

                            <!-- Patient -->
                            <div class="flex items-center gap-3 min-w-0">

                                <div class="w-10 h-10 shrink-0 rounded-full
                                            bg-blue-100 text-blue-700
                                            flex items-center justify-center
                                            text-xs font-bold">

                                    {{ strtoupper(substr($appointment->patient->first_name ?? 'P', 0, 1)) }}{{ strtoupper(substr($appointment->patient->last_name ?? '', 0, 1)) }}

                                </div>

                                <div class="min-w-0">

                                    <p class="text-sm font-semibold
                                              text-slate-800 truncate">

                                        {{ $appointment->patient->first_name ?? 'Unknown' }}
                                        {{ $appointment->patient->last_name ?? '' }}

                                    </p>

                                    <p class="text-xs text-slate-500 mt-1 truncate">

                                        Dr.
                                        {{ $appointment->doctor->first_name ?? '' }}
                                        {{ $appointment->doctor->last_name ?? 'Unassigned' }}

                                    </p>

                                </div>

                            </div>

                            <!-- Appointment Date and Status -->
                            <div class="text-right shrink-0">

                                <p class="text-xs font-semibold text-slate-700">

                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}

                                </p>

                                @if(!empty($appointment->appointment_time))

                                    <p class="text-xs text-slate-500 mt-1">

                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}

                                    </p>

                                @endif

                                <span class="inline-flex items-center
                                             mt-2 px-2.5 py-1 rounded-full
                                             text-[10px] font-bold
                                             {{ $statusClass }}">

                                    {{ ucfirst($status) }}

                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="px-5 py-12 text-center">

                <div class="w-12 h-12 mx-auto rounded-xl
                            bg-blue-50 text-blue-500
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.7"
                              d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>

                    </svg>

                </div>

                <p class="text-sm font-semibold text-slate-700 mt-3">
                    No appointments yet
                </p>

                <p class="text-xs text-slate-500 mt-1">
                    Appointments will appear here when available.
                </p>

            </div>

        @endif

        <!-- Footer -->
        <div class="px-5 py-3 bg-slate-50/70
                    border-t border-slate-100">

            <p class="text-xs text-slate-500">
                <span class="font-semibold text-slate-700">
                    {{ $recentAppointments->count() }}
                </span>
                recent appointments
            </p>

        </div>

    </section>


    <!-- ================= RECENT PATIENTS ================= -->
    <section class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between
                    px-5 py-4 border-b border-slate-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-indigo-50
                            flex items-center justify-center text-indigo-600">

                    <svg class="w-5 h-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm13 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>

                    </svg>

                </div>

                <div>
                    <h3 class="text-base font-bold text-slate-800">
                        Recent Patients
                    </h3>

                    <p class="text-xs text-slate-500 mt-0.5">
                        Latest registered patients
                    </p>
                </div>

            </div>

            <a href="{{ route('patients.index') }}"
               class="inline-flex items-center gap-1
                      text-sm font-semibold text-indigo-600
                      hover:text-indigo-800 transition">

                View all

                <svg class="w-4 h-4" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>

                </svg>

            </a>

        </div>

        <!-- Patient List -->
        @if($recentPatients->count() > 0)

            <div class="divide-y divide-slate-100">

                @foreach($recentPatients as $patient)

                    <div class="flex items-center justify-between
                                gap-3 px-5 py-4
                                hover:bg-slate-50
                                transition-colors duration-200">

                        <!-- Patient Details -->
                        <div class="flex items-center gap-3 min-w-0">

                            <div class="w-10 h-10 shrink-0 rounded-full
                                        bg-indigo-100 text-indigo-700
                                        flex items-center justify-center
                                        text-xs font-bold">

                                {{ strtoupper(substr($patient->first_name ?? 'P', 0, 1)) }}{{ strtoupper(substr($patient->last_name ?? '', 0, 1)) }}

                            </div>

                            <div class="min-w-0">

                                <p class="text-sm font-semibold
                                          text-slate-800 truncate">

                                    {{ $patient->first_name }}
                                    {{ $patient->last_name }}

                                </p>

                                <div class="flex items-center gap-1.5 mt-1">

                                    <svg class="w-3.5 h-3.5 shrink-0
                                                text-slate-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.7"
                                              d="M8 7h8m-8 4h8m-8 4h5M6 3h9l4 4v14H6a2 2 0 01-2-2V5a2 2 0 012-2z"/>

                                    </svg>

                                    <p class="text-xs text-slate-500 truncate">

                                        {{ $patient->patient_id }}

                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- View Button -->
                        <a href="{{ route('patients.show', $patient->id) }}"
                           class="inline-flex items-center gap-1.5
                                  rounded-lg border border-slate-200
                                  bg-white px-3 py-2
                                  text-xs font-semibold text-slate-600
                                  hover:border-indigo-200
                                  hover:bg-indigo-50 hover:text-indigo-700
                                  transition-all shrink-0">

                            View

                            <svg class="w-3.5 h-3.5" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7"/>

                            </svg>

                        </a>

                    </div>

                @endforeach

            </div>

        @else

            <div class="px-5 py-12 text-center">

                <div class="w-12 h-12 mx-auto rounded-xl
                            bg-indigo-50 text-indigo-500
                            flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.7"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm13 10v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>

                    </svg>

                </div>

                <p class="text-sm font-semibold text-slate-700 mt-3">
                    No patients yet
                </p>

                <p class="text-xs text-slate-500 mt-1">
                    Newly registered patients will appear here.
                </p>

            </div>

        @endif

        <!-- Footer -->
        <div class="px-5 py-3 bg-slate-50/70
                    border-t border-slate-100">

            <p class="text-xs text-slate-500">
                <span class="font-semibold text-slate-700">
                    {{ $recentPatients->count() }}
                </span>
                recent patients
            </p>

        </div>

    </section>

</div>
                    <!-- ================= APPOINTMENTS CHART ================= -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mt-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-slate-800">
                Appointments Overview
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Monthly appointment activity
            </p>
        </div>

        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>

            <span class="text-sm font-medium text-slate-600">
                Appointments
            </span>
        </div>
    </div>

    <!-- Chart -->
    <div class="relative w-full h-[350px]">
        <canvas id="appointmentsChart"></canvas>
    </div>

</div>

                </div>


            </div>

            

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


        openSidebar.addEventListener('click', showSidebar);

        closeSidebar.addEventListener('click', hideSidebar);

        sidebarOverlay.addEventListener('click', hideSidebar);


        // Close sidebar when clicking navigation links on mobile
        const sidebarLinks = sidebar.querySelectorAll('a');

        sidebarLinks.forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth < 768) {

                    hideSidebar();

                }

            });

        });


        // Reset sidebar when screen becomes desktop
        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                sidebarOverlay.classList.add('hidden');

                document.body.classList.remove('overflow-hidden');

            }

        });

        // Chart

  const ctx = document.getElementById('appointmentsChart');

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],

            datasets: [{
                label: 'Appointments',

                data: [
                    12, 18, 15, 22, 19, 28,
                    24, 31, 27, 35, 30, 38
                ],

                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.08)',

                borderWidth: 3,

                pointBackgroundColor: '#2563eb',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,

                pointRadius: 4,
                pointHoverRadius: 6,

                tension: 0.4,
                fill: true
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    backgroundColor: '#0f172a',
                    padding: 12,
                    cornerRadius: 8
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },

                    ticks: {
                        color: '#64748b',
                        font: {
                            size: 12
                        }
                    }
                },

                y: {
                    beginAtZero: true,

                    ticks: {
                        color: '#64748b',
                        precision: 0
                    },

                    grid: {
                        color: '#e2e8f0'
                    }
                }
            }
        }
    });
    </script>

</body>

</html>