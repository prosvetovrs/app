<?php

namespace Database\Factories;

use App\Models\ExpensePlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ExpensePlan>
 */
class ExpensePlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => null,
            'percent' => $this->faker->randomElement([10, 15, 20, 25]),
        ];
    }
}
