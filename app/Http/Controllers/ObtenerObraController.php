<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Exception;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ObtenerObraController extends Controller
{
    /**
     * Para obtener la información de una obra
     * @throws Exception
     */
    public function fichaPelicula($titulo){
        $titulo = rawurldecode($titulo);

        return Inertia::render('Obra', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obra' => Obra::with(['poster', 'secuelas:saga_id,obra_id,orden', 'criticas', 'evaluaciones:obra_id,user_id,evaluacion', 'directors:nombre,edad,defuncion,pais', 'festivals:obra_id,nombre,edicion', 'profesionals:obra_id,medio_id,autor,web,contenido', 'actors:nombre,nombre_real,edad,defuncion,pais', 'generos:genero'])->where('titulo', '=', "$titulo")->get()]);
    }
}
