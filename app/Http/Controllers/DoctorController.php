<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::latest()->get();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // 'license_number' => 'required|string|max:255|unique:doctors,license_number',
            'mobile_number' => 'required|string|max:20',
            'email' => 'required|email|unique:doctors,email',
            'address' => 'nullable|string|max:255',
        ]);

          $doctor = new Doctor();

        $doctor->doctor_id = 'DOC-' . strtoupper(uniqid());
        $doctor->first_name = $validated['first_name'];
        $doctor->last_name = $validated['last_name'];
        $doctor->specialization = $validated['specialization'];
        // $doctor->license_number = $validated['license_number'];
        $doctor->mobile_number = $validated['mobile_number'];
        $doctor->email = $validated['email'];
        $doctor->address = $validated['address'] ?? null;

        $doctor->save();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
          $doctor = Doctor::findOrFail($id);

        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $doctor = Doctor::findOrFail($id);

        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $doctor = Doctor::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // 'license_number' => 'required|string|max:255|unique:doctors,license_number,' . $doctor->id,
            'mobile_number' => 'required|string|max:20',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'address' => 'nullable|string|max:255',
        ]);


        $doctor->first_name = $validated['first_name'];
        $doctor->last_name = $validated['last_name'];
        $doctor->specialization = $validated['specialization'];
        // $doctor->license_number = $validated['license_number'];
        $doctor->mobile_number = $validated['mobile_number'];
        $doctor->email = $validated['email'];
        $doctor->address = $validated['address'] ?? null;

        $doctor->save();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
           $doctor->delete();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Doctor successfully deleted!');
    }

    public function notifications()
{
    return view('doctors.notifications');
}
}
