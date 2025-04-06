<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showVerificationCode(Request $request)
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'code.*' => 'required|size:1',
        ]);

        $verificationCode = implode('', $request->code);

        $user = User::where('verification_code', $verificationCode)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid verification code.');
        }

        $user->email_verified_at = now();
        $user->is_active = 1;
        $user->verification_code = null;
        $user->save();

        if (!auth()->check()) {
            auth()->login($user);
        }

        return redirect()->route('index')->with('success', 'Your email has been verified successfully! Welcome to D-Seven Store.');
    }
}
