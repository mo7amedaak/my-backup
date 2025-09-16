<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        return response()->json(Track::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $track = Track::create($validated);

        return response()->json($track, 201);
    }

    public function show($id)
    {
        $track = Track::find($id);
        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        return response()->json($track, 200);
    }

    public function update(Request $request, $id)
    {
        $track = Track::find($id);
        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $track->update($validated);

        return response()->json($track, 200);
    }

    public function destroy($id)
    {
        $track = Track::find($id);
        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $track->delete();

        return response()->json(['message' => 'Track deleted'], 200);
    }
}
