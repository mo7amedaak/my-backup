<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the clinics.
     */
    public function index()
    {
        $clinics = \App\Models\Clinic::with('doctor')->latest()->paginate(10);
    $doctors = \App\Models\Doctor::with('clinics')->paginate(10);

    return view('dashboard.admin', compact('clinics', 'doctors'));
    }

    /**
     * Show the form for creating a new clinic.
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('admin.clinics.create', compact('doctors'));
    }

    /**
     * Store a newly created clinic in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'consultation_fee' => 'nullable|numeric',
            'waiting_time' => 'nullable|string|max:255',
            'working_hours' => 'nullable|array',
        ]);

        Clinic::create([
            'doctor_id' => $request->doctor_id,
            'clinic_name' => $request->clinic_name,
            'city' => $request->city,
            'address' => $request->address,
            'consultation_fee' => $request->consultation_fee,
            'waiting_time' => $request->waiting_time,
            'working_hours' => $request->working_hours ? implode(',', $request->working_hours) : null,
        ]);

        return redirect()->route('dashboard.admin')->with('success', 'تم إضافة العيادة بنجاح');
    }

    /**
     * Show the form for editing the specified clinic.
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        $doctors = Doctor::all();
        return view('admin.clinics.edit', compact('clinic', 'doctors'));
    }

    /**
     * Update the specified clinic in storage.
     */
    public function update(Request $request, $id)
    {
        $clinic = Clinic::findOrFail($id);

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'consultation_fee' => 'nullable|numeric',
            'waiting_time' => 'nullable|string|max:255',
            'working_hours' => 'nullable|array',
        ]);

        $clinic->update([
            'doctor_id' => $request->doctor_id,
            'clinic_name' => $request->clinic_name,
            'city' => $request->city,
            'address' => $request->address,
            'consultation_fee' => $request->consultation_fee,
            'waiting_time' => $request->waiting_time,
            'working_hours' => $request->working_hours ? implode(',', $request->working_hours) : null,
        ]);

        return redirect()->route('dashboard.admin')->with('success', 'تم تعديل بيانات العيادة بنجاح');
    }

    /**
     * Remove the specified clinic from storage.
     */
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        return redirect()->route('admin.clinics.index')->with('success', 'تم حذف العيادة بنجاح');
    }
}
