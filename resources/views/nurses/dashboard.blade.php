
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Dashboard | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen text-slate-800">

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

            <!-- LOGO -->
            <div class="px-5 sm:px-6 py-5 border-b border-slate-200">

                <div class="flex items-center justify-between gap-3">

                    <div class="min-w-0">

                        <img
                            src="{{ asset('img/clinic_logo.png') }}"
                            alt="Clinic Logo"
                            class="max-w-full h-auto object-contain"
                            style="max-height: 55px;"
                        >

                        <p class="text-xs text-slate-500 mt-2">
                            Nurse Portal
                        </p>

                    </div>

                    <!-- MOBILE CLOSE BUTTON -->
                    <button id="closeSidebar"
                            type="button"
                            aria-label="Close sidebar"
                            class="md:hidden flex-shrink-0
                                   text-slate-500 hover:text-slate-800
                                   text-2xl">

                        ✕

                    </button>

                </div>

            </div>


            <!-- ================= NAVIGATION ================= -->
            <nav class="flex-1 px-3 sm:px-4 py-5 overflow-y-auto">

                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">

                    Main Menu

                </p>


                <!-- DASHBOARD -->
                <a href="{{ route('nurse.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">🏠</span>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>


                <!-- APPOINTMENTS -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>


                <!-- PATIENTS -->
                <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">👥</span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a>


                <!-- MEDICAL RECORDS -->
                <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">🗂️</span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>


                <!-- PRESCRIPTIONS -->
                <a href="{{ route('prescriptions.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a>

            </nav>


            <!-- ================= SIDEBAR BOTTOM ================= -->
            <div class="px-3 sm:px-4 py-4 border-t border-slate-200">

                <!-- USER INFORMATION -->
                <div class="px-3 py-3 mb-2">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 flex-shrink-0
                                    rounded-full bg-blue-100
                                    text-blue-700 font-bold
                                    flex items-center justify-center">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div class="min-w-0">

                            <p class="font-semibold text-sm text-slate-800 truncate">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-500 capitalize">

                                {{ auth()->user()->role }}

                            </p>

                        </div>

                    </div>

                </div>


                <!-- SETTINGS -->
               <a href="{{ route('settings.index') }}"
   class="flex items-center gap-3 px-3 py-3 rounded-lg
          text-slate-600 hover:bg-slate-100 transition">

    <span class="text-lg">⚙️</span>

    <span class="font-medium">
        Settings
    </span>

