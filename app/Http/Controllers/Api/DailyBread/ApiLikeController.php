<?php

namespace App\Http\Controllers\Api\DailyBread;

use App\Http\Controllers\Controller;
use App\Models\DailyBread;
use Illuminate\Http\Request;

class ApiLikeController extends Controller
{
    public function store(DailyBread $dailyBread, Request $request)
    {
        $userId = $request->input("user_id");
        $msg = config('word.daily_disliked');
        $hasLiked = false;
        if ($userId != null) {
            if ($dailyBread->likes()->whereUserId($userId)->exists()) {
                $dailyBread->likes()->whereUserId($userId)->delete();
                $msg = "unlinked";
            } else {
                $dailyBread->likes()->create([
                    'user_id' => $userId
                ]);
                $hasLiked = true;
                $msg = config('word.daily_liked');
            }
        }
        return response()->json([
            'message' => $msg,
            "likes_count" => $dailyBread->loadCount("likes")->likes_count,
            "hasLike"=>$hasLiked
        ]);
    }
}
