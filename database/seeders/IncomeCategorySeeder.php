<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\IncomePlan;
use App\Models\IncomeCategory;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $categories=[
            'Зарплата',
            'Аванс'
        ];
        foreach ($categories as $cat) {
            IncomeCategory::create([
                'user_id' => $user->id,
                'name' => $cat,
            ]);
        }
    }
}
