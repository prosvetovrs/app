<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\IncomePlan;
use App\Models\ExpenseCategory;
use App\Models\ExpensePlan;

class ExpensePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $incomePlans = IncomePlan::where('user_id', $user->id)->get();
        $categories = ExpenseCategory::all();

        foreach ($incomePlans as $income) {

            foreach ($categories->random(4) as $cat) {

                if (rand(0, 1)) {
                    ExpensePlan::create([
                        'user_id' => $user->id,
                        'income_plan_id' => $income->id,
                        'expense_category_id' => $cat->id,
                        'percent' => rand(10, 30),
                    ]);
                } else {
                    ExpensePlan::create([
                        'user_id' => $user->id,
                        'income_plan_id' => $income->id,
                        'expense_category_id' => $cat->id,
                        'amount' => rand(5000, 30000),
                    ]);
                }
            }
        }
    }
}
