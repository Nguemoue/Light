<?php

namespace Database\Seeders;

use App\Models\DailyBread;
use Illuminate\Database\Seeder;

class DailyBreadSeeder extends Seeder
{
    public function run()
    {
        $req = DailyBread::query()
            ->with("mediaHistory")
            ->delete();
        DailyBread::factory(900)->hasComments()
            ->hasLikes(rand(1,2))->hasMediaHistory()->create();
    }
}
