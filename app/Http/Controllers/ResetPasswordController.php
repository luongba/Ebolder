<?php

namespace App\Http\Controllers;

use App\models\PasswordReset;
use App\models\User\User;
use App\Notifications\ResetPasswordRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60)
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }

        return redirect(route('reset-password-pending'));
    }

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $user->update([
            "password"=>bcrypt($request->password)
        ]);
        $passwordReset->delete();

        return redirect(route('sign-in'));
    }
}
