<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdministratorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'login' => $this->faker->unique()->password(),
            'password' => bcrypt($this->faker->password()),
            'photo_url' => $this->faker->url(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
