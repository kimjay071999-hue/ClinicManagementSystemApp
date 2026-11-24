
<x-layouts::auth :title="__('Register')">

    <!-- PAGE CONTAINER -->
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-100 p-3 sm:p-5">

        <!-- MAIN REGISTER CARD -->
        <div class="my-auto grid w-full max-w-3xl grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-300/60 lg:grid-cols-12">

            <!-- LEFT PANEL: BRANDING -->
            <div class="relative hidden min-h-[650px] flex-col overflow-hidden bg-gradient-to-b from-blue-600 to-blue-700 p-5 text-white lg:col-span-5 lg:flex">

                <!-- BACKGROUND DECORATIONS -->
                <div class="pointer-events-none absolute -left-12 -top-12 h-36 w-36 rounded-full bg-white/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-10 h-32 w-32 rounded-full bg-blue-400/20 blur-2xl"></div>

                <!-- LOGO: STAYS AT THE TOP -->
                <div class="relative z-10 shrink-0">
                    <img
                        src="{{ asset('img/clinic_logo.png') }}"
                        alt="Clinic Logo"
                        class="h-auto w-full max-w-[125px] object-contain"
                    >
                </div>

                <!-- BRANDING CONTENT: PUSHED TO THE BOTTOM -->
                <div class="relative z-10 mt-auto pt-10">

                    <!-- WELCOME LABEL -->
                    <span class="inline-flex rounded-full bg-white/15 px-2.5 py-1 text-[9px] font-semibold uppercase tracking-wider text-blue-100">
                        Welcome to
                    </span>

                    <!-- SYSTEM NAME -->
                    <h1 class="mt-2 text-xl font-extrabold leading-tight text-white">
                        Clinic Management System
                    </h1>

                    <!-- DESCRIPTION -->
                    <p class="mt-2 text-[11px] leading-relaxed text-blue-100/90">
                        A secure platform designed to simplify patient records and clinic management.
                    </p>

                    <!-- SECURITY INFORMATION -->
                    <div class="mt-5 flex items-start gap-2.5 rounded-xl border border-white/15 bg-white/10 p-2.5">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-4 w-4 shrink-0 text-blue-100"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v4h8z"
                            />
                        </svg>

                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold text-white">
                                Your security matters
                            </p>

                            <p class="mt-1 text-[10px] leading-relaxed text-blue-100/90">
                                Create a strong password to help protect your account and personal information.
                            </p>
                        </div>

                    </div>

                </div>

                <!-- COPYRIGHT: AT THE VERY BOTTOM -->
                <div class="relative z-10 mt-5 shrink-0 border-t border-white/10 pt-3 text-[9px] text-blue-100/80">
                    &copy; {{ date('Y') }} Clinic System. Secure &amp; Reliable.
                </div>

            </div>


            <!-- RIGHT PANEL: REGISTRATION FORM -->
            <div class="min-w-0 bg-white p-4 sm:p-6 lg:col-span-7">

                <!-- FORM HEADER -->
                <div class="mb-4">

                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-blue-600">
                        Patient Registration
                    </span>

                    <h2 class="mt-1 text-xl font-bold tracking-tight text-slate-900">
                        Create an account
                    </h2>

                    <p class="mt-1 text-[11px] leading-relaxed text-slate-500">
                        Enter your personal information to create your account.
                    </p>

                </div>


                <!-- SESSION STATUS -->
                <x-auth-session-status
                    class="mb-3 text-xs"
                    :status="session('status')"
                />


                <!-- GENERAL VALIDATION ERRORS -->
                @if ($errors->any())
                    <div
                        role="alert"
                        aria-live="polite"
                        class="mb-3 space-y-1 rounded-lg border border-red-100 bg-red-50 p-3"
                    >
                        @foreach ($errors->all() as $error)
                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>
                @endif


                <!-- REGISTRATION FORM -->
                <form
                    id="register-form"
                    method="POST"
                    action="{{ route('register.store') }}"
                    class="space-y-3"
                >

                    @csrf

                    <!-- SECTION 1: PERSONAL INFORMATION -->
                    <div class="space-y-2.5">

                        <div class="border-b border-slate-100 pb-1.5">
                            <h3 class="text-[9px] font-bold uppercase tracking-wider text-blue-600">
                                01. Personal Information
                            </h3>
                        </div>


                        <!-- FIRST NAME + LAST NAME -->
                        <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2">

                            <div class="min-w-0 space-y-1">

                                <label for="first_name" class="block text-[11px] font-semibold text-slate-700">
                                    First Name
                                </label>

                                <input
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    value="{{ old('first_name') }}"
                                    required
                                    autofocus
                                    autocomplete="given-name"
                                    maxlength="255"
                                    placeholder="Juan"
                                    class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                >

                                @error('first_name')
                                    <p class="text-[10px] leading-relaxed text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            <div class="min-w-0 space-y-1">

                                <label for="last_name" class="block text-[11px] font-semibold text-slate-700">
                                    Last Name
                                </label>

                                <input
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                    value="{{ old('last_name') }}"
                                    required
                                    autocomplete="family-name"
                                    maxlength="255"
                                    placeholder="Dela Cruz"
                                    class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                >

                                @error('last_name')
                                    <p class="text-[10px] leading-relaxed text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        <!-- DATE OF BIRTH + GENDER -->
                        <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2">

                            <div class="min-w-0 space-y-1">

                                <label for="date_of_birth" class="block text-[11px] font-semibold text-slate-700">
                                    Date of Birth
                                </label>

                                <input
                                    id="date_of_birth"
                                    name="date_of_birth"
                                    type="date"
                                    value="{{ old('date_of_birth') }}"
                                    required
                                    autocomplete="bday"
                                    max="{{ date('Y-m-d') }}"
                                    class="w-full min-w-0 rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                >

                                @error('date_of_birth')
                                    <p class="text-[10px] leading-relaxed text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            <div class="min-w-0 space-y-1">

                                <label for="gender" class="block text-[11px] font-semibold text-slate-700">
                                    Gender
                                </label>

                                <select
                                    id="gender"
                                    name="gender"
                                    required
                                    class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                >
                                    <option value="">Select gender</option>

                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>

                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>

                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>

                                @error('gender')
                                    <p class="text-[10px] leading-relaxed text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        <!-- MOBILE NUMBER -->
                        <div class="space-y-1">

                            <label for="mobile_number" class="block text-[11px] font-semibold text-slate-700">
                                Mobile Number
                            </label>

                            <input
                                id="mobile_number"
                                name="mobile_number"
                                type="tel"
                                value="{{ old('mobile_number') }}"
                                required
                                autocomplete="tel"
                                inputmode="numeric"
                                maxlength="11"
                                minlength="11"
                                pattern="09[0-9]{9}"
                                title="Enter a valid 11-digit Philippine mobile number starting with 09."
                                placeholder="09XXXXXXXXX"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                            >

                            @error('mobile_number')
                                <p class="text-[10px] leading-relaxed text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    <!-- SECTION 2: ACCOUNT INFORMATION -->
                    <div class="space-y-2.5 pt-1">

                        <div class="border-b border-slate-100 pb-1.5">
                            <h3 class="text-[9px] font-bold uppercase tracking-wider text-blue-600">
                                02. Account Information
                            </h3>
                        </div>


                        <!-- EMAIL ADDRESS -->
                        <div class="space-y-1">

                            <label for="email" class="block text-[11px] font-semibold text-slate-700">
                                Email Address
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                maxlength="255"
                                placeholder="email@example.com"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                            >

                            @error('email')
                                <p class="text-[10px] leading-relaxed text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <!-- PASSWORD + CONFIRM PASSWORD -->
                        <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2">

                            <!-- PASSWORD FIELD -->
                            <div class="relative min-w-0 space-y-1">

                                <label for="password" class="block text-[11px] font-semibold text-slate-700">
                                    Password
                                </label>

                                <div class="relative">

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        required
                                        minlength="8"
                                        maxlength="128"
                                        autocomplete="new-password"
                                        placeholder="Create a password"
                                        aria-describedby="weak-password-message"
                                        class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 pr-9 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                    >

                                    <button
                                        type="button"
                                        id="toggle-password"
                                        aria-label="Show password"
                                        aria-controls="password"
                                        aria-pressed="false"
                                        class="absolute inset-y-0 right-0 flex items-center px-2.5 text-slate-400 transition hover:text-blue-600"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12s3.5-7 9.75-7 9.75 7 9.75 7-3.5 7-9.75 7-9.75-7-9.75-7z"
                                            />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>

                                </div>


                                <!-- PASSWORD REQUIREMENTS POPUP -->
                                <div
                                    id="weak-password-message"
                                    class="absolute left-0 top-full z-50 mt-2 hidden w-[min(300px,calc(100vw-40px))] rounded-xl border border-slate-200 bg-white p-3 shadow-xl shadow-slate-900/15 sm:w-[300px]"
                                    role="status"
                                    aria-live="polite"
                                >

                                    <div class="mb-3 flex items-center justify-between gap-2">

                                        <div>
                                            <p class="text-xs font-bold text-slate-800">
                                                Password requirements
                                            </p>

                                            <p class="mt-1 text-[10px] text-slate-500">
                                                Make your password stronger.
                                            </p>
                                        </div>

                                        <span
                                            id="password-strength-badge"
                                            class="shrink-0 rounded-full bg-red-50 px-2 py-1 text-[10px] font-semibold text-red-600"
                                        >
                                            Weak
                                        </span>

                                    </div>


                                    <!-- REQUIREMENTS -->
                                    <div class="space-y-2">

                                        <p id="req-length" class="flex items-center gap-2 text-[11px] text-red-600">
                                            <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-red-50 text-[10px]">○</span>
                                            At least 8 characters
                                        </p>

                                        <p id="req-uppercase" class="flex items-center gap-2 text-[11px] text-red-600">
                                            <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-red-50 text-[10px]">○</span>
                                            One uppercase letter (A–Z)
                                        </p>

                                        <p id="req-lowercase" class="flex items-center gap-2 text-[11px] text-red-600">
                                            <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-red-50 text-[10px]">○</span>
                                            One lowercase letter (a–z)
                                        </p>

                                        <p id="req-number" class="flex items-center gap-2 text-[11px] text-red-600">
                                            <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-red-50 text-[10px]">○</span>
                                            One number (0–9)
                                        </p>

                                        <p id="req-symbol" class="flex items-center gap-2 text-[11px] text-red-600">
                                            <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-red-50 text-[10px]">○</span>
                                            One special character (!@#$%)
                                        </p>

                                    </div>


                                    <!-- STRENGTH BAR -->
                                    <div class="mt-3 border-t border-slate-100 pt-3">

                                        <div class="mb-1.5 flex items-center justify-between">
                                            <span class="text-[10px] font-medium text-slate-500">
                                                Password strength
                                            </span>

                                            <span
                                                id="password-strength-text"
                                                class="text-[10px] font-semibold text-red-600"
                                            >
                                                Weak
                                            </span>
                                        </div>

                                        <div class="h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                            <div
                                                id="password-strength-bar"
                                                class="h-full w-0 rounded-full bg-red-500 transition-all duration-300"
                                            ></div>
                                        </div>

                                    </div>

                                </div>


                                @error('password')
                                    <p class="text-[10px] leading-relaxed text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            <!-- CONFIRM PASSWORD FIELD -->
                            <div class="min-w-0 space-y-1">

                                <label for="password_confirmation" class="block text-[11px] font-semibold text-slate-700">
                                    Confirm Password
                                </label>

                                <div class="relative">

                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        required
                                        minlength="8"
                                        maxlength="128"
                                        autocomplete="new-password"
                                        placeholder="Confirm password"
                                        class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-2.5 py-2 pr-9 text-xs text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                                    >

                                    <button
                                        type="button"
                                        id="toggle-confirm-password"
                                        aria-label="Show confirmation password"
                                        aria-controls="password_confirmation"
                                        aria-pressed="false"
                                        class="absolute inset-y-0 right-0 flex items-center px-2.5 text-slate-400 transition hover:text-blue-600"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12s3.5-7 9.75-7 9.75 7 9.75 7-3.5 7-9.75 7-9.75-7-9.75-7z"
                                            />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>

                                </div>


                                <!-- PASSWORD MATCH MESSAGE -->
                                <p
                                    id="password-match-message"
                                    class="hidden text-[10px]"
                                    aria-live="polite"
                                ></p>

                            </div>

                        </div>

                    </div>


                    <!-- SECURITY NOTE -->
                    <p class="flex items-start gap-2 pt-1 text-[10px] leading-relaxed text-slate-500">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-4 w-4 shrink-0 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3a11.955 11.955 0 01-8.618 2.984A12.001 12.001 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.043-.133-2.055-.382-3.016z"
                            />
                        </svg>

                        <span>
                            Keep your password private. Never share your account credentials with anyone.
                        </span>

                    </p>


                    <!-- CREATE ACCOUNT BUTTON -->
                    <div class="pt-1">

                        <button
                            id="register-submit"
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-xs font-semibold text-white shadow-md shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-blue-600/20"
                            data-test="register-user-button"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 21H6a3 3 0 01-3-3V6a3 3 0 013-3h9a3 3 0 013 3v1"
                                />
                            </svg>

                            <span>Create Account</span>
                        </button>

                    </div>

                </form>


                <!-- LOGIN LINK -->
                <div class="mt-3 border-t border-slate-100 pt-3 text-center">

                    <span class="text-[11px] text-slate-500">
                        Already have an account?
                    </span>

                    <a
                        href="{{ route('login') }}"
                        class="ml-1 text-[11px] font-semibold text-blue-600 transition hover:text-blue-700 hover:underline"
                    >
                        Log in
                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- PASSWORD VALIDATION INTERACTIONS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');

            const weakMessage = document.getElementById('weak-password-message');
            const strengthBadge = document.getElementById('password-strength-badge');
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            const matchMessage = document.getElementById('password-match-message');
            const registerForm = document.getElementById('register-form');

            let passwordFieldFocused = false;

            const requirements = {
                length: {
                    element: document.getElementById('req-length'),
                    test: password => password.length >= 8
                },
                uppercase: {
                    element: document.getElementById('req-uppercase'),
                    test: password => /[A-Z]/.test(password)
                },
                lowercase: {
                    element: document.getElementById('req-lowercase'),
                    test: password => /[a-z]/.test(password)
                },
                number: {
                    element: document.getElementById('req-number'),
                    test: password => /[0-9]/.test(password)
                },
                symbol: {
                    element: document.getElementById('req-symbol'),
                    test: password => /[^A-Za-z0-9]/.test(password)
                }
            };


            // CHECK PASSWORD REQUIREMENTS
            function checkPassword(password) {
                return Object.values(requirements).every(function (requirement) {
                    return requirement.test(password);
                });
            }


            // UPDATE REQUIREMENT CHECKMARKS
            function updateRequirement(requirement, passed) {

                const element = requirement.element;
                const icon = element.querySelector('.requirement-icon');

                if (passed) {

                    element.classList.remove('text-red-600');
                    element.classList.add('text-emerald-600');

                    icon.textContent = '✓';

                    icon.classList.remove('bg-red-50');
                    icon.classList.add('bg-emerald-50');

                } else {

                    element.classList.remove('text-emerald-600');
                    element.classList.add('text-red-600');

                    icon.textContent = '○';

                    icon.classList.remove('bg-emerald-50');
                    icon.classList.add('bg-red-50');

                }

            }


            // UPDATE PASSWORD STRENGTH
            function updatePasswordStrength() {

                const password = passwordInput.value;

                if (password.length === 0) {

                    weakMessage.classList.add('hidden');
                    strengthBar.style.width = '0%';

                    strengthBadge.textContent = 'Weak';
                    strengthBadge.className =
                        'shrink-0 rounded-full bg-red-50 px-2 py-1 text-[10px] font-semibold text-red-600';

                    strengthText.textContent = 'Weak';
                    strengthText.className =
                        'text-[10px] font-semibold text-red-600';

                    strengthBar.className =
                        'h-full rounded-full bg-red-500 transition-all duration-300';

                    Object.values(requirements).forEach(function (requirement) {
                        updateRequirement(requirement, false);
                    });

                    return;

                }

                let passed = 0;

                Object.values(requirements).forEach(function (requirement) {

                    const valid = requirement.test(password);

                    if (valid) {
                        passed++;
                    }

                    updateRequirement(requirement, valid);

                });

                const isStrong = passed === Object.keys(requirements).length;

                let percentage = Math.max(15, (passed / Object.keys(requirements).length) * 100);
                let label = 'Weak';
                let badgeColor = 'bg-red-50 text-red-600';
                let barColor = 'bg-red-500';
                let textColor = 'text-red-600';

                if (passed >= 3 && passed <= 4) {

                    label = 'Almost strong';
                    badgeColor = 'bg-amber-50 text-amber-600';
                    barColor = 'bg-amber-500';
                    textColor = 'text-amber-600';

                }

                if (isStrong) {

                    percentage = 100;
                    label = 'Strong';
                    badgeColor = 'bg-emerald-50 text-emerald-600';
                    barColor = 'bg-emerald-500';
                    textColor = 'text-emerald-600';

                }

                strengthBadge.textContent = label;
                strengthBadge.className =
                    'shrink-0 rounded-full px-2 py-1 text-[10px] font-semibold ' + badgeColor;

                strengthBar.style.width = percentage + '%';
                strengthBar.className =
                    'h-full rounded-full transition-all duration-300 ' + barColor;

                strengthText.textContent = label;
                strengthText.className =
                    'text-[10px] font-semibold ' + textColor;

                if (isStrong) {
                    weakMessage.classList.add('hidden');
                } else if (passwordFieldFocused) {
                    weakMessage.classList.remove('hidden');
                }

            }


            // UPDATE PASSWORD MATCH STATUS
            function updatePasswordMatch() {

                const password = passwordInput.value;
                const confirmation = confirmInput.value;

                if (confirmation.length === 0) {

                    matchMessage.classList.add('hidden');
                    matchMessage.textContent = '';

                    return;

                }

                matchMessage.classList.remove('hidden');

                if (password === confirmation) {

                    matchMessage.textContent = '✓ Passwords match.';
                    matchMessage.className =
                        'text-[10px] font-medium text-emerald-600';

                } else {

                    matchMessage.textContent = 'Passwords do not match.';
                    matchMessage.className =
                        'text-[10px] font-medium text-red-600';

                }

            }


            // SHOW / HIDE PASSWORD
            function setupPasswordToggle(buttonId, input, labels) {

                const button = document.getElementById(buttonId);

                button.addEventListener('click', function () {

                    const showPassword = input.type === 'password';

                    input.type = showPassword ? 'text' : 'password';

                    button.setAttribute('aria-pressed', String(showPassword));

                    button.setAttribute(
                        'aria-label',
                        showPassword ? labels.hide : labels.show
                    );

                });

            }


            // PASSWORD FIELD FOCUS
            passwordInput.addEventListener('focus', function () {

                passwordFieldFocused = true;

                if (
                    passwordInput.value.length > 0 &&
                    !checkPassword(passwordInput.value)
                ) {
                    weakMessage.classList.remove('hidden');
                }

            });


            // HIDE POPUP WHEN LEAVING PASSWORD FIELD
            passwordInput.addEventListener('blur', function () {

                passwordFieldFocused = false;
                weakMessage.classList.add('hidden');

            });


            // UPDATE WHILE TYPING
            passwordInput.addEventListener('input', function () {
                updatePasswordStrength();
                updatePasswordMatch();
            });

            confirmInput.addEventListener('input', updatePasswordMatch);


            // PASSWORD VISIBILITY BUTTONS
            setupPasswordToggle(
                'toggle-password',
                passwordInput,
                {
                    show: 'Show password',
                    hide: 'Hide password'
                }
            );

            setupPasswordToggle(
                'toggle-confirm-password',
                confirmInput,
                {
                    show: 'Show confirmation password',
                    hide: 'Hide confirmation password'
                }
            );


            // INITIAL VALIDATION
            updatePasswordStrength();
            updatePasswordMatch();


            // VALIDATE BEFORE SUBMISSION
            registerForm.addEventListener('submit', function (event) {

                const password = passwordInput.value;
                const confirmation = confirmInput.value;

                if (!checkPassword(password)) {

                    event.preventDefault();

                    passwordFieldFocused = true;

                    weakMessage.classList.remove('hidden');

                    updatePasswordStrength();

                    passwordInput.focus();

                    return;

                }

                if (password !== confirmation) {

                    event.preventDefault();

                    matchMessage.classList.remove('hidden');

                    matchMessage.textContent = 'Passwords do not match.';
                    matchMessage.className =
                        'text-[10px] font-medium text-red-600';

                    confirmInput.focus();

                }

            });

        });
    </script>

</x-layouts::auth>
