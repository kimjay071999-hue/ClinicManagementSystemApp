<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Doctor - Clinic Management System</title>

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
                Doctor Management
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-6 py-8">

        <!-- Back -->
        <div class="mb-6">
            <a
                href="{{ route('doctors.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800 font-medium"
            >
                ← Back to Doctors
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-800">
                    Add New Doctor
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Enter the doctor's information below.
                </p>
            </div>

            <!-- Form -->
            <form
                action="{{ route('doctors.store') }}"
                method="POST"
                class="p-6"
            >

                @csrf

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
                            value="{{ old('first_name') }}"
                            placeholder="Enter first name"
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
                            value="{{ old('last_name') }}"
                            placeholder="Enter last name"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >

                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Specialization -->
                    <div>
                        <label
                            for="specialization"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Specialization
                        </label>

                        <select
                            id="specialization"
                            name="specialization"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >
                            <option value="">Select Specialization</option>

                            <option value="General Medicine"
                                {{ old('specialization') == 'General Medicine' ? 'selected' : '' }}>
                                General Medicine
                            </option>

                            <option value="Pediatrics"
                                {{ old('specialization') == 'Pediatrics' ? 'selected' : '' }}>
                                Pediatrics
                            </option>

                            <option value="Internal Medicine"
                                {{ old('specialization') == 'Internal Medicine' ? 'selected' : '' }}>
                                Internal Medicine
                            </option>

                            <option value="Family Medicine"
                                {{ old('specialization') == 'Family Medicine' ? 'selected' : '' }}>
                                Family Medicine
                            </option>

                            <option value="Dentistry"
                                {{ old('specialization') == 'Dentistry' ? 'selected' : '' }}>
                                Dentistry
                            </option>

                            <option value="Dermatology"
                                {{ old('specialization') == 'Dermatology' ? 'selected' : '' }}>
                                Dermatology
                            </option>

                            <option value="Cardiology"
                                {{ old('specialization') == 'Cardiology' ? 'selected' : '' }}>
                                Cardiology
                            </option>

                            <option value="Other"
                                {{ old('specialization') == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>

                        @error('specialization')
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
                            value="{{ old('mobile_number') }}"
                            placeholder="09XXXXXXXXX"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >

                        @error('mobile_number')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="doctor@example.com"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                            required
                        >

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            placeholder="Enter doctor's address"
                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                        >{{ old('address') }}</textarea>

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
                        href="{{ route('doctors.index') }}"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Save Doctor
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>