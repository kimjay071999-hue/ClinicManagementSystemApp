<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\MedicalRecord;

class Bill extends Model
{
    protected $fillable = [
        'patient_id',
        'appointment_id',
        'medical_record_id',
        'description',
        'amount',
        'status',
        'payment_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function payments(): HasMany
{
    return $this->hasMany(Payment::class);
}
}