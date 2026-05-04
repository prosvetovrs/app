<?php

namespace Database\Factories;

use App\Models\IncomeFact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IncomeFact>
 */
class IncomeFactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 40000, 60000),
            'date' => $this->faker->dateTimeBetween('2026-04-01', '2026-06-30'),
        ];
    }
}
