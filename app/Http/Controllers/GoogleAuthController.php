<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google callback
    public function callbackGoogle()
    {
        try {
            // Get the Google user
            $googleUser = Socialite::driver('google')->user();

            // Find user by Google ID
            $user = User::where('google_id', $googleUser->getId())->first();

            // If user does not exist by Google ID, check by email
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();

                // If user exists by email, update their Google ID
                if ($user) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                } else {
                    // If no user exists by email, create a new one
                    $user = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                    ]);
                }
            }

            // Log the user in
            Auth::login($user);

            // Redirect to the dashboard
            return redirect()->intended('dashboard');

        } catch (\Throwable $th) {
            // Handle any errors and show the message
            return redirect('/login')->withErrors(['msg' => 'Something went wrong: ' . $th->getMessage()]);
        }
    }
}