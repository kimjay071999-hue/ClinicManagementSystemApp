<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Patient - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-6 py-5">
            <h1 class="text-2xl font-bold text-slate-800">
                Clinic Management System
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Edit Patient Information
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-6 py-8">

        <!-- Back Button -->
        <div class="mb-6">
            <a
                href="{{ route('patients.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Patients
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-800">
                    Edit Patient
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Update the patient's information below.
                </p>
            </div>

            <!-- Form -->
            <form
                action="{{ route('patients.update', $patient->id) }}"
                method="POST"
                class="p-6"
            >

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- First Name -->
                    <div>
                        <label
                            for="first_name"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name', $patient->first_name) }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >

                        @error('first_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label
                            for="last_name"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Last Name
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name', $patient->last_name) }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                        >

                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label
                            for="date_of_birth"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old('date_of_birth', $patient->date_of_birth) }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >

                        @error('date_of_birth')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label
                            for="gender"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Gender
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >
                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}
                            >
                                Female
                            </option>
                        </select>

                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Mobile Number -->
                    <div>
                        <label
                            for="mobile_number"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Mobile Number
                        </label>

                        <input
                            type="text"
                            id="mobile_number"
                            name="mobile_number"
                            value="{{ old('mobile_number', $patient->mobile_number) }}"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                        >

                        @error('mobile_number')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Patient ID -->
                    <div>
                        <label
                            for="patient_id"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Patient ID
                        </label>

                        <input
                            type="text"
                            id="patient_id"
                            value="{{ $patient->patient_id }}"
                            class="w-full rounded-lg border border-slate-300 bg-slate-100 px-4 py-2.5 text-slate-500"
                            readonly
                        >

                        <p class="text-xs text-slate-400 mt-1">
                            Patient ID cannot be changed.
                        </p>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label
                            for="address"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Address
                        </label>

                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                        >{{ old('address', $patient->address) }}</textarea>

                        @error('address')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-slate-200">

                    <a
                        href="{{ route('patients.index') }}"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Update Patient
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>