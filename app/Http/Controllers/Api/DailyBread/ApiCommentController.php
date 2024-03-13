<?php

namespace App\Http\Controllers\Api\DailyBread;

use App\Http\Controllers\Controller;
use App\Models\DailyBread;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    public function store(Request $request,DailyBread $dailyBread)
    {
        $dailyBread->loadCount("comments");
        //je recupère l'utilisateur qui effectue le post
        $userId = $request->input("user_id",auth("web")->id());

        if ($userId!=null){
            $dailyBread->comments()->create([
                'user_id'=>$userId,
                'comment'=>$request->input('comment')
            ]);
        }

        return response()->json([
            'message'=>'comment-success',
            "comments_count"=>$dailyBread->comments_count
        ]);
    }
}
