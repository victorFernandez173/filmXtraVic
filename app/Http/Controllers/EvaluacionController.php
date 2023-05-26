<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;

class EvaluacionController extends Controller
{
    public function evaluar(){
       /*
        // Si el like ya existe, se elimina
        if (DB::table('likes')->where('user_id', $like['user_id'])->where('critica_id', $like['critica_id'])->exists()) {
            DB::table('likes')->where('user_id', $like['user_id'])->where('critica_id', $like['critica_id'])->delete();
        } else {
            // Sino, se guarda
            $like->save();*/
        $evaluacion = new Evaluacion([
            'user_id' => request('user_id'),
            'obra_id' => request('obra_id'),
            'evaluacion' => request('notaEvaluacion')
        ]);

        if(DB::table('evaluaciones')->where()->where()->where()->exists()){
            // Si la evaluación ya existía, se modifica
        } else {
            // Sino, se guarda
        }
    }
}
