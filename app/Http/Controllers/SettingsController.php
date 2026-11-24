<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        // Get the currently authenticated user.
        $user = Auth::user();

        // Redirect to login if no user is authenticated.
        if (!$user) {
            return redirect()->route('login');
        }

        return view('settings.index', compact('user'));
    }

    /**
     * Update the authenticated user's profile.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        // Ensure a user is authenticated.
        if (!$user) {
            return redirect()->route('login');
        }

        // Validate profile information.
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        // Update the user's name.
        $user->name = $validated['name'];

        // Update email only when it has changed.
        if ($user->email !== $validated['email']) {
            $user->email = $validated['email'];

            // Reset email verification if the column exists.
            if (
                array_key_exists('email_verified_at', $user->getAttributes())
                && $user->email_verified_at !== null
            ) {
                $user->email_verified_at = null;
            }
        }

        // Save changes to the database.
        $user->save();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Your profile has been updated successfully.');
    }

    /**
     * Update the authenticated user's password.
     */
    public function updatePassword(Request $request)
    {
        $user = $request->user();

        // Ensure a user is authenticated.
        if (!$user) {
            return redirect()->route('login');
        }

        // Validate the current and new passwords.
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
            ],
        ]);

        // Hash the new password before saving.
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Your password has been changed successfully.');
    }
}