<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpensePlan extends Model
{
    protected $fillable = [
        'user_id',
        'income_plan_id',
        'expense_category_id',
        'amount',
        'percent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomePlan()
    {
        return $this->belongsTo(IncomePlan::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
