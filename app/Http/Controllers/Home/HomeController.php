<?php

namespace App\Http\Controllers\Home;

use App\Casts\FormatedDateCast;
use App\Http\Controllers\Controller;
use App\Models\DailyBread;
use App\Models\Encounter;
use App\Models\Formation;
use App\Models\MediaHistory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        $dailyBreads = DailyBread::with('comments','likes')
                        ->withCount("comments","likes")
            ->withCasts(['created_at' => FormatedDateCast::class])->get();
        $encounters = Encounter::all();
        $formations = Formation::all();
        //
        $mediaLibraries = MediaHistory::query()->with("media",function ($query){
            $query->withCount("likes");
        })->latest("created_at")->get()->pluck("media");

        return inertia('Home/Home', [
            'medias'=>$mediaLibraries,
            'dailyBreads'=>$dailyBreads,
            "encounters"=>$encounters,
            "formations"=>$formations
        ]);
    }
}
