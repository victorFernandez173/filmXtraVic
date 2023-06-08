<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\EmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Notification;

class SocialAuthController extends Controller
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
            $userExist = User::where('google_id', $user->id)->first();
        } catch(\Exception $e) {
            return redirect('/login');
        }



        if ($userExist) {
            Auth::login($userExist);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make($user->id),
                'email_verified_at' => Date::now()
            ]);
           //$newUser->sendEmailPassword();

            Auth::login($newUser);
        }
        // TODO redigir a la url de origen, quizas con SESSION ya que previous no rula
        return redirect('/');
    }
}
