<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function expenseCategoryGroups(): HasMany
    {
        return $this->hasMany(ExpenseCategoryGroup::class);
    }

    public function incomePlans()
    {
        return $this->hasMany(IncomePlan::class);
    }

    public function incomeFacts()
    {
        return $this->hasMany(IncomeFact::class);
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
