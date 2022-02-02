<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $verified = $this->faker->randomElement([true, false]);
        $product_manager = false;
        if ($verified) {
            $product_manager = $this->faker->randomElement([true, false]);
        }

        return [
            'name' => $this->faker->name,
            'verified' => $verified,
            'product_manager' => $product_manager,
        ];
    }
}
