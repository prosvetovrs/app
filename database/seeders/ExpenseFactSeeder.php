<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ExpenseFact;
use App\Models\ExpenseCategory;
use Carbon\Carbon;

class ExpenseFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $categories = ExpenseCategory::all();

        // Период — 3 месяца
        $start = Carbon::parse('2026-04-01');
        $end = Carbon::parse('2026-06-30');

        // Количество транзакций
        $transactionsCount = rand(60, 90);

        for ($i = 0; $i < $transactionsCount; $i++) {

            $category = $categories->random();

            // случайная дата в диапазоне
            $date = Carbon::createFromTimestamp(
                rand($start->timestamp, $end->timestamp)
            );

            // логика сумм (чтобы было реалистично)
            $amount = match (true) {
                str_contains($category->name, 'Ипотека') => rand(25000, 35000),
                str_contains($category->name, 'Коммуналка') => rand(3000, 8000),
                str_contains($category->name, 'Продукты') => rand(3000, 12000),
                str_contains($category->name, 'Кафе') => rand(500, 3000),
                default => rand(1000, 10000),
            };

            ExpenseFact::create([
                'user_id' => $user->id,
                'expense_category_id' => $category->id,
                'amount' => $amount,
                'date' => $date,
            ]);
        }
    }
}
