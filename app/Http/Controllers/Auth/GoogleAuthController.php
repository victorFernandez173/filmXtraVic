<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SocialiteLoginMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Log;
use Mail;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page
     *
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    public function handleCallback(): RedirectResponse
    {
        try{
            $user = Socialite::driver('google')->user();
            $userExist = User::where('social_id', $user->id)->where('social_type', '=', 'google')->first();

            if ($userExist) {
                Mail::to($user->email)->send(new SocialiteLoginMail($userExist));
                Auth::login($userExist);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'Google',
                    'password' => Hash::make($user->id),
                    'email_verified_at' => Date::now()
                ]);
                Mail::to($user->email)->send(new SocialiteLoginMail($newUser));

                Auth::login($newUser);
            }
        } catch(Exception $e) {
            Log::info($e->getMessage());
        }

        return redirect('/');
    }
}
