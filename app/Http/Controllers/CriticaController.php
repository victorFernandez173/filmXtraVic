<?php

namespace App\Http\Controllers;

use App\Models\Critica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriticaController extends Controller
{

    public function criticar(Request $request){

        $validated = $request->validate([
            'critica' => 'required|min:10|max:5000',
        ], ['critica.required' => 'No has escrito nada.',
            'critica.min' => 'Al menos da alguna razón',
            'critica.max' => 'No puedes sobrepasar los 5000 caracteres.']);

        $critica = new Critica([
            'user_id' => $request['user_id'],
            'obra_id' => $request['obra_id'],
            'critica' => $validated['critica']
        ]);

        if(DB::table('criticas')->where('user_id', $critica->user_id)->where('obra_id', $critica->obra_id)->exists()){
            // Si la critica ya existía, se modifica
            $critica->where('user_id', $critica->user_id)->where('obra_id', $critica->obra_id)->update(['critica'=>$critica->critica]);
        } else {
            // Sino, se guarda
            $critica->save();
        }
    }
}
