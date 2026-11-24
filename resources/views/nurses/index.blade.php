<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinic Management System</title>

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
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">🏠</span>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>


                <!-- Patients -->
                <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👥</span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a>


                <!-- Doctors -->
                <a href="{{ route('doctors.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>

                    <span class="font-medium">
                        Doctors
                    </span>

                </a>


                <!-- Nurses Active -->
                <a href="{{ route('nurses.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">👩‍⚕️</span>

                    <span class="font-medium">
                        Nurses
                    </span>

                </a>


                <!-- Appointments -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>


                <!-- Medical Records -->
                <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">🗂️</span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>


                <!-- Prescriptions -->
                <a href="{{ route('prescriptions.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a>


                <!-- Bills -->
                <a href="{{ route('bills.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💰</span>

                    <span class="font-medium">
                        Bills
                    </span>

                </a>


                <div class="border-t border-slate-200 my-5"></div>


                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">
                    Staff
                </p>


                <!-- Add Nurse -->
                <a href="{{ route('nurses.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm mb-1">

                    <span class="text-lg">➕</span>

                    <span class="font-medium">
                        Add Nurse
                    </span>

                </a>


                <!-- Add Patient -->
                <a href="{{ route('patients.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition">

                    <span class="text-lg">➕</span>

                    <span class="font-medium">
                        Add Patient
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
                                   text-red-500 hover:bg-red-50 transition">

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
                                Nurse Management
                            </p>

                        </div>

                    </div>


                    <!-- Mobile Add Button -->
                    <a href="{{ route('nurses.create') }}"
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
                            Nurses
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Manage and view all registered nurses.
                        </p>

                    </div>


                    <a href="{{ route('nurses.create') }}"
                       class="bg-blue-600 hover:bg-blue-700
                              text-white px-5 py-2.5
                              rounded-lg font-medium
                              shadow-sm transition
                              whitespace-nowrap">

                        + Add Nurse

                    </a>

                </div>

            </header>



            <!-- ================= CONTENT ================= -->
            <div class="px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">


                <!-- Mobile Page Title -->
                <div class="md:hidden mb-5">

                    <h2 class="text-xl font-bold text-slate-800">
                        Nurses
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Manage and view all registered nurses.
                    </p>

                </div>


                <!-- Success Message -->
                @if(session('success'))

                    <div class="mb-6 bg-green-50 border border-green-200
                                text-green-700 px-4 py-3 rounded-lg text-sm">

                        {{ session('success') }}

                    </div>

                @endif



                <!-- ================= STATS ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                            lg:grid-cols-3 gap-4 lg:gap-5 mb-6 lg:mb-8">


                    <!-- Total Nurses -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Nurses
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $nurses->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-blue-100 text-blue-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👩‍⚕️

                            </div>

                        </div>

                    </div>



                    <!-- Active Nurses -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Active Nurses
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-green-600 mt-2">

                                    {{ $nurses->where('status', 'Active')->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-green-100 text-green-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                ✓

                            </div>

                        </div>

                    </div>



                    <!-- Inactive Nurses -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Inactive Nurses
                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $nurses->where('status', 'Inactive')->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        bg-slate-100 text-slate-600
                                        rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                ○

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= NURSE TABLE CARD ================= -->
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

                                    Nurse List

                                </h3>

                                <p class="text-sm text-slate-500 mt-1">

                                    Registered nurses in the clinic

                                </p>

                            </div>


                            <!-- Search -->
                            <div class="w-full lg:w-64">

                                <input
                                    type="text"
                                    id="searchNurse"
                                    placeholder="Search nurse..."
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

                        <table class="w-full min-w-[1050px] text-left">


                            <!-- Table Head -->
                            <thead class="bg-slate-50
                                          border-b border-slate-200">

                                <tr>

                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Nurse ID

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Name

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Specialization

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Mobile

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Email

                                    </th>


                                    <th class="px-5 sm:px-6 py-4
                                               text-xs font-semibold
                                               text-slate-500 uppercase
                                               whitespace-nowrap">

                                        Status

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

                                @forelse($nurses as $nurse)

                                    <tr class="hover:bg-slate-50 transition">


                                        <!-- Nurse ID -->
                                        <td class="px-5 sm:px-6 py-4">

                                            <span class="font-mono text-sm
                                                         text-blue-600
                                                         bg-blue-50
                                                         px-2.5 py-1
                                                         rounded-md
                                                         whitespace-nowrap">

                                                {{ $nurse->nurse_id }}

                                            </span>

                                        </td>



                                        <!-- Name -->
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

                                                    {{ strtoupper(substr($nurse->first_name, 0, 1)) }}

                                                </div>


                                                <div class="min-w-0">

                                                    <p class="font-semibold
                                                              text-slate-800
                                                              whitespace-nowrap">

                                                        {{ $nurse->first_name }}
                                                        {{ $nurse->last_name }}

                                                    </p>

                                                    <p class="text-xs
                                                              text-slate-400">

                                                        Nurse

                                                    </p>

                                                </div>

                                            </div>

                                        </td>



                                        <!-- Specialization -->
                                        <td class="px-5 sm:px-6 py-4
                                                   text-sm text-slate-600
                                                   whitespace-nowrap">

                                            {{ $nurse->specialization ?? '—' }}

                                        </td>



                                        <!-- Mobile -->
                                        <td class="px-5 sm:px-6 py-4
                                                   text-sm text-slate-600
                                                   whitespace-nowrap">

                                            {{ $nurse->mobile_number ?? '—' }}

                                        </td>



                                        <!-- Email -->
                                        <td class="px-5 sm:px-6 py-4
                                                   text-sm text-slate-600
                                                   whitespace-nowrap">

                                            {{ $nurse->email ?? '—' }}

                                        </td>



                                        <!-- Status -->
                                        <td class="px-5 sm:px-6 py-4">

                                            @if($nurse->status === 'Active')

                                                <span class="px-3 py-1
                                                             rounded-full
                                                             text-xs font-medium
                                                             bg-green-100
                                                             text-green-700">

                                                    Active

                                                </span>

                                            @else

                                                <span class="px-3 py-1
                                                             rounded-full
                                                             text-xs font-medium
                                                             bg-slate-100
                                                             text-slate-600">

                                                    Inactive

                                                </span>

                                            @endif

                                        </td>



                                        <!-- Actions -->
                                        <td class="px-5 sm:px-6 py-4">

                                            <div class="flex justify-end
                                                        items-center gap-2">


                                                <!-- View -->
                                                <a href="{{ route('nurses.show', $nurse->id) }}"
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
                                                <a href="{{ route('nurses.edit', $nurse->id) }}"
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
                                                    action="{{ route('nurses.destroy', $nurse->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete this nurse?')"
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

                                        <td colspan="7"
                                            class="px-6 py-16 text-center">


                                            <div class="text-5xl mb-4">
                                                👩‍⚕️
                                            </div>


                                            <h3 class="text-lg font-semibold
                                                       text-slate-700">

                                                No nurses yet

                                            </h3>


                                            <p class="text-slate-500
                                                      text-sm mt-1 mb-5">

                                                Start by adding your first
                                                nurse.

                                            </p>


                                            <a href="{{ route('nurses.create') }}"
                                               class="inline-block
                                                      bg-blue-600
                                                      hover:bg-blue-700
                                                      text-white
                                                      px-5 py-2.5
                                                      rounded-lg
                                                      font-medium">

                                                + Add Nurse

                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>



                    <!-- Mobile Table Hint -->
                    @if($nurses->count() > 0)

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


        // ================= SEARCH NURSE =================

        const searchInput = document.getElementById('searchNurse');

        if (searchInput) {

            searchInput.addEventListener('input', function () {

                const searchValue = this.value.toLowerCase().trim();

                document.querySelectorAll('tbody tr').forEach(function (row) {

                    const rowText = row.innerText.toLowerCase();

                    if (rowText.includes(searchValue)) {

                        row.classList.remove('hidden');

                    } else {

                        row.classList.add('hidden');

                    }

                });

            });

        }

    </script>

</body>

</html>