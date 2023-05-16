<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use LaravelIdea\Helper\App\Models\_IH_Obra_C;
use LaravelIdea\Helper\App\Models\_IH_Obra_QB;

class ObtenerObraController extends Controller
{
    /**
     * Para devolver la nota media de todas las evaluaciones, devuelve 0 si no hay evaluaciones
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

    /**
     * Para obtener la secuela/precuela si las hubiera
     * @param $obra
     * @return array|null
     */
     public function obtenerSecuelaPrecuela($obra){
         // Si es una secuela esta obra
        if(isset($obra[0]['secuelas'])){
            // Obtenemos su orden en la saga
            $orden = $obra[0]['secuelas']['orden'];
            $secuelaPrecuela = array();
            // Obtenemos las array con las pelis de la saga
            $secuelas = DB::table('secuelas')->select('saga_id', 'obra_id', 'orden')->where('saga_id', '=', $obra[0]['secuelas']['saga_id'])->get();
            //proceso el array $secuelas para orden + 1 (secuela) y orden - 1 (precuela)
            foreach ($secuelas as $secuela){
                if(($orden - 1)  == $secuela->orden || ($orden + 1) == $secuela->orden ){
                    array_push($secuelaPrecuela, $secuela->obra_id);
                }
            }
            return Obra::with('poster')->find($secuelaPrecuela);
        }
        return null;
    }

    /**
     * Para obtener los datos iniciales de la obra con relaciones
     * @param $titulo
     * @return Obra[]|Builder[]|\Illuminate\Database\Eloquent\Collection|_IH_Obra_C|_IH_Obra_QB[]
     */
    public function obtenerDatosObra($titulo){
        return Obra::with(['poster', 'secuelas:saga_id,obra_id,orden', 'criticas', 'directors:nombre,edad,defuncion,pais', 'festivals:obra_id,nombre,edicion', 'profesionals:obra_id,medio_id,autor,contenido', 'evaluaciones:obra_id,user_id,evaluacion', 'actors:nombre,nombre_real,edad,defuncion,pais', 'generos:genero'])->where('titulo', '=', "$titulo")->get();
    }


    /**
     * Se organizan y recopilan todos los datos necesarios para pasar a la ficha de película
     * @throws Exception
     */
    public function fichaPelicula($titulo){
        $titulo = rawurldecode($titulo);
        $obra = $this->obtenerDatosObra($titulo);
        $media = $this->calcularMediaEvaluaciones($obra[0]['evaluaciones']);
        $criticasLikes = $this->obtenerArrayInfoCriticas($obra[0]['criticas']);
        $saga = $this->obtenerSaga($obra[0]['secuelas']);
        $secuelaPrecuela = $this->obtenerSecuelaPrecuela($obra);

        return Inertia::render('Obra', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obra' => $obra,
            'mediaEvaluaciones' => $media,
            'criticas' => $criticasLikes,
            'saga' => $saga,
            'secuelaPrecuela' => $secuelaPrecuela,
            ]);
    }
}
