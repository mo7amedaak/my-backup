<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::with('track', 'courses')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Students retrieved successfully',
            'data' => $students
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'age' => 'required|integer|min:1',
            'image' => 'required|url',
            'gender' => 'required|in:male,female',
            'track_name' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $trackId = null;
        if ($request->track_name) {
            $track = Track::firstOrCreate(['name' => trim($request->track_name)]);
            $trackId = $track->id;
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'image' => $request->image,
            'gender' => $request->gender,
            'track_id' => $trackId
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    public function show(Student $student): JsonResponse
    {
        $student->load('track', 'courses');
        
        return response()->json([
            'success' => true,
            'message' => 'Student retrieved successfully',
            'data' => $student
        ]);
    }

    public function update(Request $request, Student $student): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'address' => 'required|string',
            'phone' => 'required|string',
            'age' => 'required|integer|min:1',
            'image' => 'required|url',
            'gender' => 'required|in:male,female',
            'track_name' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $trackId = null;
        if ($request->track_name) {
            $track = Track::firstOrCreate(['name' => trim($request->track_name)]);
            $trackId = $track->id;
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'image' => $request->image,
            'gender' => $request->gender,
            'track_id' => $trackId
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully',
            'data' => $student
        ]);
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully'
        ]);
    }
}