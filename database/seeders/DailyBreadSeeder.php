<?php

namespace Database\Seeders;

use App\Models\DailyBread;
use Illuminate\Database\Seeder;

class DailyBreadSeeder extends Seeder
{
    public function run()
    {
        DailyBread::query()->delete();
        DailyBread::factory(20)->create();
    }
}
