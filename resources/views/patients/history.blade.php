<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient History - {{ $patient->first_name }} {{ $patient->last_name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 z-40 hidden h-screen w-64 border-r border-slate-200 bg-white lg:block">

        <!-- Logo -->
        <div class="border-b border-slate-200 p-6">
            <h1 class="text-xl font-bold text-blue-600">
              <img src="{{ asset('img/clinic_logo.png') }}" alt="Clinic Logo">
            </h1>

            <p class="mt-1 text-xs text-slate-500">
                Management System
            </p>
        </div>

        <!-- Navigation -->
        <nav class="space-y-1 p-4">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>📊</span>
                <span>Dashboard</span> -->
            </a>

            <a href="{{ route('patients.index') }}"
                class="flex items-center gap-3 rounded-lg bg-blue-50 px-4 py-3 font-medium text-blue-600">
                <span>👤</span>
                <span>Patients</span>
            </a>


            <a href="{{ route('patients.message') }}">
    💬 Message Us
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
            <a href="{{ route('doctors.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>👨‍⚕️</span>
                <span>Doctors</span> -->
            </a>

            <a href="{{ route('nurses.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>👩‍⚕️</span>
                <span>Nurses</span> -->
            </a>

            <a href="{{ route('appointments.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>📅</span>`
                <span>Appointments</span> -->
            </a>

            <a href="{{ route('medical_records.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>📋</span>
                <span>Medical Records</span> -->
            </a>

            <a href="{{ route('prescriptions.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>💊</span>
                <span>Prescriptions</span> -->
            </a>

            <a href="{{ route('bills.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-100">
                <!-- <span>💰</span>
                <span>Billing</span> -->
            </a>

        </nav>

    </aside>


    <!-- Main Content -->
    <main class="min-h-screen lg:ml-64">

        <div class="mx-auto max-w-7xl p-4 sm:p-6">

            <!-- Header -->
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <div class="mb-2 flex items-center gap-2">
                        <!-- <a href="{{ route('patients.index') }}"
                            class="text-sm text-blue-600 hover:text-blue-700">
                            ← Patients
                        </a> -->

                        <!-- <span class="text-slate-400">/</span> -->

                        <!-- <span class="text-sm text-slate-500">
                            Patient History
                        </span> -->
                    </div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Patient History
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Complete medical history and records of the patient
                    </p>
                </div>


                <!-- Header Buttons -->
                

                


                   <a href="{{ auth()->user()->role === 'admin'
    ? route('dashboard')
    : (auth()->user()->role === 'doctor'
        ? route('doctor.dashboard')
        : (auth()->user()->role === 'nurse'
            ? route('nurse.dashboard')
            : route('patients.my-history'))) }}"
   class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2
          text-sm font-semibold text-white transition hover:bg-blue-700">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-5 w-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>

    Return to Dashboard
