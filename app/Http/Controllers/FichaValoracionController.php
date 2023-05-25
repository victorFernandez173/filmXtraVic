<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class FichaValoracionController extends Controller
{
    public function obtenerFichaValoracion($titulo): Response
    {
        $titulo = rawurldecode($titulo);
        $obra = ObtenerObraController::obtenerDatosObra($titulo);

        return Inertia::render('FichaValoraciones', [
            'obra' => $obra,
            'mediaEvaluaciones' => ObtenerObraController::calcularMediaEvaluaciones($obra[0]['evaluaciones']),
        ]);
    }
}
