<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseCategory extends Model
{
    protected $fillable = [
        'expense_category_group_id',
        'name',
        'sort',
    ];

    public function group()
    {
        return $this->belongsTo(ExpenseCategoryGroup::class, 'expense_category_group_id');
    }

    public function expensePlans()
    {
        return $this->hasMany(ExpensePlan::class);
    }

    public function expenseFacts()
    {
        return $this->hasMany(ExpenseFact::class);
    }
}
