<?php

namespace Database\Seeders;

use App\Models\FinanceBudget;
use Illuminate\Database\Seeder;

class FinanceBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        foreach (config('finance.default_budgets') as $unit => $amount) {
            FinanceBudget::query()->updateOrCreate(
                ['month' => now()->format('Y-m'), 'unit' => $unit],
                ['amount' => $amount],
            );
        }
    }
}
