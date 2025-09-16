<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;


class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks=Track::orderBy('id',"desc")->paginate(5);
        return view('tracks.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
           $requestedData=$request->validate([
        'name' => 'required|unique:tracks,name|min:2',
        'image' => 'unique:tracks,image',

        'description' => 'required',

    ],[
        'name.required'=>'track name is required',
        'name.min'=>'track name must be at least 2 characters',
        'description.required'=>'track description is required',
        'description.unique'=>'track description is unique',
    ]);
    $requestedData=request()->all();
    Track::create($requestedData);
    return to_route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
        // dd($track);
        return view('tracks.view',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
          return view('tracks.update',compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
     $requestedData=$request->all();
     $track->update($requestedData);
    return to_route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
        $track->delete();
        return to_route('tracks.index');
    }
}
