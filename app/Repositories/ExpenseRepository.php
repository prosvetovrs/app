<?php

namespace App\Repositories;

use App\Models\IncomePlan;
use App\Models\ExpenseFact;
use Illuminate\Support\Collection;

class ExpenseRepository
{
    public function getFacts(int $userId, string $from, string $to): Collection
    {
        return ExpenseFact::with('category')
            ->where('user_id', $userId)
            ->whereBetween('date', [$from, $to])
            ->get();
    }
}
