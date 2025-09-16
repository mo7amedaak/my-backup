<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\NewApplicationNotification;
use App\Notifications\ApplicationStatusNotification;

class ApplicationController extends Controller
{
    
    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|file|max:2048', // 2MB
        ]);

        $file = $request->file('resume');

        $application = Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'resume' => file_get_contents($file->getRealPath()),
            'resume_name' => $file->getClientOriginalName(),
            'resume_type' => $file->getMimeType(),
        ]);

        // إرسال Notification للـ Employer
        $candidate = auth()->user();
        $employer = User::find($job->employer_id);

        if ($employer) {
            $employer->notify(new NewApplicationNotification($application));
        }

        return redirect()->back()->with([
            'success_job_id' => $job->id,
            'success_message' => 'Resume uploaded successfully!'
        ]);
    }

    public function download(Application $application)
    {
        return response($application->resume)
            ->header('Content-Type', $application->resume_type)
            ->header('Content-Disposition', 'attachment; filename="'.$application->resume_name.'"');
    }


    public function index()
    {
        $applications = auth()->user()
            ->applications()
            ->with('job') 
            ->latest()
            ->get();

        return view('candidate.applications', compact('applications'));
    }

    
    public function destroy($id)
    {
        $application = auth()->user()->applications()->findOrFail($id);
        $application->delete();

        return redirect()->route('candidate.profile')->with('success', 'Application cancelled successfully.');
    }

    
    public function approve(Application $application)
    {
        $application->status = 'approved';
        $application->save();

        
        $application->user->notify(new ApplicationStatusNotification('approved', $application->job->title));

        return redirect()->back()->with('success', 'Application approved.');
    }

    
    public function reject(Application $application)
    {
        $application->status = 'rejected';
        $application->save();

        
        $application->user->notify(new ApplicationStatusNotification('rejected', $application->job->title));

        return redirect()->back()->with('success', 'Application rejected.');
    }
}
