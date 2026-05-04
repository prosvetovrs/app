<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use App\Models\ExpenseCategoryGroup;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Развлечения',
                'categories' => ['Кино', 'Рестораны', 'Кафе', 'Бары', 'Концерты'],
            ],
            [
                'name' => 'Основные',
                'categories' => ['Продукты'],
            ],
            [
                'name' => 'Кредиты',
                'categories' => ['Ипотека', 'Кредит'],
            ]
        ];

        $userCollection = User::all();

        foreach ($userCollection as $user) {
            $selectedIndices = array_rand($groups, rand(2, count($groups)));
            if (!is_array($selectedIndices)) {
                $selectedIndices = [$selectedIndices];
            }

            foreach ($selectedIndices as $index) {
                $groupData = $groups[$index];

                $group = ExpenseCategoryGroup::create([
                    'name' => $groupData['name'],
                    'users_id' => $user->id,
                    'sort' => rand(0, 1000),
                ]);

                foreach ($groupData['categories'] as $categoryName) {
                    ExpenseCategory::create([
                        'name' => $categoryName,
                        'category_group_id' => $group->id,
                    ]);
                }
            }
        }
    }
}
