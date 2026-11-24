<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Appointment - Clinic Management System</title>

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

                <!-- Add Appointment -->
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

                    <a href="{{ route('appointments.create') }}"
                       class="flex-shrink-0
                              bg-blue-600 hover:bg-blue-700
                              text-white px-3 py-2
                              rounded-lg text-sm font-medium">
                        + Add
                    </a>

                </div>

            </header>

            <!-- DESKTOP HEADER -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">
                            Appointment Details
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            View the complete appointment information.
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

                    <!-- APPOINTMENT CARD -->
                    <div class="bg-white rounded-xl border border-slate-200
                                shadow-sm overflow-hidden">

                        <!-- CARD HEADER -->
                        <div class="px-6 py-5 border-b border-slate-200">

                            <div class="flex flex-col sm:flex-row
                                        sm:items-center sm:justify-between
                                        gap-3">

                                <div>
                                    <h3 class="text-xl font-bold text-slate-800">
                                        Appointment Information
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Appointment ID: {{ $appointment->id }}
                                    </p>
                                </div>

                                <!-- STATUS -->
                                @if ($appointment->status === 'Pending')

                                    <span class="w-fit px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>

                                @elseif ($appointment->status === 'Confirmed')

                                    <span class="w-fit px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-blue-100 text-blue-700">
                                        Confirmed
                                    </span>

                                @elseif ($appointment->status === 'Completed')

                                    <span class="w-fit px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-green-100 text-green-700">
                                        Completed
                                    </span>

                                @elseif ($appointment->status === 'Cancelled')

                                    <span class="w-fit px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-red-100 text-red-700">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="w-fit px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-slate-100 text-slate-600">
                                        {{ $appointment->status }}
                                    </span>

                                @endif

                            </div>

                        </div>

                        <!-- DETAILS -->
                        <div class="p-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- PATIENT -->
                                <div class="bg-slate-50 rounded-lg p-5">

                                    <p class="text-xs font-semibold text-slate-400
                                              uppercase mb-2">
                                        Patient
                                    </p>

                                    <h4 class="text-lg font-semibold text-slate-800">

                                        {{ $appointment->patient->first_name }}
                                        {{ $appointment->patient->last_name }}

                                    </h4>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Patient ID:
                                        {{ $appointment->patient->patient_id }}
                                    </p>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Mobile:
                                        {{ $appointment->patient->mobile_number ?? 'N/A' }}
                                    </p>

                                </div>

                                <!-- DOCTOR -->
                                <div class="bg-slate-50 rounded-lg p-5">

                                    <p class="text-xs font-semibold text-slate-400
                                              uppercase mb-2">
                                        Doctor
                                    </p>

                                    <h4 class="text-lg font-semibold text-slate-800">

                                        Dr.
                                        {{ $appointment->doctor->first_name }}
                                        {{ $appointment->doctor->last_name }}

                                    </h4>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Specialization:
                                        {{ $appointment->doctor->specialization }}
                                    </p>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Mobile:
                                        {{ $appointment->doctor->mobile_number ?? 'N/A' }}
                                    </p>

                                </div>

                            </div>

                            <!-- DATE & TIME -->
                            <div class="grid grid-cols-1 md:grid-cols-2
                                        gap-6 mt-6">

                                <!-- DATE -->
                                <div>

                                    <p class="text-xs font-semibold text-slate-400
                                              uppercase mb-1">
                                        Appointment Date
                                    </p>

                                    <p class="text-slate-800 font-medium">
                                        {{ $appointment->appointment_date }}
                                    </p>

                                </div>

                                <!-- TIME -->
                                <div>

                                    <p class="text-xs font-semibold text-slate-400
                                              uppercase mb-1">
                                        Appointment Time
                                    </p>

                                    <p class="text-slate-800 font-medium">
                                        {{ $appointment->appointment_time }}
                                    </p>

                                </div>

                            </div>

                            <!-- REASON -->
                            <div class="mt-6">

                                <p class="text-xs font-semibold text-slate-400
                                          uppercase mb-2">
                                    Reason
                                </p>

                                <div class="bg-slate-50 rounded-lg p-4
                                            text-slate-700 whitespace-pre-line">

                                    {{ $appointment->reason ?? 'No reason provided.' }}

                                </div>

                            </div>

                            <!-- NOTES -->
                            <div class="mt-6">

                                <p class="text-xs font-semibold text-slate-400
                                          uppercase mb-2">
                                    Notes
                                </p>

                                <div class="bg-slate-50 rounded-lg p-4
                                            text-slate-700 whitespace-pre-line">

                                    {{ $appointment->notes ?? 'No notes available.' }}

                                </div>

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

                                    ← Back to Appointments

                                </a>

                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                   class="flex-1 text-center
                                          bg-blue-600 hover:bg-blue-700
                                          text-white px-5 py-3
                                          rounded-lg font-medium transition">

                                    Edit Appointment

                                </a>

                            </div>

                        </div>

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