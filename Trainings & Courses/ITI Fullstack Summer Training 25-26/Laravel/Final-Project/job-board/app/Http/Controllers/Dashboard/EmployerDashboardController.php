<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::where('employer_id', auth()->id())->paginate(5);
        $notifications = auth()->user()->unreadNotifications;

        return view('dashboard.employerDashboard', compact('jobs', 'notifications'));    }
}

