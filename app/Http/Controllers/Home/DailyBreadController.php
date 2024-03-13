<?php

namespace App\Http\Controllers\Home;

use App\Casts\FormatedDateCast;
use App\Http\Controllers\Controller;
use App\Models\DailyBread;
use Inertia\Inertia;

class DailyBreadController extends Controller
{
    public function index()
    {
        $dailyBreads = DailyBread::query()
            ->with("comments")->withCount("comments","likes")
            ->withCasts(['created_at' => FormatedDateCast::class])
            ->get(['id','title',"description","poster_url"]);
        return Inertia::render("Home/DailyBread/IndexDailyBread",[
           'dailyBreads'=>$dailyBreads
        ]);
    }

    public function show(DailyBread $dailyBread){
        $dailyBread->loadMissing("comments","comments.user")
            ->loadCount("comments");
        //$dailyBread->comments_count = convertNumberToNomenclature($dailyBread->comments_count);
        return \inertia("Home/DailyBread/ShowDailyBread",[
            'dailyBread'=>$dailyBread
        ]);
    }
}
