<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Obra;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class FiltrarObrasController extends Controller
{
    const especiales = ['URRS'];

    /**
     * Para obtener la información de una obra
     * @throws Exception
     * @return Response
     */
    public function cargaDatos(): Response
    {
        $obras = null;
        $titulo = null;
        if (count(request()->all()) == 0) {
            $obras = Obra::with('poster')->get();
        } else {
            if (request()->has('genero')) {
                $genero = Genero::select('genero')->where('genero', 'LIKE', request('genero'))->get();
                $titulo = 'Género: ' . $genero[0]['genero'];
                $obras = Obra::with('poster', 'generos')->whereHas('generos', function (Builder $query) {
                    $query->where('genero', 'like', '%' . request('genero') . '%');
                })->get()->toArray();
            } else if (request()->has('fecha')) {
                $obras = Obra::with('poster')->where('fecha', 'like', request('fecha'))->get();
                $titulo = 'Década: ' . str_replace('_', '0', request('fecha')) . 's';
            } else if (request()->has('pais')) {
                $obras = Obra::with('poster')->where('pais', 'like', request('pais'))->get();
                $titulo = 'País: ' . $this->capitalizar($obras[0]['pais']);
            }
        }
        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => $obras,
            'titulo' => $titulo,
            'generos' => Genero::select('genero')->get(),
            'paises' => Obra::select('pais')->groupBy('pais')->get()
        ]);
    }

    /**
     * Para obtener la informacion del formulario
     * @throws Exception
     * @return Response
     */
    public function formulario(): Response
    {
        if (request()->has('desde') && request('desde') == '') {
            ddd('contiene genero');
        }
        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => 'array con pelis',
            'titulo' => 'Forulario de filtrado',
            'generos' => Genero::select('genero')->get(),
            'paises' => Obra::select('pais')->groupBy('pais')->get()
        ]);
    }

    /**
     *Para poner en mayúsculas solo las iniciales
     *
     * @param $pais
     * @return String
     */
    public function capitalizar($pais): String
    {
        $paisArr = explode(' ', $pais);
        if(!in_array($paisArr[0], self::especiales)){
            for ($i = 0; $i < count($paisArr); $i++) {
                $paisArr[$i] = substr($paisArr[$i], 0, 1) . mb_strtolower(substr($paisArr[$i], 1));
            }
        }
        return implode(' ', $paisArr);
    }
}
