<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;


class DoctorDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the logged-in user's email
        $user = $request->user();

        // Find the doctor record using the matching email
        $doctor = Doctor::where('email', $user->email)->firstOrFail();

        // Base query: appointments belonging to this doctor
        $appointmentsQuery = Appointment::with('patient')
            ->where('doctor_id', $doctor->id);

        // Today's appointments
        $todayAppointments = (clone $appointmentsQuery)
            ->whereDate('appointment_date', today())
            ->orderBy('appointment_time')
            ->get();

        // Upcoming appointments from today onwards
        $upcomingAppointments = (clone $appointmentsQuery)
            ->whereDate('appointment_date', '>=', today())
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->take(10)
            ->get();

        // Count all appointments assigned to this doctor
        $totalAppointments = (clone $appointmentsQuery)->count();

        // Count upcoming appointments
        $upcomingCount = (clone $appointmentsQuery)
            ->whereDate('appointment_date', '>=', today())
            ->count();

        // Count appointments for today
        $todayCount = $todayAppointments->count();

        return view('doctors.dashboard', compact(
            'doctor',
            'todayAppointments',
            'upcomingAppointments',
            'totalAppointments',
            'upcomingCount',
            'todayCount'
        ));
    }
}