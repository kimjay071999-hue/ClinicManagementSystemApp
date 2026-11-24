<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Appointment - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        <!-- MOBILE OVERLAY -->
        <div id="sidebarOverlay"
             class="fixed inset-0 bg-black/40 z-40 hidden md:hidden">
        </div>

        <!-- SIDEBAR -->
        <aside id="sidebar"
               class="fixed md:sticky top-0 left-0 z-50
                      w-64 h-screen bg-white border-r border-slate-200
                      flex flex-col
                      transform -translate-x-full md:translate-x-0
                      transition-transform duration-300 ease-in-out">

            <!-- Logo -->
            <div class="px-5 sm:px-6 py-5 border-b border-slate-200">
                <div class="flex items-center justify-between">

                    <div>
                          <h1 class="text-lg sm:text-xl font-bold text-slate-800">
                            <img src="{{ asset('img/clinic_logo.png') }}" alt="Clinic Logo">
                        </h1>

                        <p class="text-xs text-slate-500 mt-1">
                            Management System
                        </p>
                    </div>

                    <button id="closeSidebar"
                            class="md:hidden text-slate-500
                                   hover:text-slate-800 text-2xl">
                        ✕
                    </button>

                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 sm:px-4 py-5 overflow-y-auto">

                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Main Menu
                </p>

                <!-- Dashboard -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">
                    <span class="text-lg">🏠</span>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Patients -->
                <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">
                    <span class="text-lg">👥</span>
                    <span class="font-medium">Patients</span>
                </a>

                <!-- Doctors -->
                <a href="{{ route('doctors.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">
                    <span class="text-lg">👨‍⚕️</span>
                    <span class="font-medium">Doctors</span>
                </a>

                <!-- Appointments ACTIVE -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">
                    <span class="text-lg">📅</span>
                    <span class="font-medium">Appointments</span>
                </a>

                <!-- Prescriptions -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">
                    <span class="text-lg">💊</span>
                    <span class="font-medium">Prescriptions</span>
                </a>

                <div class="border-t border-slate-200 my-5"></div>

                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Appointment
                </p>

                <!-- Add Appointment ACTIVE -->
                <a href="{{ route('appointments.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm">
                    <span class="text-lg">➕</span>
                    <span class="font-medium">Add Appointment</span>
                </a>

            </nav>

            <!-- Sidebar Bottom -->
            <div class="px-3 sm:px-4 py-4 border-t border-slate-200">

                <!-- Settings -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-slate-100 transition">
                    <span class="text-lg">⚙️</span>
                    <span class="font-medium">Settings</span>
                </a>

                <!-- Logout -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-red-500 hover:bg-red-50 transition">
                    <span class="text-lg">🚪</span>
                    <span class="font-medium">Logout</span>
                </a>

            </div>

        </aside>

        <!-- MAIN -->
        <main class="flex-1 min-w-0 w-full">

            <!-- MOBILE HEADER -->
            <header class="md:hidden bg-white border-b border-slate-200
                           px-4 py-4 sticky top-0 z-30">

                <div class="flex items-center justify-between gap-3">

                    <div class="flex items-center gap-3 min-w-0">

                        <button id="openSidebar"
                                class="flex-shrink-0
                                       w-10 h-10 rounded-lg
                                       bg-blue-50 text-blue-600
                                       hover:bg-blue-100
                                       flex items-center justify-center
                                       text-xl">
                            ☰
                        </button>

                        <div class="min-w-0">

                            <h1 class="text-lg font-bold text-slate-800 truncate">
                                🏥 Clinic System
                            </h1>

                            <p class="text-xs text-slate-500 truncate">
                                Appointment Management
                            </p>

                        </div>

                    </div>

                </div>

            </header>

            <!-- DESKTOP HEADER -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">
                            Add Appointment
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Create a new patient appointment.
                        </p>
                    </div>

                    <a href="{{ route('appointments.index') }}"
                       class="bg-slate-100 hover:bg-slate-200
                              text-slate-700 px-5 py-2.5
                              rounded-lg font-medium transition">
                        ← Back
                    </a>

                </div>

            </header>

            <!-- CONTENT -->
            <section class="p-4 sm:p-6 lg:p-8">

                <div class="max-w-4xl mx-auto">

                    <!-- FORM CARD -->
                    <div class="bg-white rounded-xl border border-slate-200
                                shadow-sm overflow-hidden">

                        <!-- Card Header -->
                        <div class="px-6 py-5 border-b border-slate-200">

                            <h3 class="text-xl font-bold text-slate-800">
                                Appointment Information
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                Fill in the details below to create an appointment.
                            </p>

                        </div>

                        <!-- FORM -->
                        <form action="{{ route('appointments.store') }}"
                              method="POST">

                            @csrf

                            <div class="p-6">

                                <!-- Validation Errors -->
                                @if ($errors->any())
                                    <div class="mb-6 bg-red-50 border border-red-200
                                                text-red-700 rounded-lg p-4">

                                        <p class="font-semibold mb-2">
                                            Please fix the following errors:
                                        </p>

                                        <ul class="list-disc list-inside text-sm">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                    </div>
                                @endif

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <!-- PATIENT -->
                                    <div>

                                        <label for="patient_id"
                                               class="block text-sm font-medium
                                                      text-slate-700 mb-2">
                                            Patient
                                        </label>

                                        <select id="patient_id"
                                                name="patient_id"
                                                class="w-full px-4 py-3
                                                       border border-slate-300
                                                       rounded-lg
                                                       focus:ring-2 focus:ring-blue-500
                                                       focus:border-blue-500
                                                       outline-none">

                                            <option value="">
                                                Select Patient
                                            </option>

                                            @foreach ($patients as $patient)

                                                <option value="{{ $patient->id }}"
                                                    {{ old('patient_id') == $patient->id ? 'selected' : '' }}>

                                                    {{ $patient->first_name }}
                                                    {{ $patient->last_name }}
                                                    — {{ $patient->patient_id }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('patient_id')
                                            <p class="text-red-500 text-sm mt-1">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                    <!-- DOCTOR -->
                                    <div>

                                        <label for="doctor_id"
                                               class="block text-sm font-medium
                                                      text-slate-700 mb-2">
                                            Doctor
                                        </label>

                                        <select id="doctor_id"
                                                name="doctor_id"
                                                class="w-full px-4 py-3
                                                       border border-slate-300
                                                       rounded-lg
                                                       focus:ring-2 focus:ring-blue-500
                                                       focus:border-blue-500
                                                       outline-none">

                                            <option value="">
                                                Select Doctor
                                            </option>

                                            @foreach ($doctors as $doctor)

                                                <option value="{{ $doctor->id }}"
                                                    {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>

                                                    Dr.
                                                    {{ $doctor->first_name }}
                                                    {{ $doctor->last_name }}
                                                    — {{ $doctor->specialization }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('doctor_id')
                                            <p class="text-red-500 text-sm mt-1">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                    <!-- DATE -->
                                    <div>

                                        <label for="appointment_date"
                                               class="block text-sm font-medium
                                                      text-slate-700 mb-2">
                                            Appointment Date
                                        </label>

                                        <input type="date"
                                               id="appointment_date"
                                               name="appointment_date"
                                               value="{{ old('appointment_date') }}"
                                               class="w-full px-4 py-3
                                                      border border-slate-300
                                                      rounded-lg
                                                      focus:ring-2 focus:ring-blue-500
                                                      focus:border-blue-500
                                                      outline-none">

                                        @error('appointment_date')
                                            <p class="text-red-500 text-sm mt-1">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                    <!-- TIME -->
                                    <div>

                                        <label for="appointment_time"
                                               class="block text-sm font-medium
                                                      text-slate-700 mb-2">
                                            Appointment Time
                                        </label>

                                        <input type="time"
                                               id="appointment_time"
                                               name="appointment_time"
                                               value="{{ old('appointment_time') }}"
                                               class="w-full px-4 py-3
                                                      border border-slate-300
                                                      rounded-lg
                                                      focus:ring-2 focus:ring-blue-500
                                                      focus:border-blue-500
                                                      outline-none">

                                        @error('appointment_time')
                                            <p class="text-red-500 text-sm mt-1">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                    <!-- STATUS -->
                                    <div>

                                        <label for="status"
                                               class="block text-sm font-medium
                                                      text-slate-700 mb-2">
                                            Status
                                        </label>

                                        <select id="status"
                                                name="status"
                                                class="w-full px-4 py-3
                                                       border border-slate-300
                                                       rounded-lg
                                                       focus:ring-2 focus:ring-blue-500
                                                       focus:border-blue-500
                                                       outline-none">

                                            <option value="Pending"
                                                {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="Confirmed"
                                                {{ old('status') == 'Confirmed' ? 'selected' : '' }}>
                                                Confirmed
                                            </option>

                                            <option value="Completed"
                                                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>

                                            <option value="Cancelled"
                                                {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>

                                        </select>

                                        @error('status')
                                            <p class="text-red-500 text-sm mt-1">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                    </div>

                                </div>

                                <!-- REASON -->
                                <div class="mt-6">

                                    <label for="reason"
                                           class="block text-sm font-medium
                                                  text-slate-700 mb-2">
                                        Reason
                                    </label>

                                    <textarea id="reason"
                                              name="reason"
                                              rows="4"
                                              placeholder="Enter reason for appointment..."
                                              class="w-full px-4 py-3
                                                     border border-slate-300
                                                     rounded-lg
                                                     focus:ring-2 focus:ring-blue-500
                                                     focus:border-blue-500
                                                     outline-none resize-none">{{ old('reason') }}</textarea>

                                    @error('reason')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- NOTES -->
                                <div class="mt-6">

                                    <label for="notes"
                                           class="block text-sm font-medium
                                                  text-slate-700 mb-2">
                                        Notes
                                    </label>

                                    <textarea id="notes"
                                              name="notes"
                                              rows="4"
                                              placeholder="Enter additional notes..."
                                              class="w-full px-4 py-3
                                                     border border-slate-300
                                                     rounded-lg
                                                     focus:ring-2 focus:ring-blue-500
                                                     focus:border-blue-500
                                                     outline-none resize-none">{{ old('notes') }}</textarea>

                                    @error('notes')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <!-- ACTIONS -->
                                <div class="flex flex-col sm:flex-row
                                            gap-3 mt-8 pt-6
                                            border-t border-slate-200">

                                    <a href="{{ route('appointments.index') }}"
                                       class="flex-1 text-center
                                              bg-slate-100 hover:bg-slate-200
                                              text-slate-700 px-5 py-3
                                              rounded-lg font-medium transition">

                                        Cancel

                                    </a>

                                    <button type="submit"
                                            class="flex-1
                                                   bg-blue-600 hover:bg-blue-700
                                                   text-white px-5 py-3
                                                   rounded-lg font-medium transition">

                                        Create Appointment

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </section>

        </main>

    </div>

    <!-- SIDEBAR SCRIPT -->
    <script>

        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        function showSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function hideSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        openSidebar.addEventListener('click', showSidebar);
        closeSidebar.addEventListener('click', hideSidebar);
        sidebarOverlay.addEventListener('click', hideSidebar);

        const sidebarLinks = sidebar.querySelectorAll('a');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    hideSidebar();
                }
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });

    </script>

</body>

</html>