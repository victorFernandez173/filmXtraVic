<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Exception;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ObtenerObraController extends Controller
{
    /**
     * Para devolver la nota media de todas las evaluaciones
     * @param $evaluaciones
     * @return float
     */
    public function calcularMediaEvaluaciones($evaluaciones): float
    {
        $sumatorio = 0;
        foreach ($evaluaciones as $eva){
            $sumatorio += $eva['evaluacion'];
        }
        return round($sumatorio/count($evaluaciones), 1);
    }

    /**
     * Para obtener la información de una obra
     * @throws Exception
     */
    public function fichaPelicula($titulo){
        $titulo = rawurldecode($titulo);
        $obra = Obra::with(['id', 'poster', 'secuelas:saga_id,obra_id,orden', 'criticas', 'directors:nombre,edad,defuncion,pais', 'festivals:obra_id,nombre,edicion', 'profesionals:obra_id,medio_id,autor,web,contenido', 'evaluaciones:obra_id,user_id,evaluacion', 'actors:nombre,nombre_real,edad,defuncion,pais', 'generos:genero'])->where('titulo', '=', "$titulo")->get();
        $media = $this->calcularMediaEvaluaciones($obra[0]['evaluaciones']);

        return Inertia::render('Obra', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obra' => $obra,
            'mediaEvaluaciones' => $media,
            ]);
    }
}
