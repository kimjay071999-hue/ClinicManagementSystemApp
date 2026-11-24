<x-layouts::app :title="__('Message Us')">

    <div class="min-h-screen bg-slate-50 p-4 sm:p-6 lg:p-8">

        <!-- ================= HEADER ================= -->
        <div class="mx-auto mb-8 max-w-5xl">

            <a
                href="{{ route('patients.my-history') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 transition hover:text-blue-800"
            >
                <!-- <span aria-hidden="true">←</span> -->
                Back to My History
            </a>

            <div class="mt-6">

                <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-700">
                    <span>💬</span>
                    CLINIC SUPPORT
                </div>

                <h1 class="text-3xl font-bold tracking-tight text-slate-800 sm:text-4xl">
                    Message Us
                </h1>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                    Have a question or concern? Send a message to our clinic
                    team. We're here to help you.
                </p>

            </div>

        </div>


        <!-- ================= MESSAGE CARD ================= -->
        <div class="mx-auto max-w-5xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="grid grid-cols-1 lg:grid-cols-5">

                <!-- ================= LEFT INFORMATION PANEL ================= -->
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-7 text-white sm:p-9 lg:col-span-2">

                    <!-- Decorative circles -->
                    <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-white/10"></div>

                    <div class="pointer-events-none absolute -bottom-16 -left-12 h-48 w-48 rounded-full bg-white/5"></div>


                    <div class="relative">

                        <!-- Icon -->
                        <!-- <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-2xl shadow-sm">
                            💬
                        </div> -->

                        <h2 class="mt-7 text-2xl font-bold">
                            <!-- How can we help? -->
                        </h2>

                        <!-- <p class="mt-3 text-sm leading-7 text-blue-100">
                            If you have questions about your appointment,
                            medical records, prescriptions, billing, or other
                            clinic concerns, send us a message.
                        </p> -->


                        <!-- Support Information -->
                        <div class="mt-8 space-y-6">

                            <!-- Email -->
                            <div class="flex items-start gap-4">

                                <!-- <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10 text-lg">
                                    ✉️
                                </div> -->

                                <!-- <div>
                                    <p class="text-xs font-medium uppercase tracking-wider text-blue-200">
                                        Email Support
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-white">
                                        Clinic Support Team
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-blue-100">
                                        Send your concerns directly to the clinic.
                                    </p>
                                </div> -->

                            </div>


                            <!-- Response Time -->
                            <!-- <div class="flex items-start gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10 text-lg">
                                    🕐
                                </div>

                                <div>
                                    <p class="text-xs font-medium uppercase tracking-wider text-blue-200">
                                        Response Time
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-white">
                                        During Clinic Hours
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-blue-100">
                                        Our team will review your message and respond when available.
                                    </p>
                                </div>

                            </div> -->


                            <!-- Privacy -->
                            <!-- <div class="flex items-start gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white/10 text-lg">
                                    🔒
                                </div>

                                <div>
                                    <p class="text-xs font-medium uppercase tracking-wider text-blue-200">
                                        Your Privacy
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-white">
                                        Patient Confidentiality
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-blue-100">
                                        Please avoid including passwords or unnecessary sensitive information.
                                    </p>
                                </div>

                            </div> -->

                        </div>

                    </div>

                </div>


                <!-- ================= RIGHT FORM PANEL ================= -->
                <div class="p-6 sm:p-9 lg:col-span-3">

                    <!-- Success Message -->
                    @if (session('success'))

                        <div
                            role="status"
                            class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4"
                        >

                            <div class="flex items-start gap-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-lg font-bold text-emerald-700">
                                    ✓
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-emerald-800">
                                        Message Sent Successfully
                                    </p>

                                    <p class="mt-1 text-sm leading-6 text-emerald-700">
                                        {{ session('success') }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    @endif


                    <!-- General Error Message -->
                    @if (session('error'))

                        <div
                            role="alert"
                            class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4"
                        >

                            <p class="text-sm font-semibold text-red-800">
                                Unable to Send Message
                            </p>

                            <p class="mt-1 text-sm leading-6 text-red-700">
                                {{ session('error') }}
                            </p>

                        </div>

                    @endif


                    <!-- Form Heading -->
                    <div class="mb-7">

                        <h2 class="text-xl font-bold text-slate-800 sm:text-2xl">
                            Send us a message
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            Fill out the form below, and our clinic team will receive your concern.
                        </p>

                    </div>


                    <!-- ================= FORM ================= -->
                    <form
                        action="{{ route('patients.send-message') }}"
                        method="POST"
                        class="space-y-6"
                    >

                        @csrf


                        <!-- Your Email -->
                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Your Email
                            </label>

                            <div class="relative">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    ✉️
                                </div>

                                <input
                                    id="email"
                                    type="email"
                                    value="{{ auth()->user()->email }}"
                                    readonly
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm text-slate-500 outline-none"
                                >

                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                This email address comes from your logged-in account.
                            </p>

                        </div>


                        <!-- Subject -->
                        <div>

                            <label
                                for="subject"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Subject
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="subject"
                                type="text"
                                name="subject"
                                value="{{ old('subject') }}"
                                required
                                maxlength="255"
                                placeholder="e.g. Appointment inquiry"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                            >

                            @error('subject')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        <!-- Message -->
                        <div>

                            <label
                                for="message"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Your Message
                                <span class="text-red-500">*</span>
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="7"
                                required
                                maxlength="5000"
                                placeholder="Describe your question or concern here..."
                                class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm leading-7 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                            >{{ old('message') }}</textarea>

                            @error('message')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs leading-5 text-slate-400">
                                Maximum of 5,000 characters. Please do not include your password.
                            </p>

                        </div>


                        <!-- Submit Button -->
                        <div class="border-t border-slate-100 pt-5">

                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 disabled:cursor-not-allowed sm:w-auto"
                            >
                                <span>✈️</span>
                                <span>Send Message</span>
                            </button>

                            <p class="mt-3 text-xs leading-5 text-slate-400">
                                Please review your message before sending.
                            </p>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- Footer -->
        <div class="mx-auto mt-6 max-w-5xl text-center">

            <p class="text-xs text-slate-400">
                Clinic Management System · Patient Support
            </p>

        </div>

    </div>

</x-layouts::app>