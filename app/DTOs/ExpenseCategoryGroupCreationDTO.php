<?php

namespace App\DTOs;

use App\Models\ExpenseCategoryGroup;

class ExpenseCategoryGroupCreationDTO
{

    public function __construct(
        public int $user_id,
        public string $name,
        public int $sort,
    )
    {
    }


    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'sort' => $this->sort,
        ];
    }

}
