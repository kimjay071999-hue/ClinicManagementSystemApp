<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Medical Record - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <header class="bg-white border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-6 py-5">
            <h1 class="text-2xl font-bold text-slate-800">
                Clinic Management System
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Medical Records
            </p>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-6 py-8">

        <div class="mb-6">
            <a
                href="{{ route('medical_records.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Medical Records
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <div class="px-6 py-5 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-800">
                    Add Medical Record
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Enter the patient's consultation information.
                </p>
            </div>

            <form
                action="{{ route('medical_records.store') }}"
                method="POST"
                class="p-6"
            >

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Patient -->
                    <div>
                        <label
                            for="patient_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Patient
                        </label>

                        <select
                            id="patient_id"
                            name="patient_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white"
                            required
                        >
                            <option value="">Select Patient</option>

                            @foreach ($patients as $patient)
                                <option
                                    value="{{ $patient->id }}"
                                    {{ old('patient_id') == $patient->id ? 'selected' : '' }}
                                >
                                    {{ $patient->patient_id }} -
                                    {{ $patient->first_name }} {{ $patient->last_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('patient_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Doctor -->
                    <div>
                        <label
                            for="doctor_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Doctor
                        </label>

                        <select
                            id="doctor_id"
                            name="doctor_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white"
                            required
                        >
                            <option value="">Select Doctor</option>

                            @foreach ($doctors as $doctor)
                                <option
                                    value="{{ $doctor->id }}"
                                    {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
                                >
                                    {{ $doctor->first_name }}
                                    {{ $doctor->last_name }}
                                    - {{ $doctor->specialization }}
                                </option>
                            @endforeach
                        </select>

                        @error('doctor_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Appointment -->
                    <div class="md:col-span-2">
                        <label
                            for="appointment_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Appointment
                        </label>

                        <select
                            id="appointment_id"
                            name="appointment_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white"
                        >
                            <option value="">Select Appointment</option>

                            @foreach ($appointments as $appointment)
                                <option
                                    value="{{ $appointment->id }}"
                                    {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}
                                >
                                    #{{ $appointment->id }}
                                    -
                                    {{ $appointment->patient->first_name ?? 'Unknown Patient' }}
                                    {{ $appointment->patient->last_name ?? '' }}
                                    -
                                    {{ $appointment->appointment_date }}
                                    -
                                    {{ $appointment->appointment_time }}
                                </option>
                            @endforeach
                        </select>

                        @error('appointment_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Symptoms -->
                    <div class="md:col-span-2">
                        <label
                            for="symptoms"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Symptoms
                        </label>

                        <textarea
                            id="symptoms"
                            name="symptoms"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5"
                            placeholder="Enter patient's symptoms..."
                        >{{ old('symptoms') }}</textarea>

                        @error('symptoms')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Diagnosis -->
                    <div class="md:col-span-2">
                        <label
                            for="diagnosis"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Diagnosis
                        </label>

                        <textarea
                            id="diagnosis"
                            name="diagnosis"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5"
                            placeholder="Enter diagnosis..."
                        >{{ old('diagnosis') }}</textarea>

                        @error('diagnosis')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Treatment -->
                    <div class="md:col-span-2">
                        <label
                            for="treatment"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Treatment
                        </label>

                        <textarea
                            id="treatment"
                            name="treatment"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5"
                            placeholder="Enter treatment or recommendations..."
                        >{{ old('treatment') }}</textarea>

                        @error('treatment')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="md:col-span-2">
                        <label
                            for="notes"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Notes
                        </label>

                        <textarea
                            id="notes"
                            name="notes"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5"
                            placeholder="Additional notes..."
                        >{{ old('notes') }}</textarea>

                        @error('notes')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-200">

                    <a
                        href="{{ route('medical_records.index') }}"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Save Medical Record
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>