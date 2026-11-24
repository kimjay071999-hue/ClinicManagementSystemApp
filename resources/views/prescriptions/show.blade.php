<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prescription Details - Clinic Management System</title>

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
                Prescription Management
            </p>

        </div>
    </header>


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back -->
        <a
            href="{{ route('prescriptions.index') }}"
            class="inline-flex items-center text-sm text-slate-600 hover:text-blue-600 mb-6"
        >
            ← Back to Prescriptions
        </a>


        <!-- Prescription Header -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                <div class="flex items-center gap-4">

                    <!-- Avatar -->
                    <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xl font-bold">

                        {{ strtoupper(substr($prescription->patient->first_name ?? 'P', 0, 1)) }}

                    </div>


                    <div>

                        <h2 class="text-xl font-bold text-slate-800">

                            {{ $prescription->patient->first_name ?? 'N/A' }}
                            {{ $prescription->patient->last_name ?? '' }}

                        </h2>

                        <p class="text-sm text-slate-500 mt-1">

                            Prescription #{{ $prescription->id }}

                        </p>

                    </div>

                </div>


                <!-- Edit Button -->
                <a
                    href="{{ route('prescriptions.edit', $prescription->id) }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                >
                    Edit Prescription
                </a>

            </div>

        </div>


        <!-- Prescription Information -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Section Header -->
            <div class="px-6 py-5 border-b border-slate-200">

                <h3 class="text-lg font-semibold text-slate-800">
                    Prescription Information
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Details of the prescribed medicine
                </p>

            </div>


            <!-- Information -->
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <!-- Patient -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Patient
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->patient->first_name ?? 'N/A' }}
                            {{ $prescription->patient->last_name ?? '' }}

                        </p>

                    </div>


                    <!-- Patient ID -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Patient ID
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->patient->patient_id ?? 'N/A' }}

                        </p>

                    </div>


                    <!-- Doctor -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Doctor
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            Dr.
                            {{ $prescription->doctor->first_name ?? 'N/A' }}
                            {{ $prescription->doctor->last_name ?? '' }}

                        </p>

                    </div>


                    <!-- Specialization -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Specialization
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->doctor->specialization ?? 'N/A' }}

                        </p>

                    </div>


                    <!-- Medical Record -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Medical Record
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            @if($prescription->medicalRecord)
                                Record #{{ $prescription->medicalRecord->id }}
                            @else
                                N/A
                            @endif

                        </p>

                    </div>


                    <!-- Medicine -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Medicine
                        </p>

                        <p class="mt-1 font-semibold text-blue-600">

                            {{ $prescription->medicine }}

                        </p>

                    </div>


                    <!-- Dosage -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Dosage
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->dosage }}

                        </p>

                    </div>


                    <!-- Frequency -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Frequency
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->frequency }}

                        </p>

                    </div>


                    <!-- Duration -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Duration
                        </p>

                        <p class="mt-1 font-medium text-slate-800">

                            {{ $prescription->duration }}

                        </p>

                    </div>


                    <!-- Instructions -->
                    <div class="md:col-span-2">

                        <p class="text-sm text-slate-500">
                            Instructions
                        </p>

                        <p class="mt-2 text-slate-800 leading-relaxed">

                            {{ $prescription->instructions ?: 'No instructions provided.' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom Buttons -->
        <div class="flex flex-col sm:flex-row justify-between gap-3 mt-6">

            <a
                href="{{ route('prescriptions.index') }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-medium hover:bg-slate-50"
            >
                ← Back to Prescriptions
            </a>


            <a
                href="{{ route('prescriptions.edit', $prescription->id) }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
            >
                Edit Prescription
            </a>

        </div>

    </main>

</body>

</html>