<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track')->orderBy('id', 'desc')->paginate(5);
        return view('students', ['students' => $students]);
    }

    public function create()
    {
        $tracks = Track::all();
        return view('createStudent', compact('tracks'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
    'name' => 'required|unique:students|min:3',
    'email' => 'required|unique:students,email',
    'address' => 'required',
    'phone' => 'required|unique:students,phone|min:11',
    'gender' => 'required',
    'track_id' => 'required|exists:tracks,id',
    'age' => 'required|integer|min:1|max:100',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
]);


        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $filename);
            $validated['image'] = $filename;
        }

        Student::create($validated);
        return to_route('students.index');
    }

    public function show(string $id)
    {
        $student = Student::with('track')->findOrFail($id);
        return view('studentData', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $tracks = Track::all();
        return view('updateStudent', compact('student', 'tracks'));
    }

    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // Validate inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'age' => 'required|numeric',
        'gender' => 'required|in:male,female',
        'track_id' => 'nullable|exists:tracks,id', 
        'image' => 'nullable|image|max:2048',
    ]);

    // Prepare data
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'age' => $request->age,
        'gender' => $request->gender,
        'track_id' => $request->track_id, 
    ];

    // Handle image if uploaded
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/students'), $filename);
        $data['image'] = $filename;
    }

    // Update student
    $student->update($data);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('students.index');
    }
}
