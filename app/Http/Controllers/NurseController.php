<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::latest()->get();

        return view('nurses.index', compact('nurses'));
    }

    public function create()
    {
        return view('nurses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:nurses,email',
            'address' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $validated['nurse_id'] = 'NUR-' . str_pad(
            Nurse::count() + 1,
            4,
            '0',
            STR_PAD_LEFT
        );

        Nurse::create($validated);

        return redirect()
            ->route('nurses.index')
            ->with('success', 'Nurse successfully added!');
    }

    public function show(string $id)
    {
        $nurse = Nurse::findOrFail($id);

        return view('nurses.show', compact('nurse'));
    }

    public function edit(string $id)
    {
        $nurse = Nurse::findOrFail($id);

        return view('nurses.edit', compact('nurse'));
    }

    public function update(Request $request, string $id)
    {
        $nurse = Nurse::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:nurses,email,' . $nurse->id,
            'address' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $nurse->update($validated);

        return redirect()
            ->route('nurses.index')
            ->with('success', 'Nurse successfully updated!');
    }

    public function destroy(string $id)
    {
        $nurse = Nurse::findOrFail($id);

        $nurse->delete();

        return redirect()
            ->route('nurses.index')
            ->with('success', 'Nurse successfully deleted!');
    }
}