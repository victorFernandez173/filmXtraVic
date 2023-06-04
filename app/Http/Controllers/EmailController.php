<?php

namespace Illuminate\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Mail;

class EmailController extends Controller
{
   
    public function sendPassword (User $user)
    {
        $message = 'Aquí te envíamos tu nueva contraseña por si deseas
        entrar sin Google OAuth' . $user->google_id;
        Mail::to($user->email)->locale($message);
    }


}
