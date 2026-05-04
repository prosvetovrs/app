<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'income_category_id',
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
        return $this->belongsTo(IncomeCategory::class, 'income_category_id');
    }

    public function expensePlans()
    {
        return $this->hasMany(ExpensePlan::class);
    }
}
