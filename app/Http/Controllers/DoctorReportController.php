<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Find the doctor record using the logged-in user's email.
        $doctor = Doctor::where('email', $user->email)->firstOrFail();

        // Get the selected date range.
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Doctor's appointments only.
        $appointmentsQuery = Appointment::with('patient')
            ->where('doctor_id', $doctor->id);

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

        $appointments = $appointmentsQuery
            ->orderByDesc('appointment_date')
            ->get();

        // Doctor's medical records only.
        $medicalRecordsQuery = MedicalRecord::with('patient')
            ->where('doctor_id', $doctor->id);

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

        $medicalRecords = $medicalRecordsQuery
            ->orderByDesc('created_at')
            ->get();

        // Summary statistics.
        $totalAppointments = $appointments->count();

        $completedAppointments = $appointments
            ->where('status', 'completed')
            ->count();

        $pendingAppointments = $appointments
            ->where('status', 'pending')
            ->count();

        $totalPatients = $appointments
            ->pluck('patient_id')
            ->unique()
            ->count();

        $totalMedicalRecords = $medicalRecords->count();

        // Appointment status chart data.
        $appointmentStatusChart = $appointments
            ->groupBy('status')
            ->map(fn ($items) => $items->count());

        return view('reports.doctor', compact(
            'doctor',
            'startDate',
            'endDate',
            'appointments',
            'medicalRecords',
            'totalPatients',
            'totalAppointments',
            'completedAppointments',
            'pendingAppointments',
            'totalMedicalRecords',
            'appointmentStatusChart'
        ));
    }
}

