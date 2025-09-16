<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    
   public function edit(Request $request): View
{
    $user = $request->user();

    if ($user->role === 'admin') {
        return view('profile.admin', ['user' => $user]);
    } elseif ($user->role === 'employer') {
        $applications = \App\Models\Application::whereHas('job', function($q) use ($user) {
    $q->where('employer_id', $user->id);
})
->where('status', 'pending')
->with(['candidate', 'job'])
->latest()
->paginate(5);

        return view('profile.employer', [
            'user' => $user,
            'applications' => $applications,
        ]);
    } elseif ($user->role === 'candidate') {
        $applications = $user->applications()->with('job')->latest()->paginate(5);

        return view('profile.candidate', [
            'user' => $user,
            'applications' => $applications,
        ]);
    }
    
    abort(403, 'Unauthorized');
}





    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profile()
{
    $user = auth()->user(); 

    $applications = $user->applications()
        ->with('job')
        ->latest()
        ->paginate(5);

    return view('profile.candidate', compact('user', 'applications'));
}


public function employerProfile()
{
    $applications = Application::whereHas('job', function($query) {
        $query->where('employer_id', auth()->id());
    })->with(['candidate', 'job'])
      ->orderBy('created_at', 'desc')
      ->paginate(5);

    $user = auth()->user();

    return view('profile.employer', compact('applications', 'user'));
}




}
