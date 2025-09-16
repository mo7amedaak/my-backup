<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('clinics')->paginate(6);
        return view('dashboard.admin', compact('doctors'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'specialization' => 'required|string|max:255',
            'subspecializations' => 'nullable|array',
            'subspecializations.*' => 'string|max:255',
            'description' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->has('subspecializations')) {
            $data['subspecialization'] = $request->subspecializations;
        }
        unset($data['subspecializations']);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('doctors', 'public');
        }

        Doctor::create($data);

        return redirect()->route('dashboard.admin')->with('success', 'Doctor added successfully');
    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['clinics', 'reviews', 'images']);
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'specialization' => 'required|string|max:255',
            'subspecializations' => 'nullable|array',
            'subspecializations.*' => 'string|max:255',
            'description' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->has('subspecializations')) {
            $data['subspecialization'] = $request->subspecializations;
        }
        unset($data['subspecializations']);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('doctors', 'public');
        }

        $doctor->update($data);

        return redirect()->route('dashboard.admin')->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully');
    }

   public function welcome()
{
    $doctors = \App\Models\Doctor::with('clinics')->get();
    return view('welcome', compact('doctors'));
}



}






