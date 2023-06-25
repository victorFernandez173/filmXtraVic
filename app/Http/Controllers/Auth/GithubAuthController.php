<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SocialiteLoginMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
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

    /**
     * Log ins the user
     * @return RedirectResponse
     */
    public function handleCallback(): RedirectResponse
    {
        try{
            $userExist = Socialite::driver('github')->user();
            $user = User::firstOrCreate(
                [
                    'social_id' => $userExist->id,
                ],
                [
                    'name' => $userExist->name,
                    'email' => $userExist->email,
                    'social_type' => 'Github',
                    'email_verified_at' => Date::now()
                ]
            );

            Mail::to($user->email)->send(new SocialiteLoginMail($newUser));

            Auth::login($newUser);
        } catch(Exception $e) {
            Log::info($e->getMessage());
        }

        // TODO eventserviceprovider event envio mail registros
        // TODO Manejo de las contraseñas con socialite?
        // TODO tener en cuenta que si una persona accede con google y tambien github y el correo es el mismo, debería dar error ya que el correo ha de ser unique??
        // TODO estudiar redirecciones on login in/out & register
        return redirect('/');
    }
}
