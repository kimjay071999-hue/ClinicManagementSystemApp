<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with([
            'patient',
            'doctor',
            'medicalRecord'
        ])
        ->latest()
        ->get();

        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::all();

        $doctors = Doctor::all();

        $medicalRecords = MedicalRecord::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        return view('prescriptions.create', compact(
            'patients',
            'doctors',
            'medicalRecords'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'medical_record_id' => 'nullable|exists:medical_records,id',
            'medicine' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        Prescription::create($validated);

        return redirect()
            ->route('prescriptions.index')
            ->with('success', 'Prescription successfully added!');
    }

    public function show(string $id)
    {
        $prescription = Prescription::with([
            'patient',
            'doctor',
            'medicalRecord'
        ])
        ->findOrFail($id);

        return view('prescriptions.show', compact('prescription'));
    }

    public function edit(string $id)
    {
        $prescription = Prescription::findOrFail($id);

        $patients = Patient::all();

        $doctors = Doctor::all();

        $medicalRecords = MedicalRecord::with([
            'patient',
            'doctor'
        ])
        ->latest()
        ->get();

        return view('prescriptions.edit', compact(
            'prescription',
            'patients',
            'doctors',
            'medicalRecords'
        ));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'medical_record_id' => 'nullable|exists:medical_records,id',
            'medicine' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $prescription = Prescription::findOrFail($id);

        $prescription->update($validated);

        return redirect()
            ->route('prescriptions.index')
            ->with('success', 'Prescription successfully updated!');
    }

    public function destroy(string $id)
    {
        $prescription = Prescription::findOrFail($id);

        $prescription->delete();

        return redirect()
            ->route('prescriptions.index')
            ->with('success', 'Prescription successfully deleted!');
    }
}