<x-layouts::auth :title="__('Log in')">

    <!-- PAGE CONTAINER -->
    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-slate-100 p-4 sm:p-6">

        <!-- MAIN LOGIN CARD -->
        <div class="my-auto grid w-full max-w-3xl grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-300/60 md:grid-cols-12">

            <!-- ========================================= -->
            <!-- LEFT PANEL: BRANDING                     -->
            <!-- ========================================= -->

            <div class="relative flex flex-col justify-between overflow-hidden bg-gradient-to-b from-blue-600 to-blue-700 p-8 text-white md:col-span-5">

                <!-- Decorative Circles -->
                <div class="pointer-events-none absolute -left-12 -top-12 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>

                <div class="pointer-events-none absolute -bottom-12 -right-12 h-40 w-40 rounded-full bg-blue-400/20 blur-2xl"></div>

                <!-- Branding Content -->
                <div class="relative z-10">

                    <!-- Logo -->
                    <div class="flex items-center">
                        <img
                            src="{{ asset('img/undraw_doctor.png') }}"
                            alt="Clinic System Logo"
                            class="h-auto w-full max-w-[220px] object-contain"
                        >
                    </div>

                    <!-- Welcome Message -->
                    <div class="space-y-2 pt-8">

                        <span class="inline-block rounded-full bg-white/15 px-3 py-1 text-[10px] font-semibold uppercase tracking-wider text-blue-100">
                            Welcome Back
                        </span>

                        <h2 class="text-2xl font-extrabold leading-tight text-white">
                            Manage your clinic easily.
                        </h2>

                        <p class="pt-1 text-xs leading-relaxed text-blue-100/90">
                            A secure, cloud-based platform for modern healthcare record management.
                        </p>

                    </div>

                </div>

                <!-- Branding Footer -->
                <div class="relative z-10 mt-8 flex items-center justify-between border-t border-white/10 pt-6 text-[11px] text-blue-100/80">

                    <span>
                        © {{ date('Y') }} Clinic System
                    </span>

                    <span class="flex items-center gap-1.5 font-medium text-emerald-300">
                        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-emerald-400"></span>
                        Online
                    </span>

                </div>

            </div>


            <!-- ========================================= -->
            <!-- RIGHT PANEL: LOGIN FORM                  -->
            <!-- ========================================= -->

            <div class="bg-white p-8 sm:p-10 md:col-span-7">

                <!-- Form Header -->
                <div class="mb-6">

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Sign in
                    </h1>

                    <p class="mt-1 text-xs text-slate-500">
                        Enter your login details below to proceed.
                    </p>

                </div>


                <!-- ========================================= -->
                <!-- SUCCESS MESSAGE                          -->
                <!-- ========================================= -->

                <x-auth-session-status
                    class="mb-4 text-xs"
                    :status="session('status')"
                />


                <!-- ========================================= -->
                <!-- LOGIN VALIDATION: TEXT ONLY              -->
                <!-- ========================================= -->

                @if ($errors->any())

                    <div
                        role="alert"
                        aria-live="polite"
                        class="mb-4"
                    >

                        @foreach ($errors->all() as $error)

                            <p class="text-xs font-medium leading-relaxed text-red-600">
                                {{ $error }}
                            </p>

                        @endforeach

                    </div>

                @endif


                <!-- ========================================= -->
                <!-- LOGIN FORM                               -->
                <!-- ========================================= -->

                <form
                    method="POST"
                    action="{{ route('login.store') }}"
                    class="space-y-4"
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
                            placeholder="johndoe@gmail.com"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-800  placeholder-slate-400 transition-all focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                        >

                    </div>


                    <!-- PASSWORD -->
                    <div class="space-y-1.5">

                        <div class="flex items-center justify-between gap-3">

                            <label
                                for="password"
                                class="block text-xs font-semibold text-slate-700"
                            >
                                Password
                            </label>

                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-xs font-semibold text-blue-600 transition hover:text-blue-700 hover:underline"
                                >
                                    Forgot password?
                                </a>

                            @endif

                        </div>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="password"
                            class="w-full rounded-xl border border-slate-300 bg-slate-50/50 px-3.5 py-2.5 text-xs text-slate-800 placeholder-slate-400 transition-all focus:border-blue-600 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600/20"
                        >

                    </div>


                    <!-- REMEMBER ME -->
                    <div class="flex items-center gap-2 pt-1">

                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        >

                        <label
                            for="remember"
                            class="cursor-pointer text-xs text-slate-600"
                        >
                            Remember me
                        </label>

                    </div>


                    <!-- SIGN IN BUTTON -->
                    <div class="pt-2">

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-md shadow-blue-600/20 transition-all hover:bg-blue-700 active:scale-[0.99] focus:outline-none focus:ring-4 focus:ring-blue-600/20"
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
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                />
                            </svg>

                            <span>
                                Sign in to account
                            </span>

                        </button>

                    </div>

                </form>


                <!-- ========================================= -->
                <!-- REGISTER LINK                            -->
                <!-- ========================================= -->

                <div class="mt-8 flex items-center justify-between gap-3 border-t border-slate-100 pt-4 text-xs">

                    <span class="text-slate-500">
                        Don't have an account?
                    </span>

                    <a
                        href="{{ route('register') }}"
                        class="font-semibold text-blue-600 transition hover:text-blue-700 hover:underline"
                    >
                        Create account
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layouts::auth>