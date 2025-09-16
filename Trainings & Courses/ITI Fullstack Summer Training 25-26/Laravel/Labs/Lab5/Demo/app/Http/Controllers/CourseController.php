<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('track')->orderBy('id', 'desc')->paginate(5);
        return view('courses', compact('courses'));
    }

    public function create()
    {
        $tracks = Track::all();
        return view('createCourse', compact('tracks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'track_id' => 'required|exists:tracks,id',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'track_id' => $request->track_id,
            'code' => $request->code
        ]);


        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show($id)
    {
        $course = Course::with(['track', 'students'])->findOrFail($id);
        return view('courseData', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $tracks = Track::all();
        return view('updateCourse', compact('course', 'tracks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'track_id' => 'required|exists:tracks,id',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'track_id' => $request->track_id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
