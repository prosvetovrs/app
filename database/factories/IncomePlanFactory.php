<?php

namespace Database\Factories;

use App\Models\IncomePlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IncomePlan>
 */
class IncomePlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomElement([45000, 50000, 55000]),
        ];
    }
}
