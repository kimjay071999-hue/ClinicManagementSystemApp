```html
<x-layouts::auth :title="__('Reset password')">

    <!-- PAGE CONTAINER -->
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-100 p-3 sm:p-5">

        <!-- MAIN RESET PASSWORD CARD -->
        <div class="my-auto grid w-full max-w-3xl grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-300/60 lg:grid-cols-12">

            <!-- LEFT PANEL: BRANDING -->
            <div class="relative hidden min-h-[560px] flex-col overflow-hidden bg-gradient-to-b from-blue-600 to-blue-700 p-5 text-white lg:col-span-5 lg:flex">

                <div class="pointer-events-none absolute -left-12 -top-12 h-36 w-36 rounded-full bg-white/10 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-10 h-32 w-32 rounded-full bg-blue-400/20 blur-2xl"></div>

                <!-- CLINIC LOGO -->
                <div class="relative z-10 shrink-0">
                    <img
                        src="{{ asset('img/clinic_logo.png') }}"
                        alt="Clinic Logo"
                        class="h-auto w-full max-w-[125px] object-contain"
                    >
                </div>

                <!-- BRANDING CONTENT -->
                <div class="relative z-10 mt-auto pt-10">

                    <span class="inline-flex rounded-full bg-white/15 px-2.5 py-1 text-[9px] font-semibold uppercase tracking-wider text-blue-100">
                        Welcome to
                    </span>

                    <h1 class="mt-2 text-xl font-extrabold leading-tight text-white">
                        Clinic Management System
                    </h1>

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
                                Protect your account by choosing a strong password and keeping your credentials private.
                            </p>
                        </div>

                    </div>

                </div>

                <!-- COPYRIGHT -->
                <div class="relative z-10 mt-5 shrink-0 border-t border-white/10 pt-3 text-[9px] text-blue-100/80">
                    &copy; {{ date('Y') }} Clinic System. Secure &amp; Reliable.
                </div>

            </div>


            <!-- RIGHT PANEL: RESET PASSWORD FORM -->
            <div class="relative z-10 min-w-0 bg-white p-5 sm:p-7 lg:col-span-7">

                <!-- FORM HEADER -->
                <div class="mb-6">

                    <span class="text-[9px] font-bold uppercase tracking-[0.18em] text-blue-600">
                        Account Security
                    </span>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                        Reset password
                    </h2>

                    <p class="mt-2 text-xs leading-relaxed text-slate-500">
                        Create a new password for your account. Make sure it is strong and easy for you to remember.
                    </p>

                </div>


                <!-- SESSION STATUS -->
                <x-auth-session-status
                    class="mb-4 text-xs"
                    :status="session('status')"
                />


                <!-- VALIDATION ERRORS -->
                @if ($errors->any())
                    <div
                        role="alert"
                        aria-live="polite"
                        class="mb-4 space-y-1 rounded-lg border border-red-100 bg-red-50 p-3"
                    >
                        @foreach ($errors->all() as $error)
                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>
                @endif


                <!-- RESET PASSWORD FORM -->
                <form
                    id="reset-password-form"
                    method="POST"
                    action="{{ route('password.update') }}"
                    class="space-y-4"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="token"
                        value="{{ request()->route('token') }}"
                    >


                    <!-- EMAIL ADDRESS -->
                    <div class="space-y-1.5">

                        <label
                            for="email"
                            class="block text-xs font-semibold text-slate-700"
                        >
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', request('email')) }}"
                            required
                            autofocus
                            autocomplete="email"
                            maxlength="255"
                            placeholder="email@example.com"
                            class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                        >

                        @error('email')
                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- NEW PASSWORD -->
                    <div class="space-y-1.5">

                        <label
                            for="password"
                            class="block text-xs font-semibold text-slate-700"
                        >
                            New Password
                        </label>

                        <!-- PASSWORD INPUT AND FLOATING PANEL CONTAINER -->
                        <div
                            id="password-container"
                            class="relative z-20"
                        >

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                minlength="8"
                                maxlength="128"
                                autocomplete="new-password"
                                placeholder="Enter your new password"
                                aria-describedby="password-help"
                                aria-controls="password-help"
                                aria-expanded="false"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-3 py-2.5 pr-11 text-sm text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                            >

                            <!-- SHOW / HIDE PASSWORD -->
                            <button
                                type="button"
                                id="toggle-password"
                                aria-label="Show password"
                                aria-controls="password"
                                aria-pressed="false"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 transition hover:text-blue-600"
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


                            <!-- FLOATING PASSWORD REQUIREMENTS -->
                            <div
                                id="password-help"
                                aria-live="polite"
                                class="absolute left-0 right-0 top-full z-50 mt-2 hidden rounded-xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-900/15"
                            >

                                <!-- PANEL HEADER -->
                                <div class="mb-3 flex items-center justify-between gap-2">

                                    <p class="text-xs font-bold text-slate-800">
                                        Password requirements
                                    </p>

                                    <span class="rounded-full bg-blue-50 px-2 py-1 text-[9px] font-semibold text-blue-600">
                                        Security check
                                    </span>

                                </div>


                                <!-- PASSWORD REQUIREMENTS -->
                                <div class="space-y-2">

                                    <p
                                        id="req-length"
                                        class="flex items-center gap-2 text-[11px] text-slate-500"
                                    >
                                        <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px]">○</span>
                                        At least 8 characters
                                    </p>

                                    <p
                                        id="req-uppercase"
                                        class="flex items-center gap-2 text-[11px] text-slate-500"
                                    >
                                        <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px]">○</span>
                                        One uppercase letter (A–Z)
                                    </p>

                                    <p
                                        id="req-lowercase"
                                        class="flex items-center gap-2 text-[11px] text-slate-500"
                                    >
                                        <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px]">○</span>
                                        One lowercase letter (a–z)
                                    </p>

                                    <p
                                        id="req-number"
                                        class="flex items-center gap-2 text-[11px] text-slate-500"
                                    >
                                        <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px]">○</span>
                                        One number (0–9)
                                    </p>

                                    <p
                                        id="req-symbol"
                                        class="flex items-center gap-2 text-[11px] text-slate-500"
                                    >
                                        <span class="requirement-icon flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-slate-200 text-[10px]">○</span>
                                        One special character (!@#$%)
                                    </p>

                                </div>


                                <!-- PASSWORD STRENGTH -->
                                <div class="mt-4 border-t border-slate-100 pt-3">

                                    <div class="mb-2 flex items-center justify-between">

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

                                    <div
                                        id="password-strength-progress"
                                        role="progressbar"
                                        aria-label="Password strength"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                        aria-valuenow="0"
                                        class="h-1.5 w-full overflow-hidden rounded-full bg-slate-200"
                                    >
                                        <div
                                            id="password-strength-bar"
                                            class="h-full w-0 rounded-full bg-red-500 transition-all duration-300"
                                        ></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        @error('password')
                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <!-- CONFIRM PASSWORD -->
                    <div class="space-y-1.5">

                        <label
                            for="password_confirmation"
                            class="block text-xs font-semibold text-slate-700"
                        >
                            Confirm New Password
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
                                placeholder="Re-enter your new password"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50/50 px-3 py-2.5 pr-11 text-sm text-slate-800 placeholder-slate-400 transition focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                            >

                            <!-- SHOW / HIDE CONFIRM PASSWORD -->
                            <button
                                type="button"
                                id="toggle-confirm-password"
                                aria-label="Show confirmation password"
                                aria-controls="password_confirmation"
                                aria-pressed="false"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 transition hover:text-blue-600"
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


                        <!-- PASSWORD MATCH STATUS -->
                        <p
                            id="password-match-message"
                            class="hidden text-[11px]"
                            aria-live="polite"
                        ></p>

                    </div>


                    <!-- SECURITY NOTE -->
                    <div class="flex items-start gap-2 rounded-lg border border-slate-100 bg-slate-50 p-3">

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

                        <p class="text-[10px] leading-relaxed text-slate-500">
                            Choose a unique password and never share it with anyone.
                        </p>

                    </div>


                    <!-- RESET PASSWORD BUTTON -->
                    <button
                        id="reset-password-button"
                        type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-md shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-blue-600/20"
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
                                d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75m-1.5 0h12a2.25 2.25 0 012.25 2.25v6A2.25 2.25 0 0118 21H6a2.25 2.25 0 01-2.25-2.25v-6A2.25 2.25 0 016 10.5z"
                            />
                        </svg>

                        <span>Reset Password</span>

                    </button>

                </form>


                <!-- BACK TO LOGIN -->
                <div class="mt-5 border-t border-slate-100 pt-4 text-center">

                    <span class="text-xs text-slate-500">
                        Remember your password?
                    </span>

                    <a
                        href="{{ route('login') }}"
                        class="ml-1 text-xs font-semibold text-blue-600 transition hover:text-blue-700 hover:underline"
                    >
                        Back to Login
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

            const passwordContainer = document.getElementById('password-container');
            const passwordHelp = document.getElementById('password-help');

            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            const strengthProgress = document.getElementById('password-strength-progress');

            const matchMessage = document.getElementById('password-match-message');
            const resetForm = document.getElementById('reset-password-form');

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


            // SHOW THE PANEL ONLY WHEN THE PASSWORD HAS TEXT
            function showPasswordHelp() {

                if (passwordInput.value.length === 0) {
                    hidePasswordHelp();
                    return;
                }

                passwordHelp.classList.remove('hidden');
                passwordInput.setAttribute('aria-expanded', 'true');

            }


            // HIDE THE PANEL
            function hidePasswordHelp() {

                passwordHelp.classList.add('hidden');
                passwordInput.setAttribute('aria-expanded', 'false');

            }


            // CHECK WHETHER ALL REQUIREMENTS ARE MET
            function checkPassword(password) {

                return Object.values(requirements).every(function (requirement) {
                    return requirement.test(password);
                });

            }


            // UPDATE REQUIREMENT CHECKMARKS
            function updateRequirement(requirement, passed) {

                const element = requirement.element;
                const icon = element.querySelector('.requirement-icon');

                element.classList.toggle('text-emerald-600', passed);
                element.classList.toggle('text-slate-500', !passed);

                icon.textContent = passed ? '✓' : '○';

                icon.classList.toggle('bg-emerald-100', passed);
                icon.classList.toggle('bg-slate-200', !passed);
                icon.classList.toggle('text-emerald-700', passed);

            }


            // UPDATE PASSWORD STRENGTH
            function updatePasswordStrength() {

                const password = passwordInput.value;

                let passed = 0;

                Object.values(requirements).forEach(function (requirement) {

                    const valid = requirement.test(password);

                    if (valid) {
                        passed++;
                    }

                    updateRequirement(requirement, valid);

                });

                let percentage = 0;
                let label = 'Weak';
                let barColor = 'bg-red-500';
                let textColor = 'text-red-600';

                if (password.length > 0) {

                    percentage = Math.max(15, (passed / 5) * 100);

                    if (passed <= 2) {

                        label = 'Weak';
                        barColor = 'bg-red-500';
                        textColor = 'text-red-600';

                    } else if (passed === 3) {

                        label = 'Medium';
                        barColor = 'bg-amber-500';
                        textColor = 'text-amber-600';

                    } else if (passed === 4) {

                        label = 'Strong';
                        barColor = 'bg-blue-500';
                        textColor = 'text-blue-600';

                    } else {

                        label = 'Very Strong';
                        barColor = 'bg-emerald-500';
                        textColor = 'text-emerald-600';

                    }

                }

                strengthBar.style.width = percentage + '%';

                strengthBar.className =
                    'h-full rounded-full transition-all duration-300 ' + barColor;

                strengthText.textContent = label;

                strengthText.className =
                    'text-[10px] font-semibold ' + textColor;

                strengthProgress.setAttribute(
                    'aria-valuenow',
                    String(percentage)
                );

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
                        'text-[11px] font-medium text-emerald-600';

                } else {

                    matchMessage.textContent = 'Passwords do not match.';

                    matchMessage.className =
                        'text-[11px] font-medium text-red-600';

                }

            }


            // SHOW / HIDE PASSWORD
            function setupPasswordToggle(buttonId, input, labels) {

                const button = document.getElementById(buttonId);

                button.addEventListener('click', function () {

                    const showPassword = input.type === 'password';

                    input.type = showPassword ? 'text' : 'password';

                    button.setAttribute(
                        'aria-pressed',
                        String(showPassword)
                    );

                    button.setAttribute(
                        'aria-label',
                        showPassword ? labels.hide : labels.show
                    );

                });

            }


            // UPDATE REQUIREMENTS WHILE TYPING
            passwordInput.addEventListener('input', function () {

                updatePasswordStrength();
                updatePasswordMatch();

                if (passwordInput.value.length > 0) {
                    showPasswordHelp();
                } else {
                    hidePasswordHelp();
                }

            });


            // SHOW PANEL WHEN PASSWORD FIELD RECEIVES FOCUS
            passwordInput.addEventListener('focus', function () {

                if (passwordInput.value.length > 0) {
                    showPasswordHelp();
                }

            });


            // HIDE PANEL WHEN CLICKING OUTSIDE THE PASSWORD AREA
            document.addEventListener('click', function (event) {

                if (!passwordContainer.contains(event.target)) {
                    hidePasswordHelp();
                }

            });


            // HIDE PANEL WHEN MOVING TO ANOTHER FIELD USING THE KEYBOARD
            passwordInput.addEventListener('blur', function () {

                // Delay allows a click on the floating panel to complete.
                setTimeout(function () {

                    if (
                        !passwordContainer.contains(document.activeElement) &&
                        !passwordInput.matches(':focus')
                    ) {
                        hidePasswordHelp();
                    }

                }, 150);

            });


            // UPDATE MATCH STATUS WHEN CONFIRMATION CHANGES
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


            // INITIAL STATE
            hidePasswordHelp();
            updatePasswordStrength();
            updatePasswordMatch();


            // VALIDATE BEFORE SUBMITTING
            resetForm.addEventListener('submit', function (event) {

                const password = passwordInput.value;
                const confirmation = confirmInput.value;

                if (!checkPassword(password)) {

                    event.preventDefault();

                    showPasswordHelp();
                    updatePasswordStrength();

                    passwordInput.focus();

                    return;

                }

                if (password !== confirmation) {

                    event.preventDefault();

                    matchMessage.classList.remove('hidden');

                    matchMessage.textContent = 'Passwords do not match.';

                    matchMessage.className =
                        'text-[11px] font-medium text-red-600';

                    confirmInput.focus();

                }

            });

        });
    </script>

</x-layouts::auth>
```