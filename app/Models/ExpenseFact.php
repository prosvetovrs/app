<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseFact extends Model
{
    protected $fillable = [
        'user_id',
        'expense_category_id',
        'amount',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
