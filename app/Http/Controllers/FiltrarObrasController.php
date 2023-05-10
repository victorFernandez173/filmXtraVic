<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class FiltrarObrasController extends Controller
{
    /**
     * Para obtener la información de una obra
     * @throws Exception
     */
    public function cargaDatos(){
        $obras = null;
        $titulo = null;
        if(count(request()->all()) == 0){
            $obras = Obra::with('poster')->get();
        } else {
            if(request()->has('genero')){
                $titulo = 'Género: ' . request('genero');
                $obras = Obra::with('poster', 'generos') ->whereHas('generos', function (Builder $query) { $query->where('genero', 'like', '%'. request('genero') .'%');})->get()->toArray();
            } else if (request()->has('fecha')){
                $titulo = 'Década de los: ' . request('fecha');
                $obras = Obra::with('poster')->where('fecha', 'like', request('fecha'))->get();
            } else if (request()->has('pais')){
                $titulo = 'País: ' . request('pais');
                $obras = Obra::with('poster')->where('pais', 'like', request('pais'))->get();
            }
        }
        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => $obras,
            'titulo' => $titulo]);
    }
}
