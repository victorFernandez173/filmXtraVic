<?php

namespace App\Http\Controllers;

use App\Models\Like;
use DB;
use Exception;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Da o quita like
     * @param Request $request
     * @return bool
     * @throws Exception
     */
    public function darLike(Request $request): void
    {
        $like = new Like([
            'user_id' => $request['user_id'],
            'critica_id' => $request['critica_id'],
            ]);
        if(DB::table('likes')->where('user_id', $like['user_id'])->where('critica_id', $like['critica_id'])->exists()){
            DB::table('likes')->where('user_id', $like['user_id'])->where('critica_id', $like['critica_id'])->delete();
        } else {
            $like->save();
        }
    }
}
