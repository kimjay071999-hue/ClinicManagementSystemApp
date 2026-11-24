
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Bill | Clinic Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <!-- Header -->
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl flex-col justify-between gap-4 px-4 py-5 sm:flex-row sm:items-center sm:px-6">

            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white">
                    <i class="fa-solid fa-file-invoice-dollar text-xl"></i>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-slate-900">
                        Create New Bill
                    </h1>
                    <p class="text-sm text-slate-500">
                        Clinic Management System
                    </p>
                </div>
            </div>

            <a href="{{ route('cashier.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Cashier
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-4xl px-4 py-8 sm:px-6">

        <!-- Heading -->
        <div class="mb-7">
            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Billing Management
            </p>

            <h2 class="mt-2 text-2xl font-bold text-slate-900 sm:text-3xl">
                Add Patient Bill
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Select a patient, enter the bill details, and save the bill.
            </p>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="mb-2 font-bold">Please correct the following errors:</p>

                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Bill Form -->
        <form action="{{ route('bills.store') }}"
              method="POST"
              class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            @csrf

            <!-- Form Header -->
            <div class="border-b border-slate-200 px-6 py-5">
                <h3 class="font-bold text-slate-900">
                    <i class="fa-solid fa-clipboard-list mr-2 text-blue-600"></i>
                    Bill Information
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Fields marked with * are required.
                </p>
            </div>

            <div class="space-y-6 p-6">

                <!-- Patient -->
                <div>
                    <label for="patient_id"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Patient <span class="text-red-500">*</span>
                    </label>

                    <select name="patient_id"
                            id="patient_id"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">Select Patient</option>

                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ (string) old('patient_id') === (string) $patient->id ? 'selected' : '' }}>
                                {{ $patient->first_name }}
                                {{ $patient->last_name }}
                                — {{ $patient->patient_id }}
                            </option>
                        @endforeach
                    </select>

                    @error('patient_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Appointment -->
                <div>
                    <label for="appointment_id"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Appointment
                        <span class="font-normal text-slate-400">(Optional)</span>
                    </label>

                    <select name="appointment_id"
                            id="appointment_id"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">No appointment selected</option>

                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}"
                                    data-patient="{{ $appointment->patient_id }}"
                                {{ (string) old('appointment_id') === (string) $appointment->id ? 'selected' : '' }}>

                                Appointment #{{ $appointment->id }}
                                — {{ $appointment->patient->first_name ?? '' }}
                                {{ $appointment->patient->last_name ?? '' }}
                                — {{ $appointment->appointment_date }}
                            </option>
                        @endforeach
                    </select>

                    @error('appointment_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Medical Record -->
                <div>
                    <label for="medical_record_id"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Medical Record
                        <span class="font-normal text-slate-400">(Optional)</span>
                    </label>

                    <select name="medical_record_id"
                            id="medical_record_id"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                        <option value="">No medical record selected</option>

                        @foreach ($medicalRecords as $record)
                            <option value="{{ $record->id }}"
                                    data-patient="{{ $record->patient_id }}"
                                {{ (string) old('medical_record_id') === (string) $record->id ? 'selected' : '' }}>

                                Record #{{ $record->id }}
                                — {{ $record->patient->first_name ?? '' }}
                                {{ $record->patient->last_name ?? '' }}
                            </option>
                        @endforeach
                    </select>

                    @error('medical_record_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Bill Description <span class="text-red-500">*</span>
                    </label>

                    <input type="text"
                           name="description"
                           id="description"
                           value="{{ old('description') }}"
                           maxlength="255"
                           placeholder="e.g. Consultation Fee, Laboratory Fee"
                           required
                           class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount"
                           class="mb-2 block text-sm font-semibold text-slate-700">
                        Bill Amount (₱) <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 font-semibold text-slate-500">
                            ₱
                        </span>

                        <input type="number"
                               name="amount"
                               id="amount"
                               value="{{ old('amount') }}"
                               min="0.01"
                               step="0.01"
                               placeholder="0.00"
                               required
                               class="w-full rounded-lg border border-slate-300 py-3 pl-9 pr-4 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>

                    @error('amount')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <p class="mt-2 text-xs text-slate-500">
                        Enter the total amount the patient needs to pay.
                    </p>
                </div>

                <!-- Initial Status -->
                <input type="hidden" name="status" value="Pending">

                <!-- Notice -->
                <div class="flex gap-3 rounded-xl border border-blue-100 bg-blue-50 p-4">
                    <i class="fa-solid fa-circle-info mt-0.5 text-blue-600"></i>

                    <div class="text-sm text-blue-800">
                        <p class="font-semibold">Payment Notice</p>
                        <p class="mt-1">
                            This creates a pending bill. Record the patient's actual payment separately using the Process Payment page.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Footer Buttons -->
            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end">

                <a href="{{ route('cashier.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                    Cancel
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700">
                    <i class="fa-solid fa-plus"></i>
                    Create Bill
                </button>

            </div>
        </form>

        <p class="mt-6 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} Clinic Management System.
            All rights reserved.
        </p>

    </main>

    <!-- Keep selected appointment/record linked to selected patient -->
    <script>
        const patientSelect = document.getElementById('patient_id');
        const appointmentSelect = document.getElementById('appointment_id');
        const recordSelect = document.getElementById('medical_record_id');

        function filterRelatedOptions(select, patientId) {
            Array.from(select.options).forEach(option => {
                if (!option.value) {
                    option.hidden = false;
                    return;
                }

                option.hidden = patientId !== '' &&
                    option.dataset.patient !== patientId;

                if (option.hidden && option.selected) {
                    select.value = '';
                }
            });
        }

        function filterPatientRecords() {
            const patientId = patientSelect.value;
            filterRelatedOptions(appointmentSelect, patientId);
            filterRelatedOptions(recordSelect, patientId);
        }

        patientSelect.addEventListener('change', filterPatientRecords);
        filterPatientRecords();
    </script>

</body>
</html>

