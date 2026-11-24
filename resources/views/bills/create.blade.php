<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Bill - Clinic Management System</title>

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
                Billing Management
            </p>

        </div>

    </header>


    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back -->
        <a
            href="{{ route('bills.index') }}"
            class="inline-flex items-center text-sm text-slate-600 hover:text-blue-600 mb-6"
        >
            ← Back to Billing
        </a>


        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-200">

                <h2 class="text-xl font-semibold text-slate-800">
                    Add Bill
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Enter the billing information below.
                </p>

            </div>


            <!-- Form -->
            <form
                action="{{ route('bills.store') }}"
                method="POST"
                class="p-6"
            >

                @csrf


                <!-- Patient -->
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
                                {{ old('patient_id') == $patient->id ? 'selected' : '' }}
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


                <!-- Appointment -->
                <div class="mb-5">

                    <label
                        for="appointment_id"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Appointment
                    </label>

                    <select
                        name="appointment_id"
                        id="appointment_id"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            No Appointment
                        </option>

                        @foreach($appointments as $appointment)

                            <option
                                value="{{ $appointment->id }}"
                                {{ old('appointment_id') == $appointment->id ? 'selected' : '' }}
                            >
                                Appointment #{{ $appointment->id }}

                                @if($appointment->patient)
                                    - {{ $appointment->patient->first_name }}
                                    {{ $appointment->patient->last_name }}
                                @endif

                                @if($appointment->appointment_date)
                                    - {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
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


                <!-- Medical Record -->
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
                                {{ old('medical_record_id') == $record->id ? 'selected' : '' }}
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


                <!-- Description -->
                <div class="mb-5">

                    <label
                        for="description"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Description
                    </label>

                    <input
                        type="text"
                        name="description"
                        id="description"
                        value="{{ old('description') }}"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="e.g. Consultation Fee"
                    >

                    @error('description')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Amount -->
                <div class="mb-5">

                    <label
                        for="amount"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Amount
                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                            ₱
                        </span>

                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            value="{{ old('amount') }}"
                            min="0"
                            step="0.01"
                            required
                            class="w-full rounded-lg border border-slate-300 pl-9 pr-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="0.00"
                        >

                    </div>

                    @error('amount')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Status -->
                <div class="mb-5">

                    <label
                        for="status"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option
                            value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Paid"
                            {{ old('status') == 'Paid' ? 'selected' : '' }}
                        >
                            Paid
                        </option>

                        <option
                            value="Cancelled"
                            {{ old('status') == 'Cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                    @error('status')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Payment Date -->
                <div class="mb-6">

                    <label
                        for="payment_date"
                        class="block text-sm font-medium text-slate-700 mb-2"
                    >
                        Payment Date
                    </label>

                    <input
                        type="date"
                        name="payment_date"
                        id="payment_date"
                        value="{{ old('payment_date') }}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('payment_date')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3">

                    <a
                        href="{{ route('bills.index') }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-medium hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Save Bill
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>

</html>