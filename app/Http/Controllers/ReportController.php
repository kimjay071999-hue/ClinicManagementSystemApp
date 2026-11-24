<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Admin Reports
     */
    public function admin(Request $request)
    {
        // ========================================
        // DATE FILTER
        // ========================================

        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date',
            ],
        ]);

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;

        // ========================================
        // APPOINTMENT REPORTS
        // ========================================

        $appointmentsQuery = Appointment::query();

        if ($startDate) {
            $appointmentsQuery->whereDate(
                'appointment_date',
                '>=',
                $startDate
            );
        }

        if ($endDate) {
            $appointmentsQuery->whereDate(
                'appointment_date',
                '<=',
                $endDate
            );
        }

        $appointments = (clone $appointmentsQuery)
            ->with(['patient', 'doctor'])
            ->orderByDesc('appointment_date')
            ->get();

        $totalAppointments = (clone $appointmentsQuery)->count();

        // Appointment status summary
        $appointmentStatuses = (clone $appointmentsQuery)
            ->selectRaw("
                COALESCE(status, 'Unspecified') as status_label,
                COUNT(*) as total
            ")
            ->groupBy('status_label')
            ->pluck('total', 'status_label');

        // Chart 1: Appointment Status
        $appointmentStatusChart = $appointmentStatuses;

        // Chart 2: Monthly Appointment Trends
        $monthlyAppointments = (clone $appointmentsQuery)
            ->whereNotNull('appointment_date')
            ->selectRaw("
                YEAR(appointment_date) as report_year,
                MONTH(appointment_date) as report_month,
                COUNT(*) as total
            ")
            ->groupBy('report_year', 'report_month')
            ->orderBy('report_year')
            ->orderBy('report_month')
            ->get()
            ->mapWithKeys(function ($item) {
                $monthLabel = \Carbon\Carbon::create(
                    (int) $item->report_year,
                    (int) $item->report_month,
                    1
                )->format('M Y');

                return [$monthLabel => (int) $item->total];
            });

        // ========================================
        // PATIENT AND DOCTOR STATISTICS
        // ========================================

        $totalPatients = Patient::count();

        $totalDoctors = Doctor::count();

        // ========================================
        // MEDICAL RECORDS REPORT
        // ========================================

        $medicalRecordsQuery = MedicalRecord::query();

        if ($startDate) {
            $medicalRecordsQuery->whereDate(
                'created_at',
                '>=',
                $startDate
            );
        }

        if ($endDate) {
            $medicalRecordsQuery->whereDate(
                'created_at',
                '<=',
                $endDate
            );
        }

        $totalMedicalRecords = $medicalRecordsQuery->count();

        // ========================================
        // BILLING REPORTS
        // ========================================

        $billsQuery = Bill::query();

        if ($startDate) {
            $billsQuery->whereDate(
                'created_at',
                '>=',
                $startDate
            );
        }

        if ($endDate) {
            $billsQuery->whereDate(
                'created_at',
                '<=',
                $endDate
            );
        }

        $totalBills = (clone $billsQuery)->count();

        $paidBills = (clone $billsQuery)
            ->where('status', 'Paid')
            ->count();

        $pendingBills = (clone $billsQuery)
            ->where('status', 'Pending')
            ->count();

        // Chart 3: Bills by Status
        $billsByStatus = (clone $billsQuery)
            ->selectRaw("
                COALESCE(status, 'Unspecified') as status_label,
                COUNT(*) as total
            ")
            ->groupBy('status_label')
            ->pluck('total', 'status_label');

        // ========================================
        // PAYMENT AND COLLECTION REPORTS
        // ========================================

        $paymentsQuery = Payment::query();

        if ($startDate) {
            $paymentsQuery->whereDate(
                'payment_date',
                '>=',
                $startDate
            );
        }

        if ($endDate) {
            $paymentsQuery->whereDate(
                'payment_date',
                '<=',
                $endDate
            );
        }

        $totalCollections = (clone $paymentsQuery)
            ->sum('amount_paid');

        // Chart 4: Collections by Payment Method
        $paymentsByMethod = (clone $paymentsQuery)
            ->selectRaw("
                COALESCE(payment_method, 'Unspecified') as method_label,
                SUM(amount_paid) as total
            ")
            ->groupBy('method_label')
            ->pluck('total', 'method_label');

        // ========================================
        // RETURN ADMIN REPORTS VIEW
        // ========================================

        return view('reports.admin', compact(
            'startDate',
            'endDate',

            'totalPatients',
            'totalDoctors',

            'totalAppointments',
            'appointments',
            'appointmentStatuses',
            'appointmentStatusChart',
            'monthlyAppointments',

            'totalMedicalRecords',

            'totalBills',
            'paidBills',
            'pendingBills',
            'billsByStatus',

            'totalCollections',
            'paymentsByMethod'
        ));
    }
}