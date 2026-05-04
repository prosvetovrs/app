<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseFacts extends Model
{
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
