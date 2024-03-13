<?php

namespace Database\Factories;

use App\Models\DailyBread;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailyBreadFactory extends Factory
{
    protected $model = DailyBread::class;

    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            "description" => fake()->text(800),
            "poster_url" => ""
            //"poster_url" => fake()->image(storage_path("app/public"),1024,400,'human',false),
        ];
    }
}