</a>





            </div>


            <!-- Patient Information -->
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Patient Information
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Basic information of the patient
                        </p>
                    </div>

                    <span class="w-fit rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">
                        {{ $patient->patient_id }}
                    </span>

                </div>


                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    <!-- Full Name -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Full Name
                        </p>

                        <p class="font-semibold text-slate-800">
                            {{ $patient->first_name }} {{ $patient->last_name }}
                        </p>
                    </div>


                    <!-- Date of Birth -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Date of Birth
                        </p>

                        <p class="font-semibold text-slate-800">
                            {{ $patient->date_of_birth }}
                        </p>
                    </div>


                    <!-- Gender -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Gender
                        </p>

                        <p class="font-semibold text-slate-800">
                            {{ $patient->gender }}
                        </p>
                    </div>


                    <!-- Mobile -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Mobile Number
                        </p>

                        <p class="font-semibold text-slate-800">
                            {{ $patient->mobile_number ?? 'N/A' }}
                        </p>
                    </div>


                    <!-- Email -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Email
                        </p>

                        <p class="break-words font-semibold text-slate-800">
                            {{ $patient->email ?? 'N/A' }}
                        </p>
                    </div>


                    <!-- Address -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Address
                        </p>

                        <p class="font-semibold text-slate-800">
                            {{ $patient->address ?? 'N/A' }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- Medical History -->
            <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5">
                    <h2 class="text-lg font-semibold text-slate-800">
                        Medical History
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Existing allergies and previous medical information
                    </p>
                </div>


                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <!-- Allergies -->
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="mb-1 text-sm font-medium text-slate-500">
                            Allergies
                        </p>

                        <p class="whitespace-pre-line text-slate-800">
                            {{ $patient->allergies ?? 'No allergies recorded.' }}
                        </p>
                    </div>


                    <!-- Previous Medical History -->
                    <div class="rounded-lg bg-slate-50 p-4">
                        <p class="mb-1 text-sm font-medium text-slate-500">
                            Previous Medical History
                        </p>

                        <p class="whitespace-pre-line text-slate-800">
                            {{ $patient->medical_history ?? 'No medical history recorded.' }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- Appointments -->
            <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Appointments
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Patient appointment history
                        </p>
                    </div>

                    <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">
                        {{ $appointments->count() }}
                    </span>

                </div>


                @if($appointments->count())

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[750px] text-left text-sm">

                            <thead class="border-b border-slate-200 bg-slate-50">

                                <tr>
                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Date
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Time
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Doctor
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Reason
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Status
                                    </th>
                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-200">

                                @foreach($appointments as $appointment)

                                    <tr class="hover:bg-slate-50">

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $appointment->appointment_date }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $appointment->appointment_time }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            Dr.
                                            {{ $appointment->doctor->first_name ?? 'N/A' }}
                                            {{ $appointment->doctor->last_name ?? '' }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $appointment->reason ?? 'N/A' }}
                                        </td>

                                        <td class="px-4 py-3">

                                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700">
                                                {{ $appointment->status }}
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="py-8 text-center text-slate-500">
                        No appointments recorded for this patient.
                    </div>

                @endif

            </div>


            <!-- Medical Records -->
            <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Medical Records
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Patient medical examination and treatment records
                        </p>
                    </div>

                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">
                        {{ $medicalRecords->count() }}
                    </span>

                </div>


                @if($medicalRecords->count())

                    <div class="space-y-4">

                        @foreach($medicalRecords as $record)

                            <div class="rounded-lg border border-slate-200 p-5">

                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                    <!-- Doctor -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Doctor
                                        </p>

                                        <p class="font-semibold text-slate-800">
                                            Dr. {{ $record->doctor->first_name ?? 'N/A' }}
                                            {{ $record->doctor->last_name ?? '' }}
                                        </p>
                                    </div>


                                    <!-- Date -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Date
                                        </p>

                                        <p class="font-semibold text-slate-800">
                                            {{ $record->created_at->format('M d, Y') }}
                                        </p>
                                    </div>


                                    <!-- Symptoms -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Symptoms
                                        </p>

                                        <p class="whitespace-pre-line text-slate-800">
                                            {{ $record->symptoms ?? 'N/A' }}
                                        </p>
                                    </div>


                                    <!-- Diagnosis -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Diagnosis
                                        </p>

                                        <p class="whitespace-pre-line text-slate-800">
                                            {{ $record->diagnosis ?? 'N/A' }}
                                        </p>
                                    </div>


                                    <!-- Treatment -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Treatment
                                        </p>

                                        <p class="whitespace-pre-line text-slate-800">
                                            {{ $record->treatment ?? 'N/A' }}
                                        </p>
                                    </div>


                                    <!-- Notes -->
                                    <div>
                                        <p class="text-sm text-slate-500">
                                            Notes
                                        </p>

                                        <p class="whitespace-pre-line text-slate-800">
                                            {{ $record->notes ?? 'N/A' }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="py-8 text-center text-slate-500">
                        No medical records recorded for this patient.
                    </div>

                @endif

            </div>


            <!-- Prescriptions -->
            <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Prescriptions
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Patient prescription history
                        </p>
                    </div>

                    <span class="rounded-full bg-purple-100 px-3 py-1 text-sm font-medium text-purple-700">
                        {{ $prescriptions->count() }}
                    </span>

                </div>


                @if($prescriptions->count())

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[750px] text-left text-sm">

                            <thead class="border-b border-slate-200 bg-slate-50">

                                <tr>
                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Medicine
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Dosage
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Frequency
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Duration
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Doctor
                                    </th>
                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-200">

                                @foreach($prescriptions as $prescription)

                                    <tr class="hover:bg-slate-50">

                                        <td class="px-4 py-3 font-medium text-slate-800">
                                            {{ $prescription->medicine }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $prescription->dosage ?? 'N/A' }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $prescription->frequency ?? 'N/A' }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $prescription->duration ?? 'N/A' }}
                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            Dr. {{ $prescription->doctor->first_name ?? 'N/A' }}
                                            {{ $prescription->doctor->last_name ?? '' }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="py-8 text-center text-slate-500">
                        No prescriptions recorded for this patient.
                    </div>

                @endif

            </div>


            <!-- Billing -->
            <div class="mt-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <div class="mb-5 flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">
                            Billing
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Patient billing and payment history
                        </p>
                    </div>

                    <span class="rounded-full bg-orange-100 px-3 py-1 text-sm font-medium text-orange-700">
                        {{ $bills->count() }}
                    </span>

                </div>


                @if($bills->count())

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[650px] text-left text-sm">

                            <thead class="border-b border-slate-200 bg-slate-50">

                                <tr>
                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Description
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Amount
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Status
                                    </th>

                                    <th class="px-4 py-3 font-semibold text-slate-600">
                                        Payment Date
                                    </th>
                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-200">

                                @foreach($bills as $bill)

                                    <tr class="hover:bg-slate-50">

                                        <td class="px-4 py-3 text-slate-800">
                                            {{ $bill->description ?? 'N/A' }}
                                        </td>

                                        <td class="px-4 py-3 font-semibold text-slate-800">
                                            ₱{{ number_format($bill->amount, 2) }}
                                        </td>

                                        <td class="px-4 py-3">

                                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700">
                                                {{ $bill->status }}
                                            </span>

                                        </td>

                                        <td class="px-4 py-3 text-slate-700">
                                            {{ $bill->payment_date ?? 'Not paid' }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="py-8 text-center text-slate-500">
                        No billing records for this patient.
                    </div>

                @endif

            </div>


            <!-- Footer -->
            <div class="py-8 text-center">

                <a href="{{ route('patients.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-700">
                    ← Back to Patients
                </a>


          
    
                
            </div>

        </div>

    </main>

</body>

</html>