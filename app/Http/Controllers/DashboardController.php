<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Bill;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count();

        $totalDoctors = Doctor::count();

        $totalAppointments = Appointment::count();

        $totalBills = Bill::count();

        $pendingBills = Bill::where('status', 'Pending')->count();

        $paidBills = Bill::where('status', 'Paid')->count();

        $totalRevenue = Bill::where('status', 'Paid')->sum('amount');

        $recentAppointments = Appointment::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->take(5)
        ->get();

        $recentPatients = Patient::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPatients',
            'totalDoctors',
            'totalAppointments',
            'totalBills',
            'pendingBills',
            'paidBills',
            'totalRevenue',
            'recentAppointments',
            'recentPatients'
        ));
    }
}