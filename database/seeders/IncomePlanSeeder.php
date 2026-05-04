<?php

namespace Database\Seeders;

use App\Models\IncomeCategory;
use App\Models\IncomePlan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $months = ['2026-04', '2026-05', '2026-06'];
        $categories = IncomeCategory::all();

        foreach ($months as $month) {

            foreach (['10', '25'] as $day) {
                IncomePlan::factory()->create([
                    'user_id' => $user->id,
                    'income_category_id' => $categories->random()->id,
                    'date' => "$month-$day",
                    'amount' => 50000,
                ]);
            }
        }
    }

}
