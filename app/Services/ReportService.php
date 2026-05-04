<?php

namespace App\Services;
use App\Models\ExpenseCategory;
use App\Repositories\ExpenseRepository;
use App\Repositories\IncomeRepository;
use Carbon\Carbon;

class ReportService
{

    public function __construct(
        private IncomeRepository $incomeRepository,
        private ExpenseRepository $expenseRepository
    )
    {
    }


    public function build(int $userId, string $from, string $to): array
    {
        $incomePlans = $this->incomeRepository
            ->getPlans($userId, $from, $to)
            ->sortBy('date')
            ->values();

        $expenseFacts = $this->expenseRepository
            ->getFacts($userId, $from, $to);

        $result = [];

        foreach ($incomePlans as $index => $income) {

            // предыдущий доход
            $previousIncome = $incomePlans[$index - 1] ?? null;

            $startDate = $previousIncome
                ? Carbon::parse($previousIncome->date)
                : Carbon::parse($from);

            $endDate = Carbon::parse($income->date);

            $monthKey = $endDate->format('Y-m');
            $dateKey = $endDate->format('Y-m-d');

            if (!isset($result[$monthKey])) {
                $result[$monthKey] = [
                    'incomes' => [],
                    'month_total_plan' => 0,
                    'month_total_fact' => 0,
                    'month_income_total' => 0
                ];
            }

            // факты за период (между доходами)
            $factsForPeriod = $expenseFacts->filter(function ($fact) use ($startDate, $endDate) {
                $date = Carbon::parse($fact->date);
                return $date->gte($startDate) && $date->lte($endDate);
            });

            $categoriesData = [];
            $groupsData = []; // для хранения данных по группам
            $periodTotalPlan = 0;
            $periodTotalFact = 0;

            foreach ($income->expensePlans as $plan) {

                $categoryName = $plan->category->name;
                $groupName = $plan->category->group->name ?? 'Без группы'; // предполагаю, что у категории есть связь с группой

                // план
                $planAmount = $plan->amount;

                if (!$planAmount && $plan->percent) {
                    $planAmount = $income->amount * ($plan->percent / 100);
                }

                // факт по категории за период
                $factAmount = $factsForPeriod
                    ->where('expense_category_id', $plan->expense_category_id)
                    ->sum('amount');

                $categoriesData[$categoryName] = [
                    'plan' => round($planAmount, 2),
                    'fact' => round($factAmount, 2),
                    'group' => $groupName
                ];

                // агрегируем по группам
                if (!isset($groupsData[$groupName])) {
                    $groupsData[$groupName] = [
                        'plan' => 0,
                        'fact' => 0,
                        'categories' => []
                    ];
                }

                $groupsData[$groupName]['plan'] += round($planAmount, 2);
                $groupsData[$groupName]['fact'] += round($factAmount, 2);
                $groupsData[$groupName]['categories'][$categoryName] = [
                    'plan' => round($planAmount, 2),
                    'fact' => round($factAmount, 2)
                ];

                $periodTotalPlan += round($planAmount, 2);
                $periodTotalFact += round($factAmount, 2);
            }

            $result[$monthKey]['incomes'][$dateKey] = [
                'income' => $income->amount,
                'categories' => $categoriesData,
                'groups' => $groupsData, // добавляем группы
                'period_total_plan' => $periodTotalPlan,
                'period_total_fact' => $periodTotalFact
            ];

            // накопление итогов по месяцу
            $result[$monthKey]['month_total_plan'] += $periodTotalPlan;
            $result[$monthKey]['month_total_fact'] += $periodTotalFact;
            $result[$monthKey]['month_income_total'] += $income->amount;
        }

        return $result;
    }
}
