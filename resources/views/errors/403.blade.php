<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied | Clinic Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">

    <div class="w-full max-w-lg text-center">

        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="w-24 h-24 rounded-3xl bg-red-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 text-red-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m0 3h.008M10.29 3.86
                        1.82 18a2 2 0 0 0 1.71 3h16.94
                        a2 2 0 0 0 1.71-3L13.71 3.86
                        a2 2 0 0 0-3.42 0Z" />
                </svg>
            </div>
        </div>

        <!-- Error Code -->
        <h1 class="text-8xl font-extrabold text-slate-800 tracking-tight">
            403
        </h1>

        <!-- Heading -->
        <h2 class="mt-4 text-2xl font-bold text-slate-800">
            Access Forbidden
        </h2>

        <!-- Description -->
        <p class="mt-3 text-slate-500 leading-7">
            Sorry! You don't have permission to access this page.
            Please contact your administrator if you believe this is a mistake.
        </p>

        <!-- Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3">

            <button onclick="history.back()"
                class="inline-flex items-center justify-center gap-2
                rounded-xl border border-slate-300 bg-white
                px-6 py-3 font-semibold text-slate-700
                hover:bg-slate-100 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 19l-7-7m0 0 7-7m-7 7h18" />
                </svg>

                Go Back
            </button>

            <a href="{{ url('/') }}"
                class="inline-flex items-center justify-center gap-2
                rounded-xl bg-blue-600 px-6 py-3
                font-semibold text-white shadow-lg shadow-blue-200
                hover:bg-blue-700 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 10.5 12 3l9 7.5M5 9v11h14V9
                        M9 20v-7h6v7" />
                </svg>

                Go to Home
            </a>

        </div>

        <!-- Footer -->
        <div class="mt-12 border-t border-slate-200 pt-6">
            <p class="text-sm font-semibold text-slate-600">
                🏥 Clinic Management System
            </p>

            <p class="mt-1 text-xs text-slate-400">
                Secure access for authorized personnel only.
            </p>
        </div>

    </div>

</body>
</html>
