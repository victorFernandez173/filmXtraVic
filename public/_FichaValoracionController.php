<?php

namespace App\Http\Controllers;

use App\Models\Critica;
use App\Models\Evaluacion;
use Exception;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class FichaValoracionController extends Controller
{
    /**
     * Para cargar la ficha de valoración con la info necesaria, aprovecha métodos de InfoControler.php
     * @throws Exception
     */
    public function obtenerFichaValoracion($titulo): Response
    {
        $titulo = rawurldecode($titulo);
        // Obtenemos datos genéricos de la obra
        $obra = InfoController::obtenerDatosObra($titulo);

        $usuarioLogueado = null;
        $evaluacionDelUsuario = -1;
        $criticaDelUsuario = -1;
        //  Obtenemos la evaluación y la crítica si hay usuario logueado
        if(isset(request()->user()->id)){
            $usuarioLogueado = request()->user()->id;
            if(Evaluacion::where('user_id', $usuarioLogueado)->where('obra_id', $obra[0]['id'])->exists()){
                $evaluacionDelUsuario = Evaluacion::where('user_id', $usuarioLogueado)->where('obra_id', $obra[0]['id'])->get();
            }
            if(Critica::where('user_id', $usuarioLogueado)->where('obra_id', $obra[0]['id'])->exists()){
                $criticaDelUsuario = Critica::where('user_id', $usuarioLogueado)->where('obra_id', $obra[0]['id'])->get();
            }
        }

        // Renderizamos la vista pasandole la información de la obra y otros props para el manejo de datos
        return Inertia::render('FichaValoraciones', [
            'obra' => $obra,
            // Para generar la nota media de la película
            'mediaEvaluaciones' => InfoController::calcularMediaEvaluaciones($obra[0]['evaluaciones']),
            // Paginación, organización y mostrado de las críticas
            'criticas' => InfoController::obtenerArrayInfoCriticas($obra[0]['criticas']),
            // Criticas relacionadas con esta película
            'pelicula_criticas' => DB::table('criticas')->select('user_id', 'obra_id', 'critica')->join('obras', 'obras.id', '=', 'obra_id')->where('titulo', $titulo)->get(),
            // Evaluaciones relacionadas con esta película
            'pelicula_evaluaciones' => DB::table('evaluaciones')->select('evaluaciones.id', 'user_id', 'obra_id', 'evaluacion')->join('obras', 'obras.id', '=', 'obra_id')->where('titulo', $titulo)->get(),
            //Numero de gifs disponibles en public/gif
            'nGifs' => count(glob( public_path('/gif/') . '*')) - 2,
            // Evaluación del usuario
            'evaluacionDelUsuario' =>  $evaluacionDelUsuario,
            'criticaDelUsuario' => $criticaDelUsuario
        ]);
    }
}
