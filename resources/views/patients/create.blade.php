<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Patient - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- Header -->
    <header class="bg-blue-700 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-6 py-5">
            <h1 class="text-2xl font-bold">
                Clinic Management System
            </h1>
            <p class="text-blue-100 text-sm mt-1">
                Patient Management
            </p>
        </div>
    </header>


    <!-- Main -->
    <main class="max-w-4xl mx-auto px-4 py-10">

        <!-- Back -->
        <a
            href="{{ route('patients.index') }}"
            class="inline-flex items-center text-blue-600 hover:text-blue-800
                   font-medium mb-6"
        >
            ← Back to Patients
        </a>


        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200">

            <!-- Card Header -->
            <div class="px-8 py-6 border-b border-slate-200">

                <h2 class="text-2xl font-bold text-slate-800">
                    Add New Patient
                </h2>

                <p class="text-slate-500 mt-1">
                    Enter the patient's information below.
                </p>

            </div>


            <!-- Form -->
            <form
                action="{{ route('patients.store') }}"
                method="POST"
                class="p-8"
            >

                @csrf


                <!-- Name -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- First Name -->
                    <div>
                        <label
                            for="first_name"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            placeholder="Enter first name"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500"
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
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Last Name
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            placeholder="Enter last name"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500"
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
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500"
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
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Gender
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   bg-white focus:outline-none focus:ring-2
                                   focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ old('gender') == 'Male' ? 'selected' : '' }}
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                {{ old('gender') == 'Female' ? 'selected' : '' }}
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


                    <!-- Mobile -->
                    <div>
                        <label
                            for="mobile_number"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Mobile Number
                        </label>

                        <input
                            type="text"
                            id="mobile_number"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="09XXXXXXXXX"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500"
                        >

                        @error('mobile_number')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Address -->
                    <div>
                        <label
                            for="address"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Address
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Enter address"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500"
                        >

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
                        class="px-5 py-3 rounded-lg border border-slate-300
                               text-slate-700 font-medium hover:bg-slate-100
                               transition"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-blue-600 text-white
                               font-semibold hover:bg-blue-700
                               focus:outline-none focus:ring-2
                               focus:ring-blue-500 focus:ring-offset-2
                               transition"
                    >
                        Save Patient
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>



