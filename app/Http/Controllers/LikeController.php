<?php

namespace App\Http\Controllers;

use App\Models\Like;
use DB;
use Exception;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Da o quita Like
     * @throws Exception
     */
    public function darLike(Request $request)
    {
        $like = new Like([
            'user_id' => $request['user_id'],
            'critica_id' => $request['critica_id'],
            ]);
        if(DB::table('likes')->select('*')->where('user_id', $like['user_id'])->where('critica_id', $like['critica_id'])->exists()){
            ddd('YA EXISTE');
        }
        $like->save();
    }
}
