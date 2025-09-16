<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    function index()
    {
        $tracks = Track::all();
        return view('tracks', ['tracks' => $tracks]);
    }

    function show($id)
    {
        $track = Track::findOrFail($id);
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
        return view('createTrack');
    }

    public function store(Request $request) 
    {
        Track::create($request->all());
        return to_route('tracks.index');
    }

    function edit($id)
    {
        $track = Track::findOrFail($id);
        return view('editTrack', compact('track'));
    }

    function update(Request $request, $id)
    {
        $track = Track::findOrFail($id);
        $requestedData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $requestedData['image'] = $filename;
        }

        $track->update($requestedData);
        return to_route('tracks.index');
    }
}
