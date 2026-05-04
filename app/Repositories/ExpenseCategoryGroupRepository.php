<?php

namespace App\Repositories;

use App\DTOs\ExpenseCategoryGroupCreationDTO;
use App\Models\ExpenseCategoryGroup;

class ExpenseCategoryGroupRepository
{

    public function create(ExpenseCategoryGroupCreationDTO $expenseCategoryGroupCreationDTO): ExpenseCategoryGroup
    {
       return ExpenseCategoryGroup::create($expenseCategoryGroupCreationDTO->toArray());
    }
}
