<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Doctor - Clinic Management System</title>

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
                <a href="#"
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


                <!-- Doctors - ACTIVE -->
                <a href="{{ route('doctors.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">👨‍⚕️</span>

                    <span class="font-medium">
                        Doctors
                    </span>

                </a>


                <!-- Appointments -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">📅</span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>


                <!-- Prescriptions -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">💊</span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

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

                    <span class="font-medium">
                        Add Doctor
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
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-red-500 hover:bg-red-50 transition">

                    <span class="text-lg">🚪</span>

                    <span class="font-medium">
                        Logout
                    </span>

                </a>

            </div>

        </aside>



        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 min-w-0 w-full">


            <!-- ================= MOBILE HEADER ================= -->
            <header class="md:hidden bg-white border-b border-slate-200
                           px-4 py-4 sticky top-0 z-30">

                <div class="flex items-center gap-3">

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
                            Doctor Management
                        </p>

                    </div>

                </div>

            </header>



            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b
                           border-slate-200 px-6 lg:px-8 py-5">

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Edit Doctor
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Update doctor information.
                    </p>

                </div>

            </header>



            <!-- ================= CONTENT ================= -->
            <div class="max-w-4xl mx-auto px-6 py-8">

                <!-- Back Button -->
                <div class="mb-6">

                    <a
                        href="{{ route('doctors.index') }}"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium"
                    >
                        ← Back to Doctors
                    </a>

                </div>


                <!-- Form Card -->
                <div class="bg-white rounded-xl shadow-sm
                            border border-slate-200">


                    <!-- Card Header -->
                    <div class="px-6 py-5 border-b border-slate-200">

                        <h2 class="text-xl font-semibold text-slate-800">
                            Edit Doctor
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Update the doctor's information below.
                        </p>

                    </div>


                    <!-- Form -->
                    <form
                        action="{{ route('doctors.update', $doctor->id) }}"
                        method="POST"
                        class="p-6"
                    >

                        @csrf
                        @method('PUT')


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            <!-- First Name -->
                            <div>

                                <label
                                    for="first_name"
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    First Name
                                </label>

                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ old('first_name', $doctor->first_name) }}"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
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
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Last Name
                                </label>

                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ old('last_name', $doctor->last_name) }}"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
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
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Specialization
                                </label>

                                <select
                                    id="specialization"
                                    name="specialization"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           bg-white
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
                                    required
                                >

                                    <option value="">
                                        Select Specialization
                                    </option>

                                    <option value="General Medicine"
                                        {{ old('specialization', $doctor->specialization) == 'General Medicine' ? 'selected' : '' }}>
                                        General Medicine
                                    </option>

                                    <option value="Pediatrics"
                                        {{ old('specialization', $doctor->specialization) == 'Pediatrics' ? 'selected' : '' }}>
                                        Pediatrics
                                    </option>

                                    <option value="Internal Medicine"
                                        {{ old('specialization', $doctor->specialization) == 'Internal Medicine' ? 'selected' : '' }}>
                                        Internal Medicine
                                    </option>

                                    <option value="Family Medicine"
                                        {{ old('specialization', $doctor->specialization) == 'Family Medicine' ? 'selected' : '' }}>
                                        Family Medicine
                                    </option>

                                    <option value="Dentistry"
                                        {{ old('specialization', $doctor->specialization) == 'Dentistry' ? 'selected' : '' }}>
                                        Dentistry
                                    </option>

                                    <option value="Dermatology"
                                        {{ old('specialization', $doctor->specialization) == 'Dermatology' ? 'selected' : '' }}>
                                        Dermatology
                                    </option>

                                    <option value="Cardiology"
                                        {{ old('specialization', $doctor->specialization) == 'Cardiology' ? 'selected' : '' }}>
                                        Cardiology
                                    </option>

                                    <option value="Other"
                                        {{ old('specialization', $doctor->specialization) == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>

                                </select>

                                @error('specialization')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            <!-- Doctor ID -->
                            <div>

                                <label
                                    for="doctor_id"
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Doctor ID
                                </label>

                                <input
                                    type="text"
                                    id="doctor_id"
                                    value="{{ $doctor->doctor_id }}"
                                    class="w-full rounded-lg border
                                           border-slate-300
                                           bg-slate-100
                                           px-4 py-2.5
                                           text-slate-500"
                                    readonly
                                >

                                <p class="text-xs text-slate-400 mt-1">
                                    Doctor ID cannot be changed.
                                </p>

                            </div>


                            <!-- Mobile Number -->
                            <div>

                                <label
                                    for="mobile_number"
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Mobile Number
                                </label>

                                <input
                                    type="text"
                                    id="mobile_number"
                                    name="mobile_number"
                                    value="{{ old('mobile_number', $doctor->mobile_number) }}"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
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
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Email
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $doctor->email) }}"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
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
                                    class="block text-sm font-medium
                                           text-slate-700 mb-2"
                                >
                                    Address
                                </label>

                                <textarea
                                    id="address"
                                    name="address"
                                    rows="4"
                                    class="w-full rounded-lg border
                                           border-slate-300 px-4 py-2.5
                                           focus:border-blue-500
                                           focus:ring-2 focus:ring-blue-200
                                           outline-none"
                                >{{ old('address', $doctor->address) }}</textarea>

                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 mt-8 pt-6
                                    border-t border-slate-200">

                            <a
                                href="{{ route('doctors.index') }}"
                                class="px-5 py-2.5 rounded-lg
                                       border border-slate-300
                                       text-slate-700 font-medium
                                       hover:bg-slate-50"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-lg
                                       bg-blue-600 text-white
                                       font-medium hover:bg-blue-700"
                            >
                                Update Doctor
                            </button>

                        </div>

                    </form>

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