</a>


                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-3
                                   rounded-lg text-red-500
                                   hover:bg-red-50 transition text-left">

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

                <div class="flex items-center gap-3">

                    <!-- MOBILE MENU BUTTON -->
                    <button id="openSidebar"
                            type="button"
                            aria-label="Open sidebar"
                            class="flex-shrink-0 w-10 h-10 rounded-lg
                                   bg-blue-50 text-blue-600
                                   hover:bg-blue-100
                                   flex items-center justify-center text-xl">

                        ☰

                    </button>


                    <div class="min-w-0 flex-1">

                        <h1 class="text-lg font-bold text-slate-800 truncate">

                            🏥 Clinic System

                        </h1>

                        <p class="text-xs text-slate-500 truncate">

                            Nurse Dashboard

                        </p>

                    </div>

                </div>

            </header>



            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">

                            Nurse Dashboard

                        </h2>

                        <p class="text-sm text-slate-500 mt-1">

                            Welcome back, Nurse. {{ auth()->user()->name }}.

                        </p>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 flex-shrink-0
                                    flex items-center justify-center
                                    rounded-full bg-blue-100
                                    font-bold text-blue-700">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div>

                            <p class="text-sm font-semibold">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-500">

                                Nurse

                            </p>

                        </div>

                    </div>

                </div>

            </header>



            <!-- ================= DASHBOARD CONTENT ================= -->
            <section class="space-y-6 px-4 sm:px-6 lg:px-8
                            py-5 sm:py-6 lg:py-8">


                <!-- ================= WELCOME BANNER ================= -->
                <div class="overflow-hidden rounded-2xl
                            bg-gradient-to-r from-blue-700 to-indigo-600
                            p-6 sm:p-8 text-white shadow-sm">

                    <p class="text-sm font-medium text-blue-100">

                        CLINIC MANAGEMENT SYSTEM

                    </p>

                    <h3 class="mt-2 text-2xl font-bold sm:text-3xl">

                        Good day, Nurse. {{ auth()->user()->name }}!

                    </h3>

                    <p class="mt-3 max-w-2xl text-sm leading-6 text-blue-100">

                        Manage your appointments, review patient information,
                        maintain medical records, and provide prescriptions
                        through your nurse portal.

                    </p>

                    <a href="{{ route('appointments.index') }}"
                       class="mt-5 inline-flex items-center rounded-lg
                              bg-white px-5 py-3 text-sm font-semibold
                              text-blue-700 transition hover:bg-blue-50">

                        View Appointments →

                    </a>

                </div>



                <!-- ================= STATISTICS ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                            xl:grid-cols-3 gap-4 lg:gap-5">


                    <!-- APPOINTMENTS -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">

                                    Appointments

                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    —

                                </p>

                                <p class="text-xs text-slate-500 mt-2">

                                    Appointment overview

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0 bg-blue-100
                                        text-blue-600 rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                📅

                            </div>

                        </div>

                        <a href="{{ route('appointments.index') }}"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-blue-600 hover:text-blue-800">

                            View Appointments →

                        </a>

                    </div>



                    <!-- PATIENTS -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">

                                    Patients

                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    —

                                </p>

                                <p class="text-xs text-slate-500 mt-2">

                                    Patient directory

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0 bg-emerald-100
                                        text-emerald-600 rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                👥

                            </div>

                        </div>

                        <a href="{{ route('patients.index') }}"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-emerald-600 hover:text-emerald-800">

                            View Patients →

                        </a>

                    </div>



                    <!-- MEDICAL RECORDS -->
                    <div class="bg-white rounded-xl p-5 sm:p-6
                                shadow-sm border border-slate-200">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">

                                    Medical Records

                                </p>

                                <p class="text-2xl sm:text-3xl font-bold
                                          text-slate-800 mt-2">

                                    —

                                </p>

                                <p class="text-xs text-slate-500 mt-2">

                                    Clinical documentation

                                </p>

                            </div>

                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0 bg-purple-100
                                        text-purple-600 rounded-xl
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                📋

                            </div>

                        </div>

                        <a href="{{ route('medical_records.index') }}"
                           class="mt-5 inline-block text-sm font-semibold
                                  text-purple-600 hover:text-purple-800">

                            View Records →

                        </a>

                    </div>

                </div>



                <!-- ================= QUICK ACTIONS ================= -->
                <div class="bg-white rounded-xl shadow-sm
                            border border-slate-200 p-5 sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-lg font-semibold text-slate-800">

                            Quick Actions

                        </h3>

                        <p class="text-sm text-slate-500 mt-1">

                            Quickly access your clinic activities.

                        </p>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2
                                xl:grid-cols-3 gap-4">


                        <!-- MANAGE APPOINTMENTS -->
                        <a href="{{ route('appointments.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-blue-300
                                  hover:bg-blue-50">

                            <span class="text-2xl">📅</span>

                            <h4 class="mt-3 font-semibold text-slate-800">

                                Manage Appointments

                            </h4>

                            <p class="mt-1 text-sm text-slate-500">

                                Review and manage clinic appointments.

                            </p>

                        </a>



                        <!-- PATIENT DIRECTORY -->
                        <a href="{{ route('patients.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-emerald-300
                                  hover:bg-emerald-50">

                            <span class="text-2xl">👥</span>

                            <h4 class="mt-3 font-semibold text-slate-800">

                                Patient Directory

                            </h4>

                            <p class="mt-1 text-sm text-slate-500">

                                View registered patient information.

                            </p>

                        </a>



                        <!-- PRESCRIPTIONS -->
                        <a href="{{ route('prescriptions.index') }}"
                           class="rounded-xl border border-slate-200 p-5
                                  transition hover:border-purple-300
                                  hover:bg-purple-50">

                            <span class="text-2xl">💊</span>

                            <h4 class="mt-3 font-semibold text-slate-800">

                                Prescriptions

                            </h4>

                            <p class="mt-1 text-sm text-slate-500">

                                Access the prescription management page.

                            </p>

                        </a>

                    </div>

                </div>



                <!-- ================= FOOTER ================= -->
                <footer class="py-4 text-center text-xs text-slate-500">

                    © {{ date('Y') }} Clinic Management System.
                    Nurse Portal.

                </footer>

            </section>

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


        if (openSidebar) {

            openSidebar.addEventListener('click', showSidebar);

        }


        if (closeSidebar) {

            closeSidebar.addEventListener('click', hideSidebar);

        }


        if (sidebarOverlay) {

            sidebarOverlay.addEventListener('click', hideSidebar);

        }


        // Close sidebar after clicking a navigation link on mobile.
        const sidebarLinks = sidebar.querySelectorAll('nav a');

        sidebarLinks.forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth < 768) {

                    hideSidebar();

                }

            });

        });


        // Reset mobile sidebar state when switching to desktop.
        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                sidebarOverlay.classList.add('hidden');

                document.body.classList.remove('overflow-hidden');

                sidebar.classList.remove('-translate-x-full');

            } else {

                sidebar.classList.add('-translate-x-full');

            }

        });

    </script>

</body>

</html>
