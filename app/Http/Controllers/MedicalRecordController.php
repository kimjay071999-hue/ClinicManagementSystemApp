<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecords = MedicalRecord::with(['patient', 'doctor', 'appointment'])
            ->latest()
            ->get();

        return view('medical_records.index', compact('medicalRecords'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $appointments = Appointment::with(['patient', 'doctor'])
            ->latest()
            ->get();

        return view('medical_records.create', compact(
            'patients',
            'doctors',
            'appointments'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'symptoms' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        MedicalRecord::create($validated);

        return redirect()
            ->route('medical_records.index')
            ->with('success', 'Medical record successfully added!');
    }

    public function show(string $id)
    {
        $medicalRecord = MedicalRecord::with([
            'patient',
            'doctor',
            'appointment'
        ])->findOrFail($id);

        return view('medical_records.show', compact('medicalRecord'));
    }

    public function edit(string $id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        $patients = Patient::all();
        $doctors = Doctor::all();
        $appointments = Appointment::with(['patient', 'doctor'])
            ->latest()
            ->get();

        return view('medical_records.edit', compact(
            'medicalRecord',
            'patients',
            'doctors',
            'appointments'
        ));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'nullable|exists:appointments,id',
            'symptoms' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $medicalRecord = MedicalRecord::findOrFail($id);

        $medicalRecord->update($validated);

        return redirect()
            ->route('medical_records.index')
            ->with('success', 'Medical record successfully updated!');
    }

    public function destroy(string $id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        $medicalRecord->delete();

        return redirect()
            ->route('medical_records.index')
            ->with('success', 'Medical record successfully deleted!');
    }
}