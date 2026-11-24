<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = [
        'nurse_id',
        'first_name',
        'last_name',
        'specialization',
        'mobile_number',
        'email',
        'address',
        'status',
    ];
}