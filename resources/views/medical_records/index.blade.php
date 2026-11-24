<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medical Records - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        <!-- ================= MOBILE OVERLAY ================= -->
        <div id="sidebarOverlay"
             class="fixed inset-0 bg-black/40 z-40 hidden md:hidden">
        </div>


        <!-- ================= SIDEBAR ================= -->
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

                    <!-- Close Button Mobile -->
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

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a> -->


                <!-- Patients -->
                <!-- <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👥</span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a> -->


                <!-- Doctors -->
                <!-- <a href="{{ url('/doctors') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>

                    <span class="font-medium">
                        Doctors
                    </span>

                </a> -->


                <!-- Appointments -->
                <!-- <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a> -->


                <!-- Medical Records ACTIVE -->
                <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">📋</span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>


                <!-- Prescriptions -->
                <!-- <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a> -->


                <div class="border-t border-slate-200 my-5"></div>


                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Medical Records
                </p>


                <!-- Add Medical Record -->
                <a href="{{ route('medical_records.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm">

                    <span class="text-lg">➕</span>

                    <span class="font-medium">
                        Add Record
                    </span>

                </a>

            </nav>


            <!-- Sidebar Bottom -->
            <div class="px-3 sm:px-4 py-4 border-t border-slate-200">

                <!-- Settings -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-slate-100 transition">

                    <span class="text-lg">⚙️</span>

                    <span class="font-medium">
                        Settings
                    </span>

                </a>


                <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit"
        class="w-full flex items-center gap-3 px-3 py-3 rounded-lg
               text-red-500 hover:bg-red-50 transition text-left">

        <span class="text-lg">🚪</span>

        <span class="font-medium">
            Logout
        </span>

    </button>
