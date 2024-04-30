<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Exception;

class BienvenidaController extends Controller
{
    /**
     * Genera un array con 16 ids al azar
     * @throws Exception
     */
    public function obtenerDoceObrasAleatorias(){
        $numPeliculas = DB::table('obras')->count();
        $peliculasId = [];
        for($i = 0; $i < 16; $i++){
            $aleatorio = random_int(1, $numPeliculas);
            while(in_array($aleatorio, $peliculasId)){
                $aleatorio = random_int(1, $numPeliculas);
            }
            $peliculasId[] = $aleatorio;
        }
        return $peliculasId;
    }

    /**
     * Devuelve la vista de bienvenida con esos 16 id
     * @throws Exception
     */
    public function bienvenida(){
        return Inertia::render('Welcome', [
            'obras' => DB::table('obras')->select('obras.titulo', 'p.ruta', 'p.alt')->join('posters AS p', 'obras.id', '=', 'p.obra_id')->whereIn('obras.id', $this->obtenerDoceObrasAleatorias())->get()
        ]);
    }

    /**
     * Devuelve la vista de bienvenida con esos 16 id
     * @throws Exception
     */
    public function buscarTitulo(Request $request){

        $obras = DB::table('obras')->select('obras.titulo', 'p.ruta', 'p.alt')->join('posters AS p', 'obras.id', '=', 'p.obra_id')->where('obras.titulo', 'like', '%' . $request['titulo'] . '%')->get();

        if($request['titulo'] == null || count($obras) == 0){
            return Inertia::render('Welcome', [
                'obras' => DB::table('obras')->select('obras.titulo', 'p.ruta', 'p.alt')->join('posters AS p', 'obras.id', '=', 'p.obra_id')->whereIn('obras.id', $this->obtenerDoceObrasAleatorias())->get(),
                'numResultados' => 0
            ]);
        }
        return Inertia::render('Welcome', [
            'obras' => $obras,
            'numResultados' => count($obras)
        ]);

    }
}
