<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students', ['students' => $students]);
    }

    public function create()
    {
        return view('createStudent');
    }

    public function store(Request $request) 
    {
        Student::create($request->all());
        return to_route('students.index');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('studentData', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('updateStudent', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return to_route('students.index');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return to_route('students.index');
    }
}
