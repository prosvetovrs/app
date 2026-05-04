<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExpenseCategoryGroup;
use App\Models\ExpenseCategory;
use App\Models\IncomeCategory;
use App\Models\User;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $structure = [
            'Основные' => ['Продукты', 'Аптека', 'Бытовые товары'],
            'Жильё' => ['Аренда / Ипотека', 'Коммуналка', 'Интернет'],
            'Кредиты' => ['Кредитная карта', 'Потребительский кредит'],
            'Транспорт' => ['Бензин', 'Такси'],
            'Развлечения' => ['Кафе', 'Подписки', 'Спорт'],
        ];

        foreach ($structure as $groupName => $categories) {

            $group = ExpenseCategoryGroup::create([
                'user_id' => $user->id,
                'name' => $groupName,
            ]);

            foreach ($categories as $cat) {
                ExpenseCategory::create([
                    'expense_category_group_id' => $group->id,
                    'name' => $cat,
                ]);
            }
        }
    }
}
