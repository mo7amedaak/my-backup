<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Notifications\NewJobPostedNotification;
use App\Notifications\JobStatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource for Employer.
     */
    public function index()
    {
        $jobs = Job::where('employer_id', auth()->id())->paginate(6);
        return view('dashboard.employerDashboard', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        // Create the job
        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'location' => $request->location,
            'salary' => $request->salary,
            'employer_id' => Auth::id(),
            'status' => 'pending', // Default status
        ]);

        // Notify the admins about the new job
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewJobPostedNotification($job));
        }

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'location' => $request->location,
            'salary' => $request->salary,
            'status' => 'pending', // Reset status to pending on update
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * Admin approves a job.
     */
    public function approve(Job $job)
    {
        $job->status = 'approved';
        $job->save();

        // Notify Employer
        $job->employer->notify(new JobStatusNotification('approved', $job->title));

        return redirect()->back()->with('success', 'Job approved successfully.');
    }

    /**
     * Admin rejects a job.
     */
    public function reject(Job $job)
    {
        $job->status = 'rejected';
        $job->save();

        // Notify Employer
        $job->employer->notify(new JobStatusNotification('rejected', $job->title));

        return redirect()->back()->with('success', 'Job rejected successfully.');
    }
}
