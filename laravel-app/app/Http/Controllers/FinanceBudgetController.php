<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinanceBudgetRequest;
use App\Http\Resources\FinanceBudgetResource;
use App\Models\FinanceBudget;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FinanceBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): FinanceBudgetResource
    {
        $filters = $request->validate([
            'month' => ['sometimes', 'date_format:Y-m'],
            'unit' => ['sometimes', Rule::in(array_merge(['Semua Unit'], config('finance.units', [])))],
        ]);

        $month = $filters['month'] ?? now()->format('Y-m');
        $unit = $filters['unit'] ?? 'Semua Unit';
        $budget = FinanceBudget::query()->firstOrNew(['month' => $month, 'unit' => $unit]);

        if (! $budget->exists) {
            $budget->amount = (int) config('finance.default_budgets.'.$unit, 0);
        }

        return new FinanceBudgetResource($budget);
    }

    public function update(FinanceBudgetRequest $request): FinanceBudgetResource
    {
        return $this->saveBudget($request);
    }

    private function saveBudget(FinanceBudgetRequest $request): FinanceBudgetResource
    {
        $data = $request->validated();
        $budget = FinanceBudget::query()->updateOrCreate(
            ['month' => $data['month'], 'unit' => $data['unit']],
            ['amount' => $data['amount']],
        );

        return new FinanceBudgetResource($budget->refresh());
    }
}