</form>

            </div>

        </aside>



        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 min-w-0 w-full">


            <!-- ================= MOBILE HEADER ================= -->
            <header class="md:hidden bg-white border-b border-slate-200
                           px-4 py-4 sticky top-0 z-30">

                <div class="flex items-center justify-between gap-3">

                    <div class="flex items-center gap-3 min-w-0">

                        <!-- Menu Button -->
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
                                Medical Records
                            </p>

                        </div>

                    </div>


                    <!-- Mobile Add Button -->
                    <a href="{{ route('medical_records.create') }}"
                       class="flex-shrink-0
                              bg-blue-600 hover:bg-blue-700
                              text-white px-3 py-2
                              rounded-lg text-sm font-medium">

                        + Add

                    </a>

                </div>

            </header>



            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            Medical Records
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Manage and view all patient medical records.
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



            <!-- ================= CONTENT ================= -->
            <div class="px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">


                <!-- ================= PAGE TITLE MOBILE ================= -->
                <div class="md:hidden mb-5">

                    <h2 class="text-xl font-bold text-slate-800">
                        Medical Records
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Manage and view all patient medical records.
                    </p>

                </div>



                <!-- ================= SUCCESS MESSAGE ================= -->
                @if(session('success'))

                    <div class="mb-6 rounded-lg
                                bg-green-100 border border-green-200
                                px-4 py-3 text-green-700">

                        {{ session('success') }}

                    </div>

                @endif



                <!-- ================= STATS ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                            lg:grid-cols-3 gap-4 lg:gap-5 mb-6 lg:mb-8">


                    <!-- Total Records -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Medical Records
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $medicalRecords->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-blue-100 text-blue-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                📋

                            </div>

                        </div>

                    </div>



                    <!-- Patients -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Patients with Records
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $medicalRecords->pluck('patient_id')->unique()->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-indigo-100 text-indigo-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👥

                            </div>

                        </div>

                    </div>



                    <!-- Doctors -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Doctors Involved
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $medicalRecords->pluck('doctor_id')->unique()->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-emerald-100 text-emerald-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👨‍⚕️

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= MEDICAL RECORD TABLE CARD ================= -->
                <div class="bg-white rounded-xl shadow-sm
                            border border-slate-200 overflow-hidden">


                    <!-- Table Header -->
                    <div class="px-4 sm:px-6 py-5
                                border-b border-slate-200">

                        <div class="flex flex-col lg:flex-row
                                    lg:items-center
                                    lg:justify-between gap-4">

                            <div>

                                <h3 class="text-lg font-semibold
                                           text-slate-800">

                                    Medical Record List

                                </h3>

                                <p class="text-sm text-slate-500 mt-1">

                                    Patient consultation and medical history

                                </p>

                            </div>


                            <!-- Search -->
                            <div class="w-full lg:w-64">

                                <input
                                    type="text"
                                    placeholder="Search medical record..."
                                    class="w-full border border-slate-300
                                           rounded-lg px-4 py-2.5
                                           text-sm
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                            </div>

                        </div>

                    </div>



                    <!-- ================= RESPONSIVE TABLE ================= -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[1100px] text-left">


                            <!-- Table Head -->
                            <thead class="bg-slate-50
                                          border-b border-slate-200">

                                <tr>

                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Patient

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Doctor

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Appointment

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Diagnosis

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Treatment

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               text-right
                                               whitespace-nowrap">

                                        Actions

                                    </th>

                                </tr>

                            </thead>



                            <!-- Table Body -->
                            <tbody class="divide-y divide-slate-100">

                                @forelse($medicalRecords as $record)

                                    <tr class="hover:bg-slate-50 transition">


                                        <!-- Patient -->
                                        <td class="px-5 sm:px-6 py-4">

                                            <div class="flex items-center gap-3">

                                                <div class="w-10 h-10
                                                            flex-shrink-0
                                                            rounded-full
                                                            bg-blue-100
                                                            text-blue-700
                                                            flex items-center
                                                            justify-center
                                                            font-bold">

                                                    {{ strtoupper(substr($record->patient->first_name ?? 'U', 0, 1)) }}

                                                </div>


                                                <div class="min-w-0">

                                                    <p class="font-semibold
                                                              text-slate-800
                                                              whitespace-nowrap">

                                                        {{ $record->patient->first_name ?? 'Unknown' }}
                                                        {{ $record->patient->last_name ?? '' }}

                                                    </p>

                                                    <p class="text-xs text-slate-400">

                                                        {{ $record->patient->patient_id ?? 'N/A' }}

                                                    </p>

                                                </div>

                                            </div>

                                        </td>



                                        <!-- Doctor -->
                                        <td class="px-5 sm:px-6 py-4">

                                            @if($record->doctor)

                                                <div class="flex items-center gap-3">

                                                    <div class="w-10 h-10
                                                                flex-shrink-0
                                                                rounded-full
                                                                bg-indigo-100
                                                                text-indigo-700
                                                                flex items-center
                                                                justify-center
                                                                font-bold">

                                                        {{ strtoupper(substr($record->doctor->first_name, 0, 1)) }}

                                                    </div>


                                                    <div>

                                                        <p class="font-semibold
                                                                  text-slate-800
                                                                  whitespace-nowrap">

                                                            Dr.
                                                            {{ $record->doctor->first_name }}
                                                            {{ $record->doctor->last_name }}

                                                        </p>

                                                        <p class="text-xs text-slate-400">

                                                            {{ $record->doctor->specialization }}

                                                        </p>

                                                    </div>

                                                </div>

                                            @else

                                                <span class="text-slate-400">
                                                    N/A
                                                </span>

                                            @endif

                                        </td>



                                        <!-- Appointment -->
                                        <td class="px-5 sm:px-6 py-4">

                                            @if($record->appointment)

                                                <div class="text-sm text-slate-700
                                                            whitespace-nowrap">

                                                    {{ $record->appointment->appointment_date }}

                                                </div>

                                                <div class="text-xs text-slate-500">

                                                    {{ $record->appointment->appointment_time }}

                                                </div>

                                            @else

                                                <span class="px-3 py-1
                                                             rounded-full
                                                             text-xs font-medium
                                                             bg-slate-100
                                                             text-slate-500">

                                                    No Appointment

                                                </span>

                                            @endif

                                        </td>



                                        <!-- Diagnosis -->
                                        <td class="px-5 sm:px-6 py-4 max-w-xs">

                                            @if($record->diagnosis)

                                                <span class="text-sm text-slate-700">

                                                    {{ \Illuminate\Support\Str::limit($record->diagnosis, 40) }}

                                                </span>

                                            @else

                                                <span class="text-sm text-slate-400">
                                                    No diagnosis
                                                </span>

                                            @endif

                                        </td>



                                        <!-- Treatment -->
                                        <td class="px-5 sm:px-6 py-4 max-w-xs">

                                            @if($record->treatment)

                                                <span class="text-sm text-slate-700">

                                                    {{ \Illuminate\Support\Str::limit($record->treatment, 40) }}

                                                </span>

                                            @else

                                                <span class="text-sm text-slate-400">
                                                    No treatment
                                                </span>

                                            @endif

                                        </td>



                                        <!-- Actions -->
                                        <td class="px-5 sm:px-6 py-4">

                                            <div class="flex justify-end
                                                        items-center gap-2">


                                                <!-- View -->
                                                <a href="{{ route('medical_records.show', $record->id) }}"
                                                   class="px-3 py-2
                                                          text-sm font-medium
                                                          text-slate-600
                                                          bg-slate-100
                                                          hover:bg-slate-200
                                                          rounded-lg
                                                          transition">

                                                    View

                                                </a>


                                                <!-- Edit -->
                                                <a href="{{ route('medical_records.edit', $record->id) }}"
                                                   class="px-3 py-2
                                                          text-sm font-medium
                                                          text-blue-600
                                                          bg-blue-50
                                                          hover:bg-blue-100
                                                          rounded-lg
                                                          transition">

                                                    Edit

                                                </a>


                                                <!-- Delete -->
                                                <form
                                                    action="{{ route('medical_records.destroy', $record->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete this medical record?')"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="px-3 py-2
                                                               text-sm font-medium
                                                               text-red-600
                                                               bg-red-50
                                                               hover:bg-red-100
                                                               rounded-lg
                                                               transition">

                                                        Delete

                                                    </button>

                                                </form>


                                            </div>

                                        </td>

                                    </tr>


                                @empty

                                    <!-- Empty State -->
                                    <tr>

                                        <td colspan="6"
                                            class="px-6 py-16 text-center">

                                            <div class="text-5xl mb-4">
                                                📋
                                            </div>


                                            <h3 class="text-lg font-semibold
                                                       text-slate-700">

                                                No medical records yet

                                            </h3>


                                            <p class="text-slate-500
                                                      text-sm mt-1 mb-5">

                                                Start by adding your first
                                                medical record.

                                            </p>


                                            <a href="{{ route('medical_records.create') }}"
                                               class="inline-block
                                                      bg-blue-600
                                                      hover:bg-blue-700
                                                      text-white
                                                      px-5 py-2.5
                                                      rounded-lg
                                                      font-medium">

                                                + Add Medical Record

                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <!-- Mobile Table Hint -->
                    @if($medicalRecords->count() > 0)

                        <div class="md:hidden px-4 py-3
                                    border-t border-slate-200
                                    text-center">

                            <p class="text-xs text-slate-400">

                                ← Swipe left or right to view the table →

                            </p>

                        </div>

                    @endif


                </div>

            </div>

        </main>

    </div>



    <!-- ================= MOBILE SIDEBAR SCRIPT ================= -->
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


        // Close sidebar when clicking a navigation link on mobile
        const sidebarLinks = sidebar.querySelectorAll('a');

        sidebarLinks.forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth < 768) {

                    hideSidebar();

                }

            });

        });


        // Reset sidebar when screen becomes desktop
        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                sidebarOverlay.classList.add('hidden');

                document.body.classList.remove('overflow-hidden');

            }

        });

    </script>

</body>

</html>