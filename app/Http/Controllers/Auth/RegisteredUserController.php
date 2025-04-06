<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\EmailVerificationService;
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
     * Display the registration view.
     */
    public function create(): View
    {
        return view('website.sign-up');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $emailVerificationService = new EmailVerificationService();
        $validated = $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'profile_image' => ['nullable', 'file', 'mimes:jpeg,jpg,png,webp'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $imagePath = 'users/profile_images/' . $profileImageName;
            $profileImage->move(public_path('users/profile_images'), $profileImageName);
            $validated['profile_image'] = $imagePath;
        }
        $user = User::create([
            'name_en' => $validated['name_en'],
            'name_ar' => $validated['name_ar'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'profile_image' => $validated['profile_image'] ?? null,
            'last_login_at' => null,
            'role' => 'user',
            'password' => Hash::make($validated['password']),
        ]);
        if ($user) {
            $verificationCode = $emailVerificationService->generateVerificationCode($user->email);
            if ($verificationCode) {
                $emailVerificationService->sendVerificationEmail($user);
            }
        }
        Auth::login($user);
        return redirect()->route('verification.form');
    }
}
