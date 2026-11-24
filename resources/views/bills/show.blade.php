<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bill Details - Clinic Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- ================= HEADER ================= -->
    <header class="bg-white border-b border-slate-200">

        <div class="max-w-5xl mx-auto px-6 py-5">

            <h1 class="text-2xl font-bold text-slate-800">
                Clinic Management System
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Billing Management
            </p>

        </div>

    </header>


    <!-- ================= MAIN CONTENT ================= -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- Back -->
        <a
            href="{{ route('bills.index') }}"
            class="inline-flex items-center text-sm text-slate-600 hover:text-blue-600 mb-6"
        >
            ← Back to Billing
        </a>


        <!-- ================= BILL HEADER ================= -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                <!-- Bill Information -->
                <div class="flex items-center gap-4">

                    <!-- Icon -->
                    <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-2xl">
                        💰
                    </div>


                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            Bill #{{ str_pad($bill->id, 4, '0', STR_PAD_LEFT) }}
                        </h2>

                        @if($bill->patient)

                            <p class="text-sm text-slate-500 mt-1">
                                {{ $bill->patient->first_name }}
                                {{ $bill->patient->last_name }}
                            </p>

                            <p class="text-xs text-slate-400">
                                Patient ID: {{ $bill->patient->patient_id }}
                            </p>

                        @else

                            <p class="text-sm text-slate-400 mt-1">
                                No patient assigned
                            </p>

                        @endif

                    </div>

                </div>


                <!-- Status -->
                <div>

                    @if($bill->status === 'Paid')

                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-green-100 text-green-700">
                            Paid
                        </span>

                    @elseif($bill->status === 'Cancelled')

                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-red-100 text-red-700">
                            Cancelled
                        </span>

                    @else

                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                            Pending
                        </span>

                    @endif

                </div>

            </div>

        </div>


        <!-- ================= BILL INFORMATION ================= -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Section Header -->
            <div class="px-6 py-5 border-b border-slate-200">

                <h2 class="text-lg font-semibold text-slate-800">
                    Bill Information
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Complete billing details
                </p>

            </div>


            <!-- Information -->
            <div class="p-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">


                    <!-- Patient -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Patient
                        </p>

                        <p class="font-medium text-slate-800 mt-1">

                            @if($bill->patient)

                                {{ $bill->patient->first_name }}
                                {{ $bill->patient->last_name }}

                            @else

                                <span class="text-slate-400">
                                    No patient assigned
                                </span>

                            @endif

                        </p>

                    </div>


                    <!-- Patient ID -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Patient ID
                        </p>

                        <p class="font-medium text-slate-800 mt-1">

                            @if($bill->patient)

                                {{ $bill->patient->patient_id }}

                            @else

                                <span class="text-slate-400">
                                    —
                                </span>

                            @endif

                        </p>

                    </div>


                    <!-- Appointment -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Appointment
                        </p>

                        <p class="font-medium text-slate-800 mt-1">

                            @if($bill->appointment)

                                Appointment #{{ $bill->appointment->id }}

                            @else

                                <span class="text-slate-400">
                                    No Appointment
                                </span>

                            @endif

                        </p>

                    </div>


                    <!-- Medical Record -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Medical Record
                        </p>

                        <p class="font-medium text-slate-800 mt-1">

                            @if($bill->medicalRecord)

                                Record #{{ $bill->medicalRecord->id }}

                            @else

                                <span class="text-slate-400">
                                    No Medical Record
                                </span>

                            @endif

                        </p>

                    </div>


                    <!-- Description -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Description
                        </p>

                        <p class="font-medium text-slate-800 mt-1">
                            {{ $bill->description }}
                        </p>

                    </div>


                    <!-- Amount -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Amount
                        </p>

                        <p class="text-xl font-bold text-blue-600 mt-1">
                            ₱{{ number_format($bill->amount, 2) }}
                        </p>

                    </div>


                    <!-- Status -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Payment Status
                        </p>

                        <div class="mt-1">

                            @if($bill->status === 'Paid')

                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Paid
                                </span>

                            @elseif($bill->status === 'Cancelled')

                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                    Cancelled
                                </span>

                            @else

                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- Payment Date -->
                    <div>

                        <p class="text-sm text-slate-500">
                            Payment Date
                        </p>

                        <p class="font-medium text-slate-800 mt-1">

                            @if($bill->payment_date)

                                {{ \Carbon\Carbon::parse($bill->payment_date)->format('F d, Y') }}

                            @else

                                <span class="text-slate-400">
                                    Not yet paid
                                </span>

                            @endif

                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= BUTTONS ================= -->
        <div class="flex flex-col sm:flex-row justify-between gap-3 mt-6">

            <!-- Back -->
            <a
                href="{{ route('bills.index') }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 font-medium hover:bg-slate-50"
            >
                ← Back to Billing
            </a>


            <!-- Edit -->
            <a
                href="{{ route('bills.edit', $bill->id) }}"
                class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700"
            >
                Edit Bill
            </a>

        </div>

    </main>

</body>

</html>