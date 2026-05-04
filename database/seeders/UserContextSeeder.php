<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserContextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        // Категории
        $this->callWith(ExpenseCategorySeeder::class, compact('user'));
        $this->callWith(IncomeCategorySeeder::class, compact('user'));
        // План
        $this->callWith(IncomePlanSeeder::class, compact('user'));
        $this->callWith(ExpensePlanSeeder::class, compact('user'));
        // Факт
        $this->callWith(IncomeFactSeeder::class, compact('user'));
        $this->callWith(ExpenseFactSeeder::class, compact('user'));
    }
}
