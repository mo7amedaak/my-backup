<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class CandidateDashboardController extends Controller
{
    public function index(Request $request)
    {
        // البحث في الوظائف
        $query = Job::where('status', 'approved');

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('salary')) {
            $query->where('salary', '>=', $request->salary);
        }

        if ($request->filled('job_type')) {
            $query->where('type', $request->job_type);
        }
        


        $jobs = $query->latest()->paginate(5);

        // التقديمات الخاصة بالمستخدم
        $applications = Application::where('user_id', auth()->id())
            ->with('job')
            ->latest()
            ->paginate(5);

        // الإشعارات
        $notifications = auth()->user()->unreadNotifications;

        return view('dashboard.candidateDashboard', compact('jobs', 'applications','notifications'));
    }

    public function apply(Request $request, $id)
    {
        $job = Job::where('status', 'approved')->findOrFail($id);

        // التحقق إذا قدمت قبل كده
        if (Application::where('user_id', auth()->id())->where('job_id', $id)->exists()) {
            return back()->with('error', 'You have already applied for this job.');
        }

        $request->validate([
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $job->id,
            'resume' => $resumePath,
        ]);

        return redirect()->route('candidate.dashboard')->with('success', 'Application submitted successfully.');
    }

    public function cancel($id)
    {
        $application = Application::where('user_id', auth()->id())->findOrFail($id);
        $application->delete();

        return back()->with('success', 'Application cancelled successfully.');
    }

    public function show($id)
{
    $job = Job::where('status', 'approved')->findOrFail($id);
    return view('jobs.show', compact('job'));
}

}
