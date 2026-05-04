<?php

namespace App\Services;

use App\DTOs\ExpenseCategoryGroupCreationDTO;
use App\Models\ExpenseCategoryGroup;
use App\Repositories\ExpenseCategoryGroupRepository;
use Illuminate\Http\JsonResponse;

class ExpenseCategoryGroupService
{

    public function __construct(
        private readonly ExpenseCategoryGroupRepository $expenseCategoryGroupRepository
    )
    {
    }

    public function create(ExpenseCategoryGroupCreationDTO $expenseCategoryGroupDTO): ExpenseCategoryGroup
    {
        return $this->expenseCategoryGroupRepository->create($expenseCategoryGroupDTO);
    }
}
