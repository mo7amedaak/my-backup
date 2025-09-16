<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $courses = Course::with(['students', 'tracks'])->orderBy('id', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Courses retrieved successfully',
            'data' => $courses
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|min:2',
                'image' => 'required|url',
                'description' => 'required|string|min:10',
                'code' => 'required|string|unique:courses,code|max:50'
            ], [
                'name.required' => 'Course name is required',
                'name.min' => 'Course name must be at least 2 characters',
                'name.max' => 'Course name cannot exceed 255 characters',
                'image.required' => 'Course image is required',
                'image.url' => 'Course image must be a valid URL',
                'description.required' => 'Course description is required',
                'description.min' => 'Course description must be at least 10 characters',
                'code.required' => 'Course code is required',
                'code.unique' => 'Course code must be unique',
                'code.max' => 'Course code cannot exceed 50 characters',
            ]);

            $course = Course::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Course created successfully',
                'data' => $course
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): JsonResponse
    {
        $course->load(['students', 'tracks']);
        
        return response()->json([
            'success' => true,
            'message' => 'Course retrieved successfully',
            'data' => $course
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|min:2',
                'image' => 'required|url',
                'description' => 'required|string|min:10',
                'code' => 'required|string|unique:courses,code,' . $course->id . '|max:50'
            ], [
                'name.required' => 'Course name is required',
                'name.min' => 'Course name must be at least 2 characters',
                'name.max' => 'Course name cannot exceed 255 characters',
                'image.required' => 'Course image is required',
                'image.url' => 'Course image must be a valid URL',
                'description.required' => 'Course description is required',
                'description.min' => 'Course description must be at least 10 characters',
                'code.required' => 'Course code is required',
                'code.unique' => 'Course code must be unique',
                'code.max' => 'Course code cannot exceed 50 characters',
            ]);

            $course->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Course updated successfully',
                'data' => $course
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): JsonResponse
    {
        try {
            // Detach all relationships before deleting
            $course->students()->detach();
            $course->tracks()->detach();
            
            $course->delete();

            return response()->json([
                'success' => true,
                'message' => 'Course deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the course',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get students enrolled in a specific course
     */
    public function students(Course $course): JsonResponse
    {
        $students = $course->students()->with('track')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Course students retrieved successfully',
            'data' => [
                'course' => $course,
                'students' => $students
            ]
        ], 200);
    }

    /**
     * Get tracks associated with a specific course
     */
    public function tracks(Course $course): JsonResponse
    {
        $tracks = $course->tracks()->with('students')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Course tracks retrieved successfully',
            'data' => [
                'course' => $course,
                'tracks' => $tracks
            ]
        ], 200);
    }

    /**
     * Enroll students in a course
     */
    public function enrollStudents(Request $request, Course $course): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'student_ids' => 'required|array',
                'student_ids.*' => 'exists:students,id'
            ], [
                'student_ids.required' => 'Student IDs are required',
                'student_ids.array' => 'Student IDs must be an array',
                'student_ids.*.exists' => 'One or more students do not exist'
            ]);

            $course->students()->sync($validatedData['student_ids']);

            return response()->json([
                'success' => true,
                'message' => 'Students enrolled in course successfully',
                'data' => $course->load('students')
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while enrolling students',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Associate tracks with a course
     */
    public function associateTracks(Request $request, Course $course): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'track_ids' => 'required|array',
                'track_ids.*' => 'exists:tracks,id'
            ], [
                'track_ids.required' => 'Track IDs are required',
                'track_ids.array' => 'Track IDs must be an array',
                'track_ids.*.exists' => 'One or more tracks do not exist'
            ]);

            $course->tracks()->sync($validatedData['track_ids']);

            return response()->json([
                'success' => true,
                'message' => 'Tracks associated with course successfully',
                'data' => $course->load('tracks')
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while associating tracks',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}