<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Notifications\JobStatusNotification;

use App\Models\Job;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function pendingJobs()
    {
        
        $jobs = Job::where('status', 'pending')->with('employer')->paginate(5);

        return view('dashboard.adminDashboard', compact('jobs'));
    }

    public function approveJob(Job $job)
{
    $job->status = 'approved';
    $job->save();

    
    $job->load('employer');

    $job->employer->notify(new JobStatusNotification('approved', $job->title));

    return redirect()->back()->with('success', 'Job approved successfully.');
}

public function rejectJob(Job $job)
{
    $job->status = 'rejected';
    $job->save();

    $job->load('employer');

    $job->employer->notify(new JobStatusNotification('rejected', $job->title));

    return redirect()->back()->with('success', 'Job rejected successfully.');
}

}
