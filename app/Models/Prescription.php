<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\MedicalRecord;

class Prescription extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'medical_record_id',
        'medicine',
        'dosage',
        'frequency',
        'duration',
        'instructions',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}