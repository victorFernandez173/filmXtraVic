<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\GoogleLogin;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Log;
use Mail;

class GithubAuthController extends Controller
{
    /**
     * Redirect the user to the Github authentication page
     *
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleCallback(): RedirectResponse
    {
        try{
            $user = Socialite::driver('github')->user();
            $userExist = User::where('social_id', $user->id)->where('social_type', '=', 'github')->first();

            if ($userExist) {
                Auth::login($userExist);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'github',
                    'password' => Hash::make($user->id),
                    'email_verified_at' => Date::now()
                ]);
                Mail::to($user->email)->send(new GoogleLogin($newUser));

                Auth::login($newUser);
            }
        } catch(Exception $e) {
            Log::info($e->getMessage());
        }

        // TODO logueo github, hay que borrar el token en github si quieres que vuelva a pedirte elegir cuenta, también hay que
        // TODO globalizar el nombre del objeto mailable que se envía 'GoogleLogin'
        // TODO usar el video para refactorizar y acortar el codigo (firstOrCreate)
        // TODO redigir a la url de origen, quizas con SESSION ya que previous no rula
        // TODO tener en cuenta que si una persona accede con google y tambien github y el correo es el mismo, debería dar error ya que el correo ha de ser unique??
        // TODO on delete cascade for users, etc ...
        // TODO estudiar redirecciones on login in/out & register
        return redirect('/');
    }
}
