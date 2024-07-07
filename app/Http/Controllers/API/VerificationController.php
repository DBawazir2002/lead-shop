<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($id, Request $request) {
        if (!$request->hasValidSignature()) {
            return response()->json([
                "status" => false,
                "message" => "Invalid/Expired url provided"],
                200);
        }

        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return response()->json([
            "status" => true,
            "message" => "Email verified successfully."],
            200);
    }

    public function resend($id) {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                "status" => false,
                "message" => "Email already verified."],
                200);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            "status" => true,
            "message" => "Email verification link sent to your email"],
            200);
    }
}
