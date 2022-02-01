<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('verified', true)->inRandomOrder()->first();

        return [
            'brand' => $this->faker->randomElement(['honda', 'toyota', 'mazda']),
            'build' => $this->faker->randomElement(['sedan', 'suv', 'hatchbacks']),
            'year' => $this->faker->randomElement([2012, 2015, 2017]),
            'mode' => $this->faker->randomElement(['manual', 'auto']),
            'geolocation' => $this->faker->randomElement(['selangor', 'kl', 'penang', 'johor']),
            'price' => $this->faker->randomElement([300, 210, 450]),
            'user_id' => $user->id,
        ];
    }
}
