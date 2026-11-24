```html
<x-layouts::auth :title="__('Forgot password')">

    <!-- PAGE CONTAINER -->
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-100 p-4 sm:p-6">

        <!-- MAIN FORGOT PASSWORD CARD -->
        <div class="my-auto grid w-full max-w-3xl grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-300/60 md:grid-cols-12">


            <!-- ========================================= -->
            <!-- LEFT PANEL: BRANDING                     -->
            <!-- ========================================= -->

            <div class="relative flex flex-col justify-between overflow-hidden bg-gradient-to-b from-blue-600 to-blue-700 p-6 text-white sm:p-8 md:col-span-5">

                <!-- DECORATIVE CIRCLES -->
                <div class="pointer-events-none absolute -left-12 -top-12 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>

                <div class="pointer-events-none absolute -bottom-12 -right-12 h-40 w-40 rounded-full bg-blue-400/20 blur-2xl"></div>


                <!-- BRANDING CONTENT -->
                <div class="relative z-10">

                    <!-- LOGO / ILLUSTRATION -->
                    <div class="flex items-center">

                        <img
                            src="{{ asset('img/undraw_doctor.png') }}"
                            alt="Clinic System Logo"
                            class="h-auto w-full max-w-[220px] object-contain"
                        >

                    </div>


                    <!-- WELCOME MESSAGE -->
                    <div class="space-y-2 pt-6 sm:pt-8">

                        <span class="inline-block rounded-full bg-white/15 px-3 py-1 text-[10px] font-semibold uppercase tracking-wider text-blue-100">
                            Account Recovery
                        </span>

                        <h1 class="text-2xl font-extrabold leading-tight text-white">
                            Forgot your password?
                        </h1>

                        <p class="pt-1 text-xs leading-relaxed text-blue-100/90">
                            Don't worry. We'll help you regain access to your Clinic Management System account.
                        </p>

                    </div>


                    <!-- SECURITY INFORMATION -->
                    <div class="mt-6 flex items-start gap-3 rounded-xl border border-white/15 bg-white/10 p-3">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 h-5 w-5 shrink-0 text-blue-100"
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

                            <p class="text-xs font-semibold text-white">
                                Your security matters
                            </p>

                            <p class="mt-1 text-[11px] leading-relaxed text-blue-100/90">
                                Only use your registered email address to request a password reset link.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- BRANDING FOOTER -->
                <div class="relative z-10 mt-8 flex items-center justify-between border-t border-white/10 pt-5 text-[11px] text-blue-100/80">

                    <span>
                        &copy; {{ date('Y') }} Clinic System
                    </span>

                    <span class="flex items-center gap-1.5 font-medium text-emerald-300">

                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-400"></span>

                        Secure Access

                    </span>

                </div>

            </div>



            <!-- ========================================= -->
            <!-- RIGHT PANEL: FORGOT PASSWORD FORM        -->
            <!-- ========================================= -->

            <div class="min-w-0 bg-white p-6 sm:p-8 md:col-span-7 lg:p-10">

                <!-- FORM HEADER -->
                <div class="mb-6">

                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-blue-600">
                        Account Security
                    </span>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                        Forgot password
                    </h2>

                    <p class="mt-2 text-xs leading-relaxed text-slate-500">
                        Enter the email address associated with your account. If the address is eligible, we'll send you a password reset link.
                    </p>

                </div>



                <!-- ========================================= -->
                <!-- SESSION STATUS                           -->
                <!-- ========================================= -->

                <x-auth-session-status
                    class="mb-4 text-xs"
                    :status="session('status')"
                />



                <!-- ========================================= -->
                <!-- VALIDATION ERRORS                        -->
                <!-- ========================================= -->

                @if ($errors->any())

                    <div
                        role="alert"
                        aria-live="polite"
                        class="mb-5 space-y-1 rounded-xl border border-red-100 bg-red-50 p-3"
                    >

                        @foreach ($errors->all() as $error)

                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $error }}
                            </p>

                        @endforeach

                    </div>

                @endif



                <!-- ========================================= -->
                <!-- FORGOT PASSWORD FORM                    -->
                <!-- ========================================= -->

                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                    class="space-y-5"
                >

                    @csrf


                    <!-- EMAIL ADDRESS -->
                    <div class="space-y-1.5">

                        <label
                            for="email"
                            class="block text-xs font-semibold text-slate-700"
                        >
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="email"
                            maxlength="255"
                            placeholder="johndoe@gmail.com"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-3 text-xs text-slate-800 placeholder-slate-400 transition-all focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                        >

                        @error('email')

                            <p class="text-xs leading-relaxed text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    <!-- INFORMATION NOTE -->
                    <div class="flex items-start gap-2.5 rounded-xl border border-blue-100 bg-blue-50/70 p-3">

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
                                d="M11.25 11.25l.041-.02a.75.75 0 011.06.852l-.708 2.826a.75.75 0 001.06.852l.041-.02M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-4.5h.008v.008H12V7.5z"
                            />
                        </svg>

                        <p class="text-[11px] leading-relaxed text-slate-600">
                            Check your inbox after submitting. If you don't receive the email, verify your email address and check your spam folder.
                        </p>

                    </div>



                    <!-- SEND RESET LINK BUTTON -->
                    <div class="pt-1">

                        <button
                            type="submit"
                            data-test="email-password-reset-link-button"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-md shadow-blue-600/20 transition-all hover:bg-blue-700 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-blue-600/20"
                        >

                            <!-- EMAIL ICON -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="2"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m3 7 9 6 9-6"
                                />
                            </svg>

                            <span>
                                Email password reset link
                            </span>

                        </button>

                    </div>

                </form>



                <!-- ========================================= -->
                <!-- BACK TO LOGIN                            -->
                <!-- ========================================= -->

                <div class="mt-8 border-t border-slate-100 pt-5 text-center">

                    <span class="text-xs text-slate-500">
                        Remember your password?
                    </span>

                    <a
                        href="{{ route('login') }}"
                        class="ml-1 inline-flex items-center gap-1 text-xs font-semibold text-blue-600 transition hover:text-blue-700 hover:underline"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-3.5 w-3.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 19l-7-7 7-7M3 12h18"
                            />
                        </svg>

                        Back to Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layouts::auth>
```