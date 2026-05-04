<?php

namespace App\Repositories;

use App\Models\IncomePlan;
use App\Models\ExpenseFact;
use Illuminate\Support\Collection;

class IncomeRepository
{
    public function getPlans(int $userId, string $from, string $to): Collection
    {
        return IncomePlan::with(['expensePlans.category'])
            ->where('user_id', $userId)
            ->whereBetween('date', [$from, $to])
            ->orderBy('date')
            ->get();
    }
}
