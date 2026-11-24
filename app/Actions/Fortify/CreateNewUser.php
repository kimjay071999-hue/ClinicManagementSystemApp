<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:20'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => $this->passwordRules(),
        ])->validate();

        // Create user account
        $user = User::create([
            'name' => $input['first_name'] . ' ' . $input['last_name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'role' => 'patient',
        ]);

// Create patient profile
Patient::create([
    'user_id' => $user->id,
    'patient_id' => 'PAT-' . strtoupper(uniqid()),
    'first_name' => $input['first_name'],
    'last_name' => $input['last_name'],
    'date_of_birth' => $input['date_of_birth'],
    'gender' => $input['gender'],
    'mobile_number' => $input['mobile_number'],
    'email' => $input['email'],
]);
        return $user;
    }
}