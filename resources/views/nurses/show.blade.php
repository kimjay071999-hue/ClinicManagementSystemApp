<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Details - Clinic Management System</title>

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
                        Nurse Management
                    </p>
                </div>

            </header>


            <!-- Desktop Header -->
            <header class="hidden h-20 items-center border-b border-slate-200 bg-white px-8 md:flex">

                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        Clinic Management System
                    </h1>

                    <p class="text-sm text-slate-500">
                        Nurse Management
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


                    <!-- Nurse Header Card -->
                    <div class="mb-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                        <div class="flex flex-col gap-5 p-6 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-center gap-4">

                                <!-- Avatar -->
                                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-blue-100 text-2xl font-bold text-blue-600">

                                    {{ strtoupper(substr($nurse->first_name, 0, 1)) }}

                                </div>


                                <!-- Name -->
                                <div>

                                    <h2 class="text-xl font-bold text-slate-800">

                                        {{ $nurse->first_name }}
                                        {{ $nurse->last_name }}

                                    </h2>

                                    <p class="mt-1 text-sm text-slate-500">

                                        Nurse ID:
                                        <span class="font-semibold text-blue-600">
                                            {{ $nurse->nurse_id }}
                                        </span>

                                    </p>

                                </div>

                            </div>


                            <!-- Status + Edit -->
                            <div class="flex flex-wrap items-center gap-3">

                                @if($nurse->status === 'Active')

                                    <span class="rounded-full bg-green-100 px-3 py-1.5 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                        Inactive
                                    </span>

                                @endif


                                <a
                                    href="{{ route('nurses.edit', $nurse->id) }}"
                                    class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                                    Edit Nurse

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Information Card -->
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

                        <!-- Section Header -->
                        <div class="border-b border-slate-200 px-6 py-5">

                            <h3 class="text-lg font-semibold text-slate-800">
                                Nurse Information
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Complete information about this nurse.
                            </p>

                        </div>


                        <!-- Information -->
                        <div class="p-6">

                            <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">


                                <!-- First Name -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        First Name
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->first_name }}
                                    </p>

                                </div>


                                <!-- Last Name -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Last Name
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->last_name }}
                                    </p>

                                </div>


                                <!-- Nurse ID -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Nurse ID
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-blue-600">
                                        {{ $nurse->nurse_id }}
                                    </p>

                                </div>


                                <!-- Specialization -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Specialization
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->specialization ?? '—' }}
                                    </p>

                                </div>


                                <!-- Mobile -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Mobile Number
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->mobile_number ?? '—' }}
                                    </p>

                                </div>


                                <!-- Email -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Email
                                    </p>

                                    <p class="mt-1 break-all text-sm font-medium text-slate-800">
                                        {{ $nurse->email }}
                                    </p>

                                </div>


                                <!-- Status -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Status
                                    </p>

                                    @if($nurse->status === 'Active')

                                        <span class="mt-1 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="mt-1 inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                            Inactive
                                        </span>

                                    @endif

                                </div>


                                <!-- Address -->
                                <div class="md:col-span-2">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Address
                                    </p>

                                    <p class="mt-1 whitespace-pre-line text-sm font-medium text-slate-800">
                                        {{ $nurse->address ?? '—' }}
                                    </p>

                                </div>


                                <!-- Created -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Date Registered
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->created_at?->format('M d, Y') ?? '—' }}
                                    </p>

                                </div>


                                <!-- Updated -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Last Updated
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-slate-800">
                                        {{ $nurse->updated_at?->format('M d, Y') ?? '—' }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Bottom Buttons -->
                    <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">

                        <a
                            href="{{ route('nurses.index') }}"
                            class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-semibold text-slate-600 transition hover:bg-white">

                            ← Back to Nurses

                        </a>


                        <a
                            href="{{ route('nurses.edit', $nurse->id) }}"
                            class="rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">

                            Edit Nurse

                        </a>

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