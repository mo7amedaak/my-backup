<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * عرض صفحة التسجيل
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * حفظ بيانات المستخدم الجديد
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:20', 'unique:users,mobile'],
            'email'  => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'gender' => ['nullable', 'in:male,female'],
            'dob'    => ['nullable', 'date'],
            'role'   => ['in:admin,patient'], // هتسجل يا أدمن أو مريض
            'medical_insurance' => ['boolean'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'              => $request->name,
            'mobile'            => $request->mobile,
            'email'             => $request->email,
            'gender'            => $request->gender,
            'dob'               => $request->dob,
            'role'              => $request->role ?? 'patient',
            'medical_insurance' => $request->medical_insurance ?? false,
            'password'          => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // يدخل على حسب الرول
        return $user->role === 'admin'
            ? redirect()->route('dashboard.admin')
            : redirect()->route('dashboard.patient');
    }
}
