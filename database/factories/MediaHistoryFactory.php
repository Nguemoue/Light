<?php

namespace Database\Factories;

use App\Models\Administrator;
use App\Models\MediaHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MediaHistoryFactory extends Factory
{
    protected $model = MediaHistory::class;

    public function definition(): array
    {
        return [
            'administrator_id'=>Administrator::pluck("id")->random(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
