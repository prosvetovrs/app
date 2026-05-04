<?php

namespace App\Http\Controllers;

use App\DTOs\ExpenseCategoryGroupCreationDTO;
use App\Http\Requests\CreateExpenseCategoryGroupRequest;
use App\Models\ExpenseCategoryGroup;
use App\Services\ExpenseCategoryGroupService;
use Illuminate\Http\Request;

class ExpenseCategoryGroupController extends Controller
{
    public function __construct(private ExpenseCategoryGroupService $expenseCategoryGroupService)
    {

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateExpenseCategoryGroupRequest $request)
    {
        $group = $this->expenseCategoryGroupService->create(
            new ExpenseCategoryGroupCreationDTO(
                $request->user_id,
                $request->name,
                $request->sort,
            )
        );

        return response()->json([
            'message' => 'Created successfully',
            'data' => $group
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategoryGroup $expenseCategoryGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategoryGroup $expenseCategoryGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategoryGroup $expenseCategoryGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategoryGroup $expenseCategoryGroup)
    {
        //
    }
}
