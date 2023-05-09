<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Exception;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class FiltrarObrasController extends Controller
{
    /**
     * Para obtener la información de una obra
     * @throws Exception
     */
    public function cargaInicial(){
        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => Obra::with('poster')->limit(16)->get()]);
    }
}
