<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings | Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="flex min-h-screen">

        <!-- MOBILE OVERLAY -->
        <div id="sidebarOverlay"
            class="fixed inset-0 z-40 hidden bg-slate-900/50 lg:hidden"
            onclick="closeSidebar()">
        </div>

        <!-- SIDEBAR -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r border-slate-200 bg-white transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">

            <!-- LOGO -->
            <div class="flex h-20 items-center gap-3 border-b border-slate-100 px-6">
                <img src="{{ asset('img/clinic_logo.png') }}"
                    alt="Clinic Logo"
                    class="h-11 w-11 rounded-xl object-contain"
                    onerror="this.style.display='none'">

                <div>
                    <h1 class="text-base font-bold text-slate-800">
                        Clinic System
                    </h1>

                    <p class="text-xs text-slate-500">
                        Management Portal
                    </p>
                </div>

                <button type="button"
                    onclick="closeSidebar()"
                    class="ml-auto text-slate-500 hover:text-slate-800 lg:hidden"
                    aria-label="Close sidebar">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-5">

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Main Menu
                </p>

                @if (auth()->user()->role === 'admin')

                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                        Dashboard
                    </a>

                @elseif (auth()->user()->role === 'doctor')

                    <a href="{{ route('doctor.dashboard') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                        Dashboard
                    </a>

                @elseif (auth()->user()->role === 'nurse')

                    <a href="{{ route('nurse.dashboard') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                        Dashboard
                    </a>

                @elseif (auth()->user()->role === 'cashier')

                    <a href="{{ route('cashier.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                        Dashboard
                    </a>

                @endif

                @if (in_array(auth()->user()->role, ['admin', 'doctor', 'nurse']))

                    <a href="{{ route('patients.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-hospital-user w-5 text-center"></i>
                        Patients
                    </a>

                    <a href="{{ route('appointments.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-calendar-check w-5 text-center"></i>
                        Appointments
                    </a>

                    <a href="{{ route('medical_records.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-file-medical w-5 text-center"></i>
                        Medical Records
                    </a>

                    <a href="{{ route('prescriptions.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-prescription-bottle-medical w-5 text-center"></i>
                        Prescriptions
                    </a>

                @endif

                @if (auth()->user()->role === 'admin')

                    <a href="{{ route('doctors.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-user-doctor w-5 text-center"></i>
                        Doctors
                    </a>

                    <a href="{{ route('nurses.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-user-nurse w-5 text-center"></i>
                        Nurses
                    </a>

                @endif

                @if (in_array(auth()->user()->role, ['admin', 'cashier']))

                    <a href="{{ route('bills.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-file-invoice-dollar w-5 text-center"></i>
                        Bills
                    </a>

                @endif

                @if (auth()->user()->role === 'cashier')

                    <a href="{{ route('cashier.history') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-blue-600">
                        <i class="fa-solid fa-clock-rotate-left w-5 text-center"></i>
                        Payment History
                    </a>

                @endif

                <div class="my-5 border-t border-slate-100"></div>

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Preferences
                </p>

                <a href="{{ route('settings.index') }}"
                    class="flex items-center gap-3 rounded-xl bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700">
                    <i class="fa-solid fa-gear w-5 text-center"></i>
                    Settings
                    <span class="ml-auto h-2 w-2 rounded-full bg-blue-600"></span>
                </a>

            </nav>

            <!-- USER / LOGOUT -->
            <div class="border-t border-slate-100 p-4">

                <div class="mb-3 flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-slate-800">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="truncate text-xs capitalize text-slate-500">
                            {{ auth()->user()->role }}
                        </p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50">
                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                        Logout
                    </button>
                </form>

            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="min-w-0 flex-1">

            <!-- TOP HEADER -->
            <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6 lg:px-8">

                <div class="flex items-center gap-3">

                    <button type="button"
                        onclick="openSidebar()"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 lg:hidden"
                        aria-label="Open sidebar">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div>
                        <h2 class="text-lg font-bold text-slate-800 sm:text-xl">
                            Settings
                        </h2>

                        <p class="hidden text-sm text-slate-500 sm:block">
                            Manage your account and security preferences.
                        </p>
                    </div>

                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-blue-600">
                    <i class="fa-solid fa-gear"></i>
                </div>

            </header>

            <!-- PAGE BODY -->
            <div class="mx-auto max-w-6xl space-y-6 p-4 sm:p-6 lg:p-8">

                <!-- PAGE INTRO -->
                <div>
                    <p class="text-sm font-medium text-blue-600">
                        ACCOUNT PREFERENCES
                    </p>

                    <h1 class="mt-1 text-2xl font-bold text-slate-800 sm:text-3xl">
                        Account Settings
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Update your profile information and keep your account secure.
                    </p>
                </div>

                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800">
                        <i class="fa-solid fa-circle-check mt-0.5"></i>

                        <p class="text-sm font-medium">
                            {{ session('success') }}
                        </p>
                    </div>
                @endif

                <!-- GENERAL VALIDATION ERRORS -->
                @if ($errors->any())
                    <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                        <div class="flex items-center gap-2 font-semibold">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Please check the following:
                        </div>

                        <ul class="mt-2 list-inside list-disc space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- PROFILE INFORMATION -->
                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex items-center gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <i class="fa-solid fa-user-pen text-lg"></i>
                        </div>

                        <div>
                            <h2 class="font-bold text-slate-800">
                                Profile Information
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Update your account name and email address.
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('settings.profile.update') }}"
                        method="POST"
                        class="space-y-5 p-5 sm:p-7">

                        @csrf
                        @method('PUT')

                        <!-- NAME -->
                        <div>
                            <label for="name"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Full Name
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                                <input type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    required
                                    maxlength="255"
                                    autocomplete="name"
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Enter your full name">
                            </div>

                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Email Address
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                                <input type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    required
                                    maxlength="255"
                                    autocomplete="email"
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Enter your email address">
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-500">
                                Changing your email may require verification again.
                            </p>
                        </div>

                        <!-- SAVE PROFILE -->
                        <div class="flex justify-end border-t border-slate-100 pt-5">
                            <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200">
                                <i class="fa-solid fa-floppy-disk"></i>
                                Save Changes
                            </button>
                        </div>

                    </form>
                </section>

                <!-- CHANGE PASSWORD -->
                <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex items-center gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-shield-halved text-lg"></i>
                        </div>

                        <div>
                            <h2 class="font-bold text-slate-800">
                                Change Password
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Use your current password to set a new one.
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('settings.password.update') }}"
                        method="POST"
                        class="space-y-5 p-5 sm:p-7">

                        @csrf
                        @method('PUT')

                        <!-- CURRENT PASSWORD -->
                        <div>
                            <label for="current_password"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Current Password
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                                <input type="password"
                                    id="current_password"
                                    name="current_password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Enter current password">
                            </div>

                            @error('current_password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NEW PASSWORD -->
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                New Password
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-key absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                                <input type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Enter new password">
                            </div>

                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs text-slate-500">
                                Your new password must contain at least 8 characters.
                            </p>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div>
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Confirm New Password
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-check-double absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                                <input type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="w-full rounded-xl border border-slate-300 bg-white py-3 pl-11 pr-4 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Confirm new password">
                            </div>
                        </div>

                        <!-- SAVE PASSWORD -->
                        <div class="flex justify-end border-t border-slate-100 pt-5">
                            <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-slate-800 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-300">
                                <i class="fa-solid fa-shield-halved"></i>
                                Update Password
                            </button>
                        </div>

                    </form>
                </section>

                <!-- SECURITY NOTE -->
                <div class="flex items-start gap-3 rounded-2xl border border-blue-100 bg-blue-50 p-5">
                    <i class="fa-solid fa-circle-info mt-0.5 text-blue-600"></i>

                    <div>
                        <h3 class="text-sm font-semibold text-blue-900">
                            Keep Your Account Secure
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-blue-800">
                            Never share your password with other people. Use a strong,
                            unique password to protect your Clinic Management System account.
                        </p>
                    </div>
                </div>

                <!-- FOOTER -->
                <footer class="py-3 text-center text-xs text-slate-400">
                    &copy; {{ date('Y') }} Clinic Management System. All rights reserved.
                </footer>

            </div>
        </main>

    </div>

    <!-- SIDEBAR SCRIPT -->
    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024) {
                document.getElementById('sidebarOverlay').classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            } else {
                document.getElementById('sidebar').classList.add('-translate-x-full');
            }
        });
    </script>

</body>
</html>