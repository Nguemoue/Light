<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\DailyBread;
use Inertia\Inertia;

class DailyBreadController extends Controller
{
    public function index()
    {
        $dailyBreads = DailyBread::all([
            'id','title',"description","poster_url"
        ]);
        return Inertia::render("Home/DailyBread/IndexDailyBread",[
           'dailyBreads'=>$dailyBreads
        ]);
    }

    public function show(DailyBread $dailyBread){
        return \inertia("Home/DailyBread/ShowDailyBread",[
            'dailyBread'=>$dailyBread
        ]);
    }
}
