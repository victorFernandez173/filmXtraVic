<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use DB;
use Exception;
use Illuminate\Support\Collection;
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
        if(count($evaluaciones) == 0){
            return 0;
        }
        return round($sumatorio/count($evaluaciones), 1);
    }

    /**
     * Crea un array con el contenido, likes y fecha de cada critica para la vista
     * @param $criticas
     * @return array
     */
    public function obtenerArrayInfoCriticas($criticas){
        $criticasLikes = array();
        foreach ($criticas as $critica){
            array_push($criticasLikes, [
                'critica' => $critica['critica'],
                'likes' => DB::table('likes')->where('critica_id', '=', $critica['id'])->count(),
                'fecha' => $critica['modificada'],
                ]);
        }
        return $criticasLikes;
    }

    /**
     * Para obtener el nombre de la saga si la hay
     * @param $secuelas
     * @return Collection|string
     */
    public function obtenerSaga($secuelas){
        $saga = '';
        if(isset($secuelas['saga_id'])){
            $saga = DB::table('sagas')->select('nombre')->where('id', '=', $secuelas['saga_id'])->get();
        }
        return $saga;
    }

    /* public function obtenerSecuelaPrecuela($secuelas){
        $secuelaPrecuela = array();
        if(isset($secuelas[0])){

        }
    }*/


    /**
     * Para obtener la información de una obra
     * @throws Exception
     */
    public function fichaPelicula($titulo){
        $titulo = rawurldecode($titulo);
        $obra = Obra::with(['poster', 'secuelas:saga_id,obra_id,orden', 'criticas', 'directors:nombre,edad,defuncion,pais', 'festivals:obra_id,nombre,edicion', 'profesionals:obra_id,medio_id,autor,contenido', 'evaluaciones:obra_id,user_id,evaluacion', 'actors:nombre,nombre_real,edad,defuncion,pais', 'generos:genero'])->where('titulo', '=', "$titulo")->get();
        $media = $this->calcularMediaEvaluaciones($obra[0]['evaluaciones']);
        $criticasLikes = $this->obtenerArrayInfoCriticas($obra[0]['criticas']);
        $saga = $this->obtenerSaga($obra[0]['secuelas']);

        return Inertia::render('Obra', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obra' => $obra,
            'mediaEvaluaciones' => $media,
            'criticas' => $criticasLikes,
            'saga' => $saga,
            ]);
    }
}
