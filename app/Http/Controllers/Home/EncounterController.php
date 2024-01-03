<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Encounter;
use Illuminate\Http\Request;

class EncounterController extends Controller
{
    public function index()
    {
        $encounters  = Encounter::all();
        return inertia("Home/Encounter/Index",[
            'encounters'=>$encounters
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Encounter $encounter)
    {
    }

    public function edit(Encounter $encounter)
    {
    }

    public function update(Request $request, Encounter $encounter)
    {
    }

    public function destroy(Encounter $encounter)
    {
    }
}
