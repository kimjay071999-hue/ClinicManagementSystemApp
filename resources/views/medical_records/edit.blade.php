<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Medical Record - Clinic Management System</title>

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
                href="{{ route('medical_records.show', $medicalRecord->id) }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Medical Record
            </a>

        </div>


        <!-- Page Header -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <h2 class="text-2xl font-bold text-slate-800">
                Edit Medical Record
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Update the medical record information below.
            </p>

        </div>


        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <div class="px-6 py-5 border-b border-slate-200">

                <h3 class="text-lg font-semibold text-slate-800">
                    Medical Record Information
                </h3>

            </div>


            <form
                action="{{ route('medical_records.update', $medicalRecord->id) }}"
                method="POST"
                class="p-6"
            >

                @csrf
                @method('PUT')


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
                            name="patient_id"
                            id="patient_id"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                            <option value="">
                                Select Patient
                            </option>

                            @foreach($patients as $patient)

                                <option
                                    value="{{ $patient->id }}"
                                    {{ old('patient_id', $medicalRecord->patient_id) == $patient->id ? 'selected' : '' }}
                                >
                                    {{ $patient->patient_id }} -
                                    {{ $patient->first_name }}
                                    {{ $patient->last_name }}
                                </option>

                            @endforeach

                        </select>

                        @error('patient_id')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="doctor_id"
                            id="doctor_id"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                            <option value="">
                                Select Doctor
                            </option>

                            @foreach($doctors as $doctor)

                                <option
                                    value="{{ $doctor->id }}"
                                    {{ old('doctor_id', $medicalRecord->doctor_id) == $doctor->id ? 'selected' : '' }}
                                >
                                    Dr. {{ $doctor->first_name }}
                                    {{ $doctor->last_name }}
                                    -
                                    {{ $doctor->specialization }}
                                </option>

                            @endforeach

                        </select>

                        @error('doctor_id')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="appointment_id"
                            id="appointment_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                            <option value="">
                                No Appointment
                            </option>

                            @foreach($appointments as $appointment)

                                <option
                                    value="{{ $appointment->id }}"
                                    {{ old('appointment_id', $medicalRecord->appointment_id) == $appointment->id ? 'selected' : '' }}
                                >

                                    #{{ $appointment->id }}

                                    -

                                    @if($appointment->patient)
                                        {{ $appointment->patient->first_name }}
                                        {{ $appointment->patient->last_name }}
                                    @endif

                                    -

                                    {{ $appointment->appointment_date }}

                                    @if($appointment->appointment_time)
                                        - {{ $appointment->appointment_time }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('appointment_id')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="symptoms"
                            id="symptoms"
                            rows="4"
                            placeholder="Enter patient's symptoms"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('symptoms', $medicalRecord->symptoms) }}</textarea>

                        @error('symptoms')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="diagnosis"
                            id="diagnosis"
                            rows="4"
                            placeholder="Enter diagnosis"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('diagnosis', $medicalRecord->diagnosis) }}</textarea>

                        @error('diagnosis')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="treatment"
                            id="treatment"
                            rows="4"
                            placeholder="Enter treatment"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('treatment', $medicalRecord->treatment) }}</textarea>

                        @error('treatment')
                            <p class="text-sm text-red-600 mt-1">
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
                            name="notes"
                            id="notes"
                            rows="4"
                            placeholder="Enter additional notes"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('notes', $medicalRecord->notes) }}</textarea>

                        @error('notes')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">

                    <a
                        href="{{ route('medical_records.show', $medicalRecord->id) }}"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50 text-center"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Update Medical Record
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>