<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Details - Clinic Management System</title>

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
                Patient Management
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back Button -->
        <div class="mb-6">
            <a
                href="{{ route('patients.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Patients
            </a>
        </div>

        <!-- Patient Header -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-4">

                    <!-- Initial -->
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                        <span class="text-2xl font-bold text-blue-600">
                            {{ strtoupper(substr($patient->first_name, 0, 1)) }}
                        </span>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">
                            {{ $patient->first_name }} {{ $patient->last_name }}
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Patient ID: {{ $patient->patient_id }}
                        </p>
                    </div>

                </div>

                <!-- Edit Button -->
                <a
                    href="{{ route('patients.edit', $patient->id) }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                >
                    Edit Patient
                </a>

            </div>

        </div>

        <!-- Patient Information -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <div class="px-6 py-5 border-b border-slate-200">
                <h3 class="text-lg font-semibold text-slate-800">
                    Patient Information
                </h3>
            </div>

            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- First Name -->
                    <div>
                        <p class="text-sm text-slate-500">
                            First Name
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->first_name }}
                        </p>
                    </div>

                    <!-- Last Name -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Last Name
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->last_name ?: 'N/A' }}
                        </p>
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Date of Birth
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->date_of_birth }}
                        </p>
                    </div>

                    <!-- Gender -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Gender
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->gender }}
                        </p>
                    </div>

                    <!-- Mobile Number -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Mobile Number
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->mobile_number ?: 'N/A' }}
                        </p>
                    </div>

                    <!-- Address -->
                    <div>
                        <p class="text-sm text-slate-500">
                            Address
                        </p>

                        <p class="text-base font-medium text-slate-800 mt-1">
                            {{ $patient->address ?: 'N/A' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bottom Actions -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">

            <a
                href="{{ route('patients.index') }}"
                class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-white text-center"
            >
                Back
            </a>

            <a
                href="{{ route('patients.edit', $patient->id) }}"
                class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 text-center"
            >
                Edit Patient
            </a>

        </div>

    </main>

</body>
</html>