<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;

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
        } catch(Exception $e) {
            return redirect('/login');
        }

        if ($userExist) {
            Auth::login($userExist);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'password' => Hash::make($user->id),
                'email_verified_at' => Date::now()
            ]);
            // TODO enviar email/sms al loguearse
            //$newUser->sendEmailPassword();

            Auth::login($newUser);
        }
        // TODO redigir a la url de origen, quizas con SESSION ya que previous no rula
        return redirect('/');
    }
}
