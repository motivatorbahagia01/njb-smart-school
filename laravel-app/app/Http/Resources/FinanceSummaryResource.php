<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinanceSummaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var array<string, mixed> $summary */
        $summary = $this->resource;

        return [
            'month' => $summary['month'],
            'unit' => $summary['unit'],
            'income' => $summary['income'],
            'expense' => $summary['expense'],
            'net' => $summary['net'],
            'budget' => $summary['budget'],
            'budgetRemaining' => $summary['budgetRemaining'],
            'budgetUsedPercent' => $summary['budgetUsedPercent'],
            'transactionCount' => $summary['transactionCount'],
            'expenseByCategory' => $summary['expenseByCategory'],
        ];
    }
}
