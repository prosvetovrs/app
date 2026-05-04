<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    protected $fillable = [
        'name',
        'sort',
    ];

    public function incomePlans()
    {
        return $this->hasMany(IncomePlan::class);
    }

    public function incomeFacts()
    {
        return $this->hasMany(IncomeFact::class);
    }
}
