<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_id',
        'first_name',
        'last_name',
        'specialization',
        'license_number',
        'mobile_number',
        'email',
        'address',
    ];
}