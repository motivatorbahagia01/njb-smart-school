<?php

namespace App\Http\Controllers;

use App\Http\Resources\FinanceSummaryResource;
use App\Models\FinanceBudget;
use App\Models\FinanceTransaction;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FinanceDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): FinanceSummaryResource
    {
        $filters = $request->validate([
            'month' => ['sometimes', 'date_format:Y-m'],
            'unit' => ['sometimes', Rule::in(array_merge(['Semua Unit'], config('finance.units', [])))],
        ]);

        $month = $filters['month'] ?? now()->format('Y-m');
        $unit = $filters['unit'] ?? 'Semua Unit';
        $period = $this->transactionsForPeriod($month, $unit);
        $income = (int) (clone $period)->where('type', 'income')->sum('amount');
        $expense = (int) (clone $period)->where('type', 'expense')->sum('amount');
        $budgetValue = FinanceBudget::query()->where('month', $month)->where('unit', $unit)->value('amount');
        $budget = $budgetValue === null
            ? (int) config('finance.default_budgets.'.$unit, 0)
            : (int) $budgetValue;
        $expenseByCategory = $this->transactionsForPeriod($month, $unit)
            ->where('type', 'expense')
            ->selectRaw('category, SUM(amount) as amount')
            ->groupBy('category')
            ->orderByDesc('amount')
            ->get()
            ->map(fn (FinanceTransaction $transaction): array => [
                'category' => $transaction->category,
                'amount' => (int) $transaction->amount,
            ])
            ->values()
            ->all();

        return new FinanceSummaryResource([
            'month' => $month,
            'unit' => $unit,
            'income' => $income,
            'expense' => $expense,
            'net' => $income - $expense,
            'budget' => $budget,
            'budgetRemaining' => $budget - $expense,
            'budgetUsedPercent' => $budget > 0 ? round($expense / $budget * 100, 1) : null,
            'transactionCount' => (clone $period)->count(),
            'expenseByCategory' => $expenseByCategory,
        ]);
    }

    private function transactionsForPeriod(string $month, string $unit): Builder
    {
        $startDate = $month.'-01';
        $endDate = (new DateTimeImmutable($startDate))->modify('+1 month')->format('Y-m-d');

        return FinanceTransaction::query()
            ->where('date', '>=', $startDate)
            ->where('date', '<', $endDate)
            ->when($unit !== 'Semua Unit', fn (Builder $query): Builder => $query->where('unit', $unit));
    }
}
