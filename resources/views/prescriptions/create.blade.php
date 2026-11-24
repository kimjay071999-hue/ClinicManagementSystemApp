<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Prescription - Clinic Management System</title>

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

        <!-- Back Button -->
        <div class="mb-6">

            <a
                href="{{ route('prescriptions.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Prescriptions
            </a>

        </div>


        <!-- Page Header -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <h2 class="text-2xl font-bold text-slate-800">
                Add Prescription
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Enter the prescription information below.
            </p>

        </div>


        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <div class="px-6 py-5 border-b border-slate-200">

                <h3 class="text-lg font-semibold text-slate-800">
                    Prescription Information
                </h3>

            </div>


            <form
                action="{{ route('prescriptions.store') }}"
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
                                    {{ old('patient_id') == $patient->id ? 'selected' : '' }}
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
                                    {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
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


                    <!-- Medical Record -->
                    <div class="md:col-span-2">

                        <label
                            for="medical_record_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Medical Record
                        </label>

                        <select
                            name="medical_record_id"
                            id="medical_record_id"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                            <option value="">
                                No Medical Record
                            </option>

                            @foreach($medicalRecords as $record)

                                <option
                                    value="{{ $record->id }}"
                                    {{ old('medical_record_id') == $record->id ? 'selected' : '' }}
                                >

                                    #{{ $record->id }}

                                    -

                                    @if($record->patient)
                                        {{ $record->patient->first_name }}
                                        {{ $record->patient->last_name }}
                                    @endif

                                    @if($record->doctor)
                                        - Dr. {{ $record->doctor->first_name }}
                                        {{ $record->doctor->last_name }}
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


                    <!-- Medicine -->
                    <div>

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
                            value="{{ old('medicine') }}"
                            placeholder="e.g. Paracetamol"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                        @error('medicine')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Dosage -->
                    <div>

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
                            value="{{ old('dosage') }}"
                            placeholder="e.g. 500mg"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                        @error('dosage')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Frequency -->
                    <div>

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
                            value="{{ old('frequency') }}"
                            placeholder="e.g. 3 times a day"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                        @error('frequency')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Duration -->
                    <div>

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
                            value="{{ old('duration') }}"
                            placeholder="e.g. 5 days"
                            required
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >

                        @error('duration')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- Instructions -->
                    <div class="md:col-span-2">

                        <label
                            for="instructions"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Instructions
                        </label>

                        <textarea
                            name="instructions"
                            id="instructions"
                            rows="4"
                            placeholder="e.g. Take after meals"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('instructions') }}</textarea>

                        @error('instructions')
                            <p class="text-sm text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">

                    <a
                        href="{{ route('prescriptions.index') }}"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50 text-center"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Save Prescription
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>