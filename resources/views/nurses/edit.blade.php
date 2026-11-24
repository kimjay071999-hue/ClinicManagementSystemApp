<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Nurse - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

    <div class="min-h-screen">

        <!-- Mobile Overlay -->
        <div
            id="sidebarOverlay"
            class="fixed inset-0 z-40 hidden bg-black/50 md:hidden"
            onclick="closeSidebar()">
        </div>


        <!-- Sidebar -->
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 md:translate-x-0">

            <!-- Logo -->
            <div class="flex h-20 items-center border-b border-slate-200 px-6">

                <div>
                    <h1 class="text-lg sm:text-xl font-bold text-slate-800">
                            <img src="{{ asset('img/clinic_logo.png') }}" alt="Clinic Logo">
                        </h1>

                    <p class="text-xs text-slate-500">
                        Management System
                    </p>
                </div>

                <button
                    onclick="closeSidebar()"
                    class="ml-auto text-2xl text-slate-500 md:hidden">
                    &times;
                </button>

            </div>


            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto px-4 py-5">

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Main Menu
                </p>


                <!-- Dashboard -->
                <a
                    href="{{ route('dashboard') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>📊</span>
                    <span>Dashboard</span>
                </a>


                <!-- Patients -->
                <a
                    href="{{ route('patients.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>👥</span>
                    <span>Patients</span>
                </a>


                <!-- Doctors -->
                <a
                    href="{{ route('doctors.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>👨‍⚕️</span>
                    <span>Doctors</span>
                </a>


                <!-- Nurses Active -->
                <a
                    href="{{ route('nurses.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg bg-blue-50 px-3 py-2.5 text-sm font-semibold text-blue-600">
                    <span>👩‍⚕️</span>
                    <span>Nurses</span>
                </a>


                <!-- Appointments -->
                <a
                    href="{{ route('appointments.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>📅</span>
                    <span>Appointments</span>
                </a>


                <!-- Medical Records -->
                <a
                    href="{{ route('medical_records.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>🩺</span>
                    <span>Medical Records</span>
                </a>


                <!-- Prescriptions -->
                <a
                    href="{{ route('prescriptions.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>💊</span>
                    <span>Prescriptions</span>
                </a>


                <!-- Billing -->
                <a
                    href="{{ route('bills.index') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>💰</span>
                    <span>Billing</span>
                </a>


                <div class="my-5 border-t border-slate-200"></div>


                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Staff
                </p>


                <!-- Add Nurse -->
                <a
                    href="{{ route('nurses.create') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>➕</span>
                    <span>Add Nurse</span>
                </a>


                <!-- Add Patient -->
                <a
                    href="{{ route('patients.create') }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                    <span>➕</span>
                    <span>Add Patient</span>
                </a>

            </nav>


            <!-- Bottom -->
            <div class="border-t border-slate-200 p-4">

                <a
                    href="#"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100">
                    <span>⚙️</span>
                    <span>Settings</span>
                </a>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100">

                        <span>🚪</span>
                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </aside>


        <!-- Main -->
        <main class="md:ml-64">


            <!-- Mobile Header -->
            <header class="flex h-16 items-center border-b border-slate-200 bg-white px-4 md:hidden">

                <button
                    onclick="openSidebar()"
                    class="mr-3 rounded-lg p-2 text-xl text-slate-600 hover:bg-slate-100">
                    ☰
                </button>

                <div>
                    <h1 class="text-sm font-bold text-slate-800">
                        Clinic System
                    </h1>

                    <p class="text-xs text-slate-500">
                        Edit Nurse
                    </p>
                </div>

            </header>


            <!-- Desktop Header -->
            <header class="hidden h-20 items-center border-b border-slate-200 bg-white px-8 md:flex">

                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        Edit Nurse
                    </h1>

                    <p class="text-sm text-slate-500">
                        Update nurse information
                    </p>
                </div>

            </header>


            <!-- Page Content -->
            <div class="px-4 py-6 sm:px-6 lg:px-8">

                <div class="mx-auto max-w-5xl">


                    <!-- Back -->
                    <a
                        href="{{ route('nurses.index') }}"
                        class="mb-6 inline-flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-blue-600">

                        ← Back to Nurses

                    </a>


                    <!-- Form Card -->
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">


                        <!-- Form Header -->
                        <div class="border-b border-slate-200 px-6 py-5">

                            <h2 class="text-lg font-semibold text-slate-800">
                                Edit Nurse Information
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Update the information for
                                {{ $nurse->first_name }} {{ $nurse->last_name }}.
                            </p>

                        </div>


                        <!-- Form -->
                        <form
                            method="POST"
                            action="{{ route('nurses.update', $nurse->id) }}"
                            class="p-6">

                            @csrf
                            @method('PUT')


                            <!-- Validation Errors -->
                            @if($errors->any())

                                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

                                    <p class="mb-2 text-sm font-semibold text-red-700">
                                        Please fix the following errors:
                                    </p>

                                    <ul class="list-inside list-disc text-sm text-red-600">

                                        @foreach($errors->all() as $error)

                                            <li>{{ $error }}</li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            <!-- Personal Information -->
                            <div class="mb-8">

                                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-500">
                                    Personal Information
                                </h3>


                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                                    <!-- Nurse ID -->
                                    <div>

                                        <label
                                            for="nurse_id"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Nurse ID

                                        </label>

                                        <input
                                            type="text"
                                            id="nurse_id"
                                            value="{{ $nurse->nurse_id }}"
                                            disabled
                                            class="w-full rounded-lg border border-slate-200 bg-slate-100 px-4 py-2.5 text-sm text-slate-500 outline-none">

                                    </div>


                                    <!-- Status -->
                                    <div>

                                        <label
                                            for="status"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Status
                                            <span class="text-red-500">*</span>

                                        </label>

                                        <select
                                            id="status"
                                            name="status"
                                            required
                                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                            <option
                                                value="Active"
                                                {{ old('status', $nurse->status) === 'Active' ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option
                                                value="Inactive"
                                                {{ old('status', $nurse->status) === 'Inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>

                                        </select>

                                        @error('status')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    <!-- First Name -->
                                    <div>

                                        <label
                                            for="first_name"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            First Name
                                            <span class="text-red-500">*</span>

                                        </label>

                                        <input
                                            type="text"
                                            id="first_name"
                                            name="first_name"
                                            value="{{ old('first_name', $nurse->first_name) }}"
                                            required
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                        @error('first_name')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    <!-- Last Name -->
                                    <div>

                                        <label
                                            for="last_name"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Last Name
                                            <span class="text-red-500">*</span>

                                        </label>

                                        <input
                                            type="text"
                                            id="last_name"
                                            name="last_name"
                                            value="{{ old('last_name', $nurse->last_name) }}"
                                            required
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                        @error('last_name')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    <!-- Specialization -->
                                    <div class="md:col-span-2">

                                        <label
                                            for="specialization"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Specialization

                                        </label>

                                        <input
                                            type="text"
                                            id="specialization"
                                            name="specialization"
                                            value="{{ old('specialization', $nurse->specialization) }}"
                                            placeholder="e.g. Emergency Nursing"
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                        @error('specialization')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>

                            </div>


                            <!-- Contact Information -->
                            <div class="mb-8">

                                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-500">
                                    Contact Information
                                </h3>


                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                                    <!-- Mobile -->
                                    <div>

                                        <label
                                            for="mobile_number"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Mobile Number

                                        </label>

                                        <input
                                            type="text"
                                            id="mobile_number"
                                            name="mobile_number"
                                            value="{{ old('mobile_number', $nurse->mobile_number) }}"
                                            placeholder="e.g. 09123456789"
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                        @error('mobile_number')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    <!-- Email -->
                                    <div>

                                        <label
                                            for="email"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Email
                                            <span class="text-red-500">*</span>

                                        </label>

                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            value="{{ old('email', $nurse->email) }}"
                                            required
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                                        @error('email')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>


                                    <!-- Address -->
                                    <div class="md:col-span-2">

                                        <label
                                            for="address"
                                            class="mb-2 block text-sm font-medium text-slate-700">

                                            Address

                                        </label>

                                        <textarea
                                            id="address"
                                            name="address"
                                            rows="3"
                                            placeholder="Enter complete address"
                                            class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('address', $nurse->address) }}</textarea>

                                        @error('address')
                                            <p class="mt-1 text-xs text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>

                            </div>


                            <!-- Buttons -->
                            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">

                                <a
                                    href="{{ route('nurses.index') }}"
                                    class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

                                    Cancel

                                </a>


                                <button
                                    type="submit"
                                    class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                                    Update Nurse

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </main>

    </div>


    <!-- Sidebar Script -->
    <script>

        function openSidebar() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.remove('hidden');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.add('hidden');
        }

    </script>

</body>

</html>