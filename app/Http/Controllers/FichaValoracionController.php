<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class FichaValoracionController extends Controller
{
    public function obtenerFichaValoracion(): Response
    {
        return Inertia::render('FichaValoraciones');
    }
}
