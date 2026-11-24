<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Mail\PatientMessageMail;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::latest()->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'mobile_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $patient = new Patient();

        $patient->patient_id = 'PAT-' . strtoupper(uniqid());
        $patient->first_name = $validated['first_name'];
        $patient->last_name = $validated['last_name'] ?? null;
        $patient->date_of_birth = $validated['date_of_birth'];
        $patient->gender = $validated['gender'];
        $patient->mobile_number = $validated['mobile_number'] ?? null;
        $patient->address = $validated['address'] ?? null;

        // user_id is intentionally left null here.
        // Admin-created patient records are not automatically linked
        // to the currently logged-in admin account.

        $patient->save();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);

        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'mobile_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $patient = Patient::findOrFail($id);

        $patient->first_name = $validated['first_name'];
        $patient->last_name = $validated['last_name'] ?? null;
        $patient->date_of_birth = $validated['date_of_birth'];
        $patient->gender = $validated['gender'];
        $patient->mobile_number = $validated['mobile_number'] ?? null;
        $patient->address = $validated['address'] ?? null;

        $patient->save();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }

//     public function history(string $id)
// {
//     $patient = Patient::with([
//         'appointments.doctor',
//         'medicalRecords.doctor',
//         'medicalRecords.appointment',
//         'prescriptions.doctor',
//         'prescriptions.medicalRecord',
//         'bills.appointment',
//         'bills.medicalRecord',
//     ])->findOrFail($id);

//     return view('patients.history', compact('patient'));
// }
public function history(string $id)
{
    $patient = Patient::findOrFail($id);

    $appointments = $patient->appointments()
        ->with('doctor')
        ->latest()
        ->get();

    $medicalRecords = $patient->medicalRecords()
        ->with(['doctor', 'appointment'])
        ->latest()
        ->get();

    $prescriptions = $patient->prescriptions()
        ->with(['doctor', 'medicalRecord'])
        ->latest()
        ->get();

    $bills = $patient->bills()
        ->with(['appointment', 'medicalRecord'])
        ->latest()
        ->get();

    return view('patients.history', compact(
        'patient',
        'appointments',
        'medicalRecords',
        'prescriptions',
        'bills'
    ));
}

public function myHistory(Request $request)
{
    $patient = $request->user()->patient;

    if (!$patient) {
        abort(404, 'Patient profile not found.');
    }

    $appointments = $patient->appointments()
        ->with('doctor')
        ->latest()
        ->get();

    $medicalRecords = $patient->medicalRecords()
        ->with(['doctor', 'appointment'])
        ->latest()
        ->get();

    $prescriptions = $patient->prescriptions()
        ->with(['doctor', 'medicalRecord'])
        ->latest()
        ->get();

    $bills = $patient->bills()
        ->with(['appointment', 'medicalRecord'])
        ->latest()
        ->get();

    return view('patients.history', compact(
        'patient',
        'appointments',
        'medicalRecords',
        'prescriptions',
        'bills'
    ));
}
public function sendMessage(Request $request)
{
    $validated = $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    $user = $request->user();

    Mail::to('kimjay021999@gmail.com')->send(
        new PatientMessageMail(
            $user->name,
            $user->email,
            $validated['subject'],
            $validated['message']
        )
    );

    return back()->with(
        'success',
        'Your message has been sent successfully!'
    );
}
}