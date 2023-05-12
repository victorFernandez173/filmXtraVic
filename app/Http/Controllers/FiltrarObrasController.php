<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiltrarPostRequest;
use App\Models\Genero;
use App\Models\Obra;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class FiltrarObrasController extends Controller
{
    /**
     * Peticiones GET: carga inicial o enlaces de filtrado de la barra lateral
     * @throws Exception
     * @return Response
     */
    public function cargaDatos(): Response
    {
        $obras = null;
        $titulo = null;
        /* Con la visita inicial, todas las obras */
        if (count(request()->all()) == 0 || (count(request()->all()) == 1 && request()->has('page'))) {
            $obras = Obra::with('poster')->paginate(12);
        } else {
            /*Si se envían peticiones se filtran resultados y título según parámetro*/
            if (request()->has('genero')) {
                $genero = Genero::select('genero')->where('genero', 'LIKE', request('genero'))->get();
                $titulo = 'Género: ' . $genero[0]['genero'];
                $obras = Obra::with('poster', 'generos')->whereHas('generos', function (Builder $query) {
                    $query->where('genero', 'like', '%' . request('genero') . '%');
                })->paginate(12)->withQueryString();
            } else if (request()->has('fecha')) {
                $obras = Obra::with('poster')->where('fecha', 'like', request('fecha'))->paginate(12)->withQueryString();
                $titulo = 'Década: ' . str_replace('_', '0', request('fecha')) . 's';
            } else if (request()->has('pais')) {
                $obras = Obra::with('poster')->where('pais', 'like', request('pais'))->paginate(12)->withQueryString();
                $titulo = 'País: ' . $obras[0]['pais'];
            }
        }
        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => $obras,
            'titulo' => $titulo,
            'generos' => Genero::select('genero')->get(),
            'paises' => Obra::select('pais')->groupBy('pais')->orderBy('pais')->get()
        ]);
    }

    /**
     * Petición post: filtrado según el formulario
     * @param FiltrarPostRequest $request
     * @return Response
     */
    public function formulario(FiltrarPostRequest $request): Response
    {
        // Si no hay 'desde' se asigna valor de los inicios del cine
        $desde = $request['desde'] ?: '1870';
        // Si no hay 'hasta' se asigna año presente
        $hasta = $request['hasta'] ?: Carbon::now()->format('Y');
        // Si no hay pais se asigna valor vacío
        $pais = $request['pais'] ?? '';
        // Si no hay genero se asigna valor vacío
        $genero = $request['genero'] ?? '';

        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => Obra::with('poster')->where(
                'pais', 'like', '%' . $pais . '%')->whereBetween('fecha', [ $desde, $hasta])->whereHas('generos', function(Builder $query) use ($genero) { $query->where('genero', 'like', '%' . $genero . '%'); })->paginate(4),
            'titulo' => 'Resultados del filtrado',
            'generos' => Genero::select('genero')->get(),
            'paises' => Obra::select('pais')->groupBy('pais')->orderBy('pais')->get()
        ]);
    }
}
