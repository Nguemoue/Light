<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LikeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'likeable_id' => $this->faker->randomNumber(),
            'likeable_type' => $this->faker->word(),
            'user_id' => User::pluck("id")->random()??User::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
