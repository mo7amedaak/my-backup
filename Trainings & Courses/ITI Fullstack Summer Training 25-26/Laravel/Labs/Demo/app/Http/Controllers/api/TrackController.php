<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tracks = Track::with('students')->orderBy('id', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Tracks retrieved successfully',
            'data' => $tracks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:tracks,name|max:255|min:2',
            ], [
                'name.required' => 'Track name is required',
                'name.unique' => 'Track name must be unique',
                'name.min' => 'Track name must be at least 2 characters',
                'name.max' => 'Track name cannot exceed 255 characters',
            ]);

            $track = Track::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Track created successfully',
                'data' => $track
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
                'message' => 'An error occurred while creating the track',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track): JsonResponse
    {
        $track->load('students', 'courses');
        
        return response()->json([
            'success' => true,
            'message' => 'Track retrieved successfully',
            'data' => $track
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:tracks,name,' . $track->id . '|max:255|min:2',
            ], [
                'name.required' => 'Track name is required',
                'name.unique' => 'Track name must be unique',
                'name.min' => 'Track name must be at least 2 characters',
                'name.max' => 'Track name cannot exceed 255 characters',
            ]);

            $track->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Track updated successfully',
                'data' => $track
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
                'message' => 'An error occurred while updating the track',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track): JsonResponse
    {
        try {
            // Check if track has associated students
            if ($track->students()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete track because it has associated students'
                ], 409);
            }

            $track->delete();

            return response()->json([
                'success' => true,
                'message' => 'Track deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the track',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get students for a specific track
     */
    public function students(Track $track): JsonResponse
    {
        $students = $track->students()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Track students retrieved successfully',
            'data' => [
                'track' => $track,
                'students' => $students
            ]
        ], 200);
    }

    /**
     * Get courses for a specific track
     */
    public function courses(Track $track): JsonResponse
    {
        $courses = $track->courses()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Track courses retrieved successfully',
            'data' => [
                'track' => $track,
                'courses' => $courses
            ]
        ], 200);
    }
}