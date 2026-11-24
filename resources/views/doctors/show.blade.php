<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Details - Clinic Management System</title>

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


                <!-- Doctors - ACTIVE -->
                <a href="{{ route('doctors.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>
                    <span class="font-medium">Doctors</span>

                </a>


                <!-- Appointments -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

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
                    Doctor
                </p>


                <!-- Add Doctor -->
                <a href="{{ route('doctors.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm">

                    <span class="text-lg">➕</span>
                    <span class="font-medium">Add Doctor</span>

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



        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 min-w-0 w-full">


            <!-- ================= MOBILE HEADER ================= -->
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
                                Doctor Management
                            </p>

                        </div>

                    </div>

                </div>

            </header>



            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Doctor Details
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        View information about this doctor.
                    </p>

                </div>

            </header>



            <!-- ================= CONTENT ================= -->
            <div class="px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">


                <!-- Back -->
                <div class="mb-6">

                    <a href="{{ route('doctors.index') }}"
                       class="inline-flex items-center gap-2
                              text-sm font-medium text-slate-600
                              hover:text-blue-600 transition">

                        ← Back to Doctors

                    </a>

                </div>


                <!-- Doctor Profile -->
                <div class="bg-white rounded-xl shadow-sm
                            border border-slate-200 overflow-hidden">


                    <!-- Profile Header -->
                    <div class="px-6 py-7 bg-gradient-to-r
                                from-blue-50 to-indigo-50
                                border-b border-slate-200">

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center gap-5">

                            <!-- Avatar -->
                            <div class="w-20 h-20 rounded-full
                                        bg-blue-100 text-blue-700
                                        flex items-center justify-center
                                        text-3xl font-bold">

                                {{ strtoupper(substr($doctor->first_name, 0, 1)) }}

                            </div>


                            <div>

                                <h3 class="text-2xl font-bold text-slate-800">

                                    Dr.
                                    {{ $doctor->first_name }}
                                    {{ $doctor->last_name }}

                                </h3>

                                <p class="text-slate-600 mt-1">

                                    {{ $doctor->specialization }}

                                </p>

                                <span class="inline-block mt-3
                                             px-3 py-1 rounded-full
                                             text-xs font-medium
                                             bg-blue-100 text-blue-700">

                                    {{ $doctor->doctor_id }}

                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- Information -->
                    <div class="p-6">

                        <h4 class="text-lg font-semibold text-slate-800 mb-5">
                            Doctor Information
                        </h4>


                        <div class="grid grid-cols-1 md:grid-cols-2
                                    gap-5">


                            <!-- First Name -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    First Name
                                </p>

                                <p class="mt-1 text-slate-800 font-medium">
                                    {{ $doctor->first_name }}
                                </p>

                            </div>


                            <!-- Last Name -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Last Name
                                </p>

                                <p class="mt-1 text-slate-800 font-medium">
                                    {{ $doctor->last_name }}
                                </p>

                            </div>


                            <!-- Specialization -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Specialization
                                </p>

                                <p class="mt-1 text-slate-800 font-medium">
                                    {{ $doctor->specialization }}
                                </p>

                            </div>


                            <!-- Mobile -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Mobile Number
                                </p>

                                <p class="mt-1 text-slate-800 font-medium">
                                    {{ $doctor->mobile_number ?? 'Not provided' }}
                                </p>

                            </div>


                            <!-- Email -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Email Address
                                </p>

                                <p class="mt-1 text-slate-800 font-medium break-words">
                                    {{ $doctor->email }}
                                </p>

                            </div>


                            <!-- Doctor ID -->
                            <div>

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Doctor ID
                                </p>

                                <p class="mt-1 text-blue-600 font-mono font-medium">
                                    {{ $doctor->doctor_id }}
                                </p>

                            </div>


                            <!-- Address -->
                            <div class="md:col-span-2">

                                <p class="text-xs font-semibold
                                          text-slate-400 uppercase">
                                    Address
                                </p>

                                <p class="mt-1 text-slate-800 font-medium">
                                    {{ $doctor->address ?? 'Not provided' }}
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- Actions -->
                    <div class="px-6 py-5 bg-slate-50
                                border-t border-slate-200">

                        <div class="flex flex-col sm:flex-row
                                    gap-3">

                            <!-- Edit -->
                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                               class="inline-flex justify-center
                                      items-center
                                      bg-blue-600 hover:bg-blue-700
                                      text-white px-5 py-2.5
                                      rounded-lg font-medium
                                      transition">

                                ✏️ Edit Doctor

                            </a>


                            <!-- Delete -->
                            <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this doctor?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="w-full sm:w-auto
                                               inline-flex justify-center
                                               items-center
                                               bg-red-50 hover:bg-red-100
                                               text-red-600 px-5 py-2.5
                                               rounded-lg font-medium
                                               transition">

                                    🗑️ Delete Doctor

                                </button>

                            </form>

                        </div>

                    </div>

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


        // Close sidebar when clicking navigation links on mobile
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