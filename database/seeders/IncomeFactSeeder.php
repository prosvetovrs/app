<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\IncomePlan;
use App\Models\IncomeFact;
use App\Models\ExpenseFact;
use App\Models\ExpenseCategory;

class IncomeFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $incomePlans = IncomePlan::where('user_id', $user->id)->get();

        // Income facts
        foreach ($incomePlans as $plan) {
            IncomeFact::create([
                'user_id' => $user->id,
                'income_category_id' => $plan->income_category_id,
                'amount' => $plan->amount * rand(90, 110) / 100,
                'date' => $plan->date,
            ]);
        }
    }
}
