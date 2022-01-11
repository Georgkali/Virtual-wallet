<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wallet_id' => $this->faker->numberBetween(0, 10000),
            'type' => ['+', '-'][rand(0,1)],
            'value' => $this->faker->numberBetween(0, 10000)
        ];
    }
}
