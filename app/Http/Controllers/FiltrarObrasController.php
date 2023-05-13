<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioObrasRequest;
use App\Models\Obra;
use Carbon\Carbon;
use DB;
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

        // Si no hay 'desde' se asigna valor de los inicios del cine
        $desde = request('desde') ?: '1870';
        // Si no hay 'hasta' se asigna año presente
        $hasta = request('hasta') ?: Carbon::now()->format('Y');
        // Si no hay pais se asigna valor vacío
        $pais = request('pais') ?? '';
        // Si no hay genero se asigna valor vacío
        $genero = request('genero') ?? '';


        // Consulta a BBDD en funcion de parametros GET
        if (count(request()->all()) == 0 || (count(request()->all()) == 1 && request()->has('page'))) {
            $obras = Obra::with('poster')->paginate(4)->withQueryString();
        } else {
            $obras = Obra::with('poster')->where(
                'pais', 'like', '%' . $pais . '%')->whereBetween('fecha', [ $desde, $hasta])->whereHas('generos', function(Builder $query) use ($genero) { $query->where('genero', 'like', '%' . $genero . '%'); })->paginate(2)->withQueryString();
        }

        // Titulo
        $titulo = 'Todas las obras';
        // Si la consulta no da resultados
        if (count($obras) == 0) {
            $titulo = 'Sin Resultados';
        } else {
            // La consulta da >1 resultado
            if(request()->has('barraLateral')) {
                // Cuando la petición es de la barra lateral
                if (request('barraLateral') === 'genero') {
                    $titulo = 'Género: ' . request('genero');
                } else if (request('barraLateral') === 'pais') {
                    $titulo = 'País: ' . request('pais');
                } else if (request('barraLateral') === 'decada') {
                    $titulo = 'Década: ' . request('desde') . 's';
                }
            }
            // Se ha utilizado el formulario
            if (request()->has('sent') && count($obras) >= 1 && !request()->has('barraLateral')) {
                $titulo = 'Resultados: ';
            }
        }

        return Inertia::render('Obras', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'obras' => $obras,
            'titulo' => $titulo,
            'generos' => DB::table('generos')->select('genero')->get(),
            'paises' => DB::table('obras')->select('pais')->groupBy('pais')->orderBy('pais')->get()
        ]);
    }
}
