<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Appointments - Clinic Management System</title>
       <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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

                    <!-- Close Button -->
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
                <!-- <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">🏠</span>
                    <span class="font-medium">Dashboard</span>
                </a> -->

                <!-- Patients -->
                <!-- <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👥</span>
                    <span class="font-medium">Patients</span>
                </a> -->

                <!-- Doctors -->
                <!-- <a href="{{ route('doctors.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1"> -->

                    <!-- <span class="text-lg">👨‍⚕️</span>
                    <span class="font-medium">Doctors</span> -->
                </a>

                <!-- Appointments ACTIVE -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>
                    <span class="font-medium">Appointments</span>
                </a>

                     <!-- Doctors -->
            <!-- <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>
                    <span class="font-medium">Medical Records</span>
                </a> -->


                <!-- Prescriptions -->
             <!-- <a href="{{ route('prescriptions.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>
                    <span class="font-medium">Prescriptions</span>
                </a> -->

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
               <form method="POST" action="{{ route('logout') }}">
    @csrf
  <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-red-600 transition hover:bg-red-50">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    Logout
                </button>
</form>

            </div>

        </aside>

        <!-- MAIN CONTENT -->
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
                            Appointments
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Manage and view all appointments.
                        </p>

                    </div>

                   <a href="{{ auth()->user()->role === 'admin'
    ? route('dashboard')
    : (auth()->user()->role === 'doctor'
        ? route('doctor.dashboard')
        : (auth()->user()->role === 'nurse'
            ? route('nurse.dashboard')
            : route('patients.my-history'))) }}"
   class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2
          text-sm font-semibold text-white transition hover:bg-blue-700">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="h-5 w-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>

    Return to Dashboard
</a>



                </div>

            </header>

            <!-- CONTENT -->
            <section class="p-4 sm:p-6 lg:p-8">

                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200
                                text-green-700 px-4 py-3 rounded-lg">

                        {{ session('success') }}

                    </div>
                @endif

                <!-- APPOINTMENTS CARD -->
                <div class="bg-white rounded-xl border border-slate-200
                            shadow-sm overflow-hidden">

                    <!-- Card Header -->
                    <div class="px-5 sm:px-6 py-5 border-b border-slate-200">

                        <h3 class="text-lg font-semibold text-slate-800">
                            Appointment List
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            All registered appointments are shown below.
                        </p>

                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[900px]">

                            <thead class="bg-slate-50 border-b border-slate-200">

                                <tr>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Patient
                                    </th>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Doctor
                                    </th>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Date
                                    </th>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Time
                                    </th>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Status
                                    </th>

                                    <th class="text-left px-5 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase">
                                        Actions
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                @forelse ($appointments as $appointment)

                                    <tr class="hover:bg-slate-50 transition">

                                        <!-- Patient -->
                                        <td class="px-5 py-4">

                                            <div class="font-medium text-slate-800">

                                                {{ $appointment->patient->first_name }}
                                                {{ $appointment->patient->last_name }}

                                            </div>

                                            <div class="text-xs text-slate-500 mt-1">

                                                {{ $appointment->patient->patient_id }}

                                            </div>

                                        </td>

                                        <!-- Doctor -->
                                        <td class="px-5 py-4">

                                            <div class="font-medium text-slate-800">

                                                Dr.
                                                {{ $appointment->doctor->first_name }}
                                                {{ $appointment->doctor->last_name }}

                                            </div>

                                            <div class="text-xs text-slate-500 mt-1">

                                                {{ $appointment->doctor->specialization }}

                                            </div>

                                        </td>

                                        <!-- Date -->
                                        <td class="px-5 py-4 text-sm text-slate-600">

                                            {{ $appointment->appointment_date }}

                                        </td>

                                        <!-- Time -->
                                        <td class="px-5 py-4 text-sm text-slate-600">

                                            {{ $appointment->appointment_time }}

                                        </td>

                                        <!-- Status -->
                                        <td class="px-5 py-4">

                                            @if ($appointment->status === 'Pending')

                                                <span class="inline-flex px-3 py-1
                                                             rounded-full text-xs
                                                             font-medium
                                                             bg-yellow-100
                                                             text-yellow-700">

                                                    Pending

                                                </span>

                                            @elseif ($appointment->status === 'Confirmed')

                                                <span class="inline-flex px-3 py-1
                                                             rounded-full text-xs
                                                             font-medium
                                                             bg-blue-100
                                                             text-blue-700">

                                                    Confirmed

                                                </span>

                                            @elseif ($appointment->status === 'Completed')

                                                <span class="inline-flex px-3 py-1
                                                             rounded-full text-xs
                                                             font-medium
                                                             bg-green-100
                                                             text-green-700">

                                                    Completed

                                                </span>

                                            @elseif ($appointment->status === 'Cancelled')

                                                <span class="inline-flex px-3 py-1
                                                             rounded-full text-xs
                                                             font-medium
                                                             bg-red-100
                                                             text-red-700">

                                                    Cancelled

                                                </span>

                                            @else

                                                <span class="inline-flex px-3 py-1
                                                             rounded-full text-xs
                                                             font-medium
                                                             bg-slate-100
                                                             text-slate-600">

                                                    {{ $appointment->status }}

                                                </span>

                                            @endif

                                        </td>

                                        <!-- Actions -->
                                        <td class="px-5 py-4">

                                            <div class="flex items-center gap-2">

                                                <a href="{{ route('appointments.show', $appointment->id) }}"
                                                   class="px-3 py-1.5 rounded-lg
                                                          bg-slate-100
                                                          text-slate-600
                                                          hover:bg-slate-200
                                                          text-sm">

                                                    View

                                                </a>

                                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                                   class="px-3 py-1.5 rounded-lg
                                                          bg-blue-50
                                                          text-blue-600
                                                          hover:bg-blue-100
                                                          text-sm">

                                                    Edit

                                                </a>

                                                <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this appointment?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="px-3 py-1.5 rounded-lg
                                                                   bg-red-50
                                                                   text-red-600
                                                                   hover:bg-red-100
                                                                   text-sm">

                                                        Delete

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="px-5 py-12 text-center">

                                            <div class="text-4xl mb-3">
                                                📅
                                            </div>

                                            <h3 class="text-lg font-semibold
                                                       text-slate-700">

                                                No appointments yet

                                            </h3>

                                            <p class="text-sm text-slate-500 mt-1">

                                                Start by adding a new appointment.

                                            </p>

                                            <a href="{{ route('appointments.create') }}"
                                               class="inline-block mt-4
                                                      bg-blue-600
                                                      hover:bg-blue-700
                                                      text-white px-5 py-2.5
                                                      rounded-lg font-medium">

                                                + Add Appointment

                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

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