<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medical Record Details - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-6 py-5">

            <h1 class="text-2xl font-bold text-slate-800">
                Clinic Management System
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Medical Records Management
            </p>

        </div>
    </header>


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back Button -->
        <div class="mb-6">

            <a
                href="{{ route('medical_records.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Medical Records
            </a>

        </div>


        <!-- Medical Record Header -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-4">

                    <!-- Initial -->
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">

                        <span class="text-2xl font-bold text-blue-600">
                            {{ strtoupper(substr($medicalRecord->patient->first_name ?? 'M', 0, 1)) }}
                        </span>

                    </div>


                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">

                            @if($medicalRecord->patient)

                                {{ $medicalRecord->patient->first_name }}
                                {{ $medicalRecord->patient->last_name }}

                            @else

                                Unknown Patient

                            @endif

                        </h2>


                        <p class="text-sm text-slate-500 mt-1">

                            Medical Record ID: {{ $medicalRecord->id }}

                        </p>

                    </div>

                </div>


                <!-- Edit Button -->
                <a
                    href="{{ route('medical_records.edit', $medicalRecord->id) }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                >
                    Edit Medical Record
                </a>

            </div>

        </div>


        <!-- Medical Record Information -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <div class="px-6 py-5 border-b border-slate-200">

                <h3 class="text-lg font-semibold text-slate-800">
                    Medical Record Information
                </h3>

            </div>


            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <!-- Patient -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Patient
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->patient)

                                {{ $medicalRecord->patient->first_name }}
                                {{ $medicalRecord->patient->last_name }}

                                <span class="text-sm text-slate-500">
                                    ({{ $medicalRecord->patient->patient_id }})
                                </span>

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Doctor -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Doctor
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->doctor)

                                Dr. {{ $medicalRecord->doctor->first_name }}
                                {{ $medicalRecord->doctor->last_name }}

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Specialization -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Specialization
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->doctor)

                                {{ $medicalRecord->doctor->specialization ?: 'N/A' }}

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Appointment -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Appointment
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->appointment)

                                #{{ $medicalRecord->appointment->id }}

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Appointment Date -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Appointment Date
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->appointment)

                                {{ $medicalRecord->appointment->appointment_date }}

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Appointment Time -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Appointment Time
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">

                            @if($medicalRecord->appointment)

                                {{ $medicalRecord->appointment->appointment_time }}

                            @else

                                N/A

                            @endif

                        </p>

                    </div>


                    <!-- Symptoms -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Symptoms
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $medicalRecord->symptoms ?: 'N/A' }}
                        </p>

                    </div>


                    <!-- Diagnosis -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Diagnosis
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $medicalRecord->diagnosis ?: 'N/A' }}
                        </p>

                    </div>


                    <!-- Treatment -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Treatment
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $medicalRecord->treatment ?: 'N/A' }}
                        </p>

                    </div>


                    <!-- Notes -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Notes
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $medicalRecord->notes ?: 'N/A' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom Actions -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">

            <a
                href="{{ route('medical_records.index') }}"
                class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-white text-center"
            >
                Back
            </a>


            <a
                href="{{ route('medical_records.edit', $medicalRecord->id) }}"
                class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 text-center"
            >
                Edit Medical Record
            </a>

        </div>

    </main>

</body>
</html>