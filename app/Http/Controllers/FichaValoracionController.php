<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class FichaValoracionController extends Controller
{
    /**
     * Para cargar la vista con la info necesaria, se basa en las funcionalidades de ObtenerObraControler.php
     *
     * @throws Exception
     */
    public function obtenerFichaValoracion($titulo): Response
    {
        $titulo = rawurldecode($titulo);
        $obra = InfoController::obtenerDatosObra($titulo);

        return Inertia::render('FichaValoraciones', [
            'obra' => $obra,
            'mediaEvaluaciones' => InfoController::calcularMediaEvaluaciones($obra[0]['evaluaciones']),
            'criticas' => InfoController::obtenerArrayInfoCriticas($obra[0]['criticas']),
            'pelicula_criticas' => DB::table('criticas')->select('user_id', 'obra_id', 'critica')->join('obras', 'obras.id', '=', 'obra_id')->where('titulo', $titulo)->get(),
        ]);
    }
}
