<?php

namespace Database\Factories;

use App\Models\ExpenseFact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExpenseFact>
 */
class ExpenseFactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1000, 15000),
            'date' => $this->faker->dateTimeBetween('2026-04-01', '2026-06-30'),
        ];
    }
}
