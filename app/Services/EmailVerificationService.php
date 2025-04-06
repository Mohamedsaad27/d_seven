<?php

namespace App\Services;

use App\Mail\EmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class EmailVerificationService
{
    public function sendVerificationEmail($user)
    {
        Mail::to($user->email)->send(new EmailVerification($user));
    }

    public function generateVerificationCode($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->update([
                'verification_code' => null
            ]);
            $code = rand(10000, 99999);
            $user->update([
                'verification_code' => $code,
                'is_active' => false
            ]);
            return $code;
        }
        return false;
    }
}
