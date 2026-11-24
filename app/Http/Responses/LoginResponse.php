<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        $user = $request->user();

        // ADMIN
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // DOCTOR
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        // NURSE
        if ($user->role === 'nurse') {
            return redirect()->route('nurse.dashboard');
        }

        // CASHIER
        if ($user->role === 'cashier') {
            return redirect()->route('cashier.index');
        }

        // PATIENT
        if ($user->role === 'patient') {
            return redirect()->route('patients.my-history');
        }

        // UNKNOWN ROLE
        abort(403, 'Your account role is not authorized.');
    }
}