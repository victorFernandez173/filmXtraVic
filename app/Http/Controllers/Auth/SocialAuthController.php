<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\EmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Notification;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page
     * 
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(): RedirectResponse
    {
        try{
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e) {
            return redirect('/login');
        }

        $userExist = User::where('google_id', $user->id)->first();

        if ($userExist !== null) {
            Auth::login($userExist);
        }else{
            $newUser = User::create([
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make($user->id),
                'email_verified_at' => Date::now()
            ]);
           $newUser->sendEmailPassword();

            Auth::login($newUser);
        }
        return redirect('/');
    }
}