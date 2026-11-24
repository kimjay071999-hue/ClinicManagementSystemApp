<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Prescription - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- ================= HEADER ================= -->
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


    <!-- ================= MAIN ================= -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back -->
        <a
            href="{{ route('prescriptions.index') }}"
            class="inline-flex items-center text-sm text-slate-600 hover:text-blue-600 mb-6"
        >
            ← Back to Prescriptions
        </a>


        <!-- ================= FORM CARD ================= -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-200">

                <h2 class="text-xl font-semibold text-slate-800">
                    Edit Prescription
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Update the prescription information below.
                </p>

            </div>


            <!-- ================= FORM ================= -->
            <form
                action="{{ route('prescriptions.update', $prescription->id) }}"
                method="POST"
                class="p-6"
            >

                @csrf
                @method('PUT')


                <!-- ================= PATIENT ================= -->
                <div class="mb-5">

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
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            Select Patient
                        </option>

                        @foreach($patients as $patient)

                            <option
                                value="{{ $patient->id }}"
                                {{ old('patient_id', $prescription->patient_id) == $patient->id ? 'selected' : '' }}
                            >
                                {{ $patient->first_name }}
                                {{ $patient->last_name }}
                                - {{ $patient->patient_id }}
                            </option>

                        @endforeach

                    </select>

                    @error('patient_id')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= DOCTOR ================= -->
                <div class="mb-5">

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
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            Select Doctor
                        </option>

                        @foreach($doctors as $doctor)

                            <option
                                value="{{ $doctor->id }}"
                                {{ old('doctor_id', $prescription->doctor_id) == $doctor->id ? 'selected' : '' }}
                            >
                                Dr. {{ $doctor->first_name }}
                                {{ $doctor->last_name }}
                                - {{ $doctor->specialization }}
                            </option>

                        @endforeach

                    </select>

                    @error('doctor_id')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= MEDICAL RECORD ================= -->
                <div class="mb-5">

                    <label
                        for="medical_record_id"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Medical Record
                    </label>

                    <select
                        name="medical_record_id"
                        id="medical_record_id"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            No Medical Record
                        </option>

                        @foreach($medicalRecords as $record)

                            <option
                                value="{{ $record->id }}"
                                {{ old('medical_record_id', $prescription->medical_record_id) == $record->id ? 'selected' : '' }}
                            >
                                Record #{{ $record->id }}

                                @if($record->patient)
                                    - {{ $record->patient->first_name }}
                                    {{ $record->patient->last_name }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                    @error('medical_record_id')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= MEDICINE ================= -->
                <div class="mb-5">

                    <label
                        for="medicine"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Medicine
                    </label>

                    <input
                        type="text"
                        name="medicine"
                        id="medicine"
                        value="{{ old('medicine', $prescription->medicine) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g. Paracetamol"
                    >

                    @error('medicine')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= DOSAGE ================= -->
                <div class="mb-5">

                    <label
                        for="dosage"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Dosage
                    </label>

                    <input
                        type="text"
                        name="dosage"
                        id="dosage"
                        value="{{ old('dosage', $prescription->dosage) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g. 500 mg"
                    >

                    @error('dosage')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= FREQUENCY ================= -->
                <div class="mb-5">

                    <label
                        for="frequency"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Frequency
                    </label>

                    <input
                        type="text"
                        name="frequency"
                        id="frequency"
                        value="{{ old('frequency', $prescription->frequency) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g. 3 times a day"
                    >

                    @error('frequency')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= DURATION ================= -->
                <div class="mb-5">

                    <label
                        for="duration"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Duration
                    </label>

                    <input
                        type="text"
                        name="duration"
                        id="duration"
                        value="{{ old('duration', $prescription->duration) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g. 7 days"
                    >

                    @error('duration')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= INSTRUCTIONS ================= -->
                <div class="mb-6">

                    <label
                        for="instructions"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Instructions
                    </label>

                    <textarea
                        name="instructions"
                        id="instructions"
                        rows="5"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter additional instructions..."
                    >{{ old('instructions', $prescription->instructions) }}</textarea>

                    @error('instructions')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ================= BUTTONS ================= -->
                <div class="flex flex-col sm:flex-row justify-end gap-3">

                    <a
                        href="{{ route('prescriptions.index') }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-medium hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Update Prescription
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>

</html>