<?php

namespace App\Http\Controllers;
use App\Models\Course;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    function index()
    {
        $tracks = Track::orderBy('id', "desc")->paginate(5);
        return view('tracks', ['tracks' => $tracks]);
    }

    function show($id)
    {
        $track = Track::with(['students', 'courses'])->findOrFail($id);
        return view('trackData', compact('track'));
    }

    function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        return to_route('tracks.index');
    }

    function create()
    {
        $courses = \App\Models\Course::all();
        return view('createTrack', compact('courses'));
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|unique:tracks,name|min:2',
            'image' => 'unique:tracks,image',
            'description' => 'required'
        ],[
            'name.required' => 'track name is required',
            'name.min' => 'track name must be at least 2 characters',
            'description.required' => 'track description is required',
        ]);

        Track::create($request->all());
        return to_route('tracks.index');
    }

    function edit($id)
    {
        $track = Track::findOrFail($id);
        $allCourses = \App\Models\Course::all();  
        return view('editTrack', compact('track', 'allCourses'));
    }


public function update(Request $request, $id)
{
    $track = Track::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image',
        'courses' => 'nullable|array', 
        'courses.*' => 'exists:courses,id',
    ]);

    // تحديث البيانات الأساسية
    $track->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
    ]);

    // لو في صورة جديدة
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/tracks'), $imageName);
        $track->image = $imageName;
        $track->save();
    }

    // تحديث الكورسات المرتبطة بالتراك
    if ($request->has('courses')) {
        // اربط الكورسات المختارة بالتراك الجديد
        Course::whereIn('id', $validated['courses'])->update(['track_id' => $track->id]);
    }

    return redirect()->route('tracks.index')->with('success', 'Track updated successfully');
}

}

