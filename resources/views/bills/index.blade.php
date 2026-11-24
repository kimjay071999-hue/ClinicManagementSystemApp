<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Billing - Clinic Management System</title>

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

            <!-- ================= LOGO ================= -->
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

                    <!-- Mobile Close -->
                    <button id="closeSidebar"
                            type="button"
                            class="md:hidden text-slate-500
                                   hover:text-slate-800 text-2xl">

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


                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        🏠
                    </span>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>


                <!-- Patients -->
                <a href="{{ route('patients.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        👥
                    </span>

                    <span class="font-medium">
                        Patients
                    </span>

                </a>


                <!-- Doctors -->
                <a href="{{ url('/doctors') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        👨‍⚕️
                    </span>

                    <span class="font-medium">
                        Doctors
                    </span>

                </a>


                <!-- Appointments -->
                <a href="{{ route('appointments.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        📅
                    </span>

                    <span class="font-medium">
                        Appointments
                    </span>

                </a>


                <!-- Medical Records -->
                <a href="{{ route('medical_records.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        🗂️
                    </span>

                    <span class="font-medium">
                        Medical Records
                    </span>

                </a>


                <!-- Prescriptions -->
                <a href="{{ route('prescriptions.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-blue-50
                          hover:text-blue-600 transition mb-1">

                    <span class="text-lg">
                        💊
                    </span>

                    <span class="font-medium">
                        Prescriptions
                    </span>

                </a>


                <!-- Billing Active -->
                <a href="{{ route('bills.index') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-50 text-blue-600 transition mb-1">

                    <span class="text-lg">
                        💰
                    </span>

                    <span class="font-medium">
                        Billing
                    </span>

                </a>


                <!-- Divider -->
                <div class="border-t border-slate-200 my-5"></div>


                <!-- Patient Section -->
                <p class="text-xs font-semibold text-slate-400 uppercase
                          px-3 mb-3">

                    Patient

                </p>


                <!-- Add Patient -->
                <a href="{{ route('patients.create') }}"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          bg-blue-600 text-white hover:bg-blue-700
                          transition shadow-sm">

                    <span class="text-lg">
                        ➕
                    </span>

                    <span class="font-medium">
                        Add Patient
                    </span>

                </a>

            </nav>


            <!-- ================= SIDEBAR BOTTOM ================= -->
            <div class="px-3 sm:px-4 py-4 border-t border-slate-200">

                <!-- Settings -->
                <a href="#"
                   class="flex items-center gap-3 px-3 py-3 rounded-lg
                          text-slate-600 hover:bg-slate-100 transition">

                    <span class="text-lg">
                        ⚙️
                    </span>

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
                                type="button"
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
                                Billing Management
                            </p>

                        </div>

                    </div>


                    <!-- Add Bill -->
                    <a href="{{ route('bills.create') }}"
                       class="flex-shrink-0
                              bg-blue-600 hover:bg-blue-700
                              text-white px-3 py-2
                              rounded-lg text-sm font-medium">

                        + Add

                    </a>

                </div>

            </header>


            <!-- ================= DESKTOP HEADER ================= -->
            <header class="hidden md:block bg-white border-b border-slate-200
                           px-6 lg:px-8 py-5">

                <div class="flex items-center justify-between gap-5">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            Billing
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Manage patient bills and payments
                        </p>

                    </div>


                    <!-- Desktop Add Bill -->
                    <a href="{{ route('bills.create') }}"
                       class="inline-flex items-center gap-2
                              px-4 py-2.5 rounded-lg
                              bg-blue-600 text-white
                              text-sm font-medium
                              hover:bg-blue-700 transition">

                        <span>
                            +
                        </span>

                        Add Bill

                    </a>

                </div>

            </header>


            <!-- ================= PAGE CONTENT ================= -->
            <div class="px-4 sm:px-6 lg:px-8 py-5 sm:py-6 lg:py-8">


                <!-- ================= STATS ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2
                            lg:grid-cols-4 gap-4 lg:gap-5 mb-6 lg:mb-8">


                    <!-- Total Bills -->
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5 sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Bills
                                </p>

                                <p class="text-2xl sm:text-3xl
                                          font-bold text-slate-800 mt-2">

                                    {{ $bills->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        rounded-xl
                                        bg-blue-100 text-blue-600
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                💰

                            </div>

                        </div>

                    </div>


                    <!-- Pending -->
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5 sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Pending
                                </p>

                                <p class="text-2xl sm:text-3xl
                                          font-bold text-yellow-600 mt-2">

                                    {{ $bills->where('status', 'Pending')->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        rounded-xl
                                        bg-yellow-100 text-yellow-600
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                ⏳

                            </div>

                        </div>

                    </div>


                    <!-- Paid -->
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5 sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Paid
                                </p>

                                <p class="text-2xl sm:text-3xl
                                          font-bold text-green-600 mt-2">

                                    {{ $bills->where('status', 'Paid')->count() }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        rounded-xl
                                        bg-green-100 text-green-600
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                ✓

                            </div>

                        </div>

                    </div>


                    <!-- Total Amount -->
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5 sm:p-6">

                        <div class="flex items-center justify-between gap-4">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Total Amount
                                </p>

                                <p class="text-2xl sm:text-3xl
                                          font-bold text-blue-600 mt-2">

                                    ₱{{ number_format($bills->sum('amount'), 2) }}

                                </p>

                            </div>


                            <div class="w-11 h-11 sm:w-12 sm:h-12
                                        flex-shrink-0
                                        rounded-xl
                                        bg-blue-100 text-blue-600
                                        flex items-center justify-center
                                        text-xl sm:text-2xl">

                                💵

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================= SUCCESS MESSAGE ================= -->
                @if(session('success'))

                    <div class="mb-6 px-4 py-3 rounded-lg
                                bg-green-50 border border-green-200
                                text-green-700">

                        {{ session('success') }}

                    </div>

                @endif


                <!-- ================= TABLE CARD ================= -->
                <div class="bg-white rounded-xl
                            border border-slate-200
                            shadow-sm overflow-hidden">


                    <!-- Card Header -->
                    <div class="px-4 sm:px-6 py-5
                                border-b border-slate-200">

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center sm:justify-between
                                    gap-4">

                            <div>

                                <h2 class="text-lg font-semibold text-slate-800">
                                    Billing Records
                                </h2>

                                <p class="text-sm text-slate-500 mt-1">
                                    List of all patient bills
                                </p>

                            </div>


                            <!-- Search -->
                            <div class="w-full sm:w-64">

                                <input
                                    type="text"
                                    placeholder="Search bills..."
                                    class="w-full rounded-lg
                                           border border-slate-300
                                           px-4 py-2.5 text-sm
                                           focus:border-blue-500
                                           focus:ring-blue-500"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- ================= TABLE ================= -->
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[1100px]">

                            <thead class="bg-slate-50 border-b border-slate-200">

                                <tr>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Bill ID

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Patient

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Description

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Amount

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Status

                                    </th>

                                    <th class="px-6 py-4 text-left
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Payment Date

                                    </th>

                                    <th class="px-6 py-4 text-right
                                               text-xs font-semibold
                                               text-slate-500 uppercase">

                                        Actions

                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-200">

                                @forelse($bills as $bill)

                                    <tr class="hover:bg-slate-50 transition">


                                        <!-- Bill ID -->
                                        <td class="px-6 py-4">

                                            <span class="font-semibold text-slate-800">

                                                BILL-{{ str_pad($bill->id, 4, '0', STR_PAD_LEFT) }}

                                            </span>

                                        </td>


                                        <!-- Patient -->
                                        <td class="px-6 py-4">

                                            @if($bill->patient)

                                                <div class="flex items-center gap-3">

                                                    <div class="w-10 h-10 rounded-full
                                                                bg-blue-100 text-blue-600
                                                                flex items-center
                                                                justify-center
                                                                font-semibold">

                                                        {{ strtoupper(substr($bill->patient->first_name, 0, 1)) }}

                                                    </div>


                                                    <div>

                                                        <p class="font-medium text-slate-800">

                                                            {{ $bill->patient->first_name }}
                                                            {{ $bill->patient->last_name }}

                                                        </p>

                                                        <p class="text-xs text-slate-500">

                                                            {{ $bill->patient->patient_id }}

                                                        </p>

                                                    </div>

                                                </div>

                                            @else

                                                <span class="text-slate-400">
                                                    No Patient
                                                </span>

                                            @endif

                                        </td>


                                        <!-- Description -->
                                        <td class="px-6 py-4
                                                   text-sm text-slate-700">

                                            {{ $bill->description }}

                                        </td>


                                        <!-- Amount -->
                                        <td class="px-6 py-4">

                                            <span class="font-semibold text-slate-800">

                                                ₱{{ number_format($bill->amount, 2) }}

                                            </span>

                                        </td>


                                        <!-- Status -->
                                        <td class="px-6 py-4">

                                            @if($bill->status === 'Paid')

                                                <span class="inline-flex items-center
                                                             px-2.5 py-1 rounded-full
                                                             text-xs font-medium
                                                             bg-green-100 text-green-700">

                                                    Paid

                                                </span>

                                            @elseif($bill->status === 'Cancelled')

                                                <span class="inline-flex items-center
                                                             px-2.5 py-1 rounded-full
                                                             text-xs font-medium
                                                             bg-red-100 text-red-700">

                                                    Cancelled

                                                </span>

                                            @else

                                                <span class="inline-flex items-center
                                                             px-2.5 py-1 rounded-full
                                                             text-xs font-medium
                                                             bg-yellow-100 text-yellow-700">

                                                    Pending

                                                </span>

                                            @endif

                                        </td>


                                        <!-- Payment Date -->
                                        <td class="px-6 py-4 text-sm text-slate-600">

                                            @if($bill->payment_date)

                                                {{ \Carbon\Carbon::parse($bill->payment_date)->format('M d, Y') }}

                                            @else

                                                <span class="text-slate-400">
                                                    —
                                                </span>

                                            @endif

                                        </td>


                                        <!-- Actions -->
                                        <td class="px-6 py-4">

                                            <div class="flex items-center
                                                        justify-end gap-2">

                                                <!-- View -->
                                                <a href="{{ route('bills.show', $bill->id) }}"
                                                   class="px-3 py-1.5 rounded-lg
                                                          bg-blue-50 text-blue-600
                                                          text-sm font-medium
                                                          hover:bg-blue-100">

                                                    View

                                                </a>


                                                <!-- Edit -->
                                                <a href="{{ route('bills.edit', $bill->id) }}"
                                                   class="px-3 py-1.5 rounded-lg
                                                          bg-slate-100 text-slate-700
                                                          text-sm font-medium
                                                          hover:bg-slate-200">

                                                    Edit

                                                </a>


                                                <!-- Delete -->
                                                <form action="{{ route('bills.destroy', $bill->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this bill?');">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="px-3 py-1.5 rounded-lg
                                                                   bg-red-50 text-red-600
                                                                   text-sm font-medium
                                                                   hover:bg-red-100">

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

                                            <div class="flex flex-col items-center">

                                                <div class="w-16 h-16 rounded-full
                                                            bg-slate-100
                                                            flex items-center
                                                            justify-center
                                                            text-3xl mb-4">

                                                    💰

                                                </div>


                                                <h3 class="text-lg font-semibold
                                                           text-slate-800">

                                                    No bills found

                                                </h3>


                                                <p class="text-sm text-slate-500 mt-1">

                                                    There are no billing records yet.

                                                </p>


                                                <a href="{{ route('bills.create') }}"
                                                   class="mt-4 inline-flex
                                                          items-center
                                                          px-4 py-2 rounded-lg
                                                          bg-blue-600 text-white
                                                          text-sm font-medium
                                                          hover:bg-blue-700">

                                                    + Add Bill

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <!-- Mobile Hint -->
                    @if($bills->count() > 0)

                        <div class="px-6 py-3 bg-slate-50
                                    border-t border-slate-200 md:hidden">

                            <p class="text-xs text-slate-500 text-center">

                                Swipe left or right to view the full table.

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


        // Close sidebar when clicking navigation links on mobile
        const sidebarLinks = sidebar.querySelectorAll('a');

        sidebarLinks.forEach(link => {

            link.addEventListener('click', () => {

                if (window.innerWidth < 768) {

                    hideSidebar();

                }

            });

        });


        // Reset mobile sidebar on desktop
        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                sidebarOverlay.classList.add('hidden');

                document.body.classList.remove('overflow-hidden');

            }

        });

    </script>

</body>

</html>