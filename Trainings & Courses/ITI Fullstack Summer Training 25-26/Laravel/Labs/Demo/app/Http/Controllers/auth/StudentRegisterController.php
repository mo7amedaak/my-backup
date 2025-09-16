<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.student-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|confirmed|min:8',
            'address' => 'required|string',
            'phone' => 'required|string',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'image' => 'https://via.placeholder.com/100',
        ]);

        Auth::guard('student')->login($student);

        return redirect()->route('students.view', ['id' => $student->id]);
    }
}