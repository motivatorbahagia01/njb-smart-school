<?php

namespace Database\Factories;

use App\Models\FinanceBudget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FinanceBudget>
 */
class FinanceBudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'month' => now()->format('Y-m'),
            'unit' => fake()->randomElement(array_keys(config('finance.default_budgets'))),
            'amount' => fake()->numberBetween(1_000_000, 60_000_000),
        ];
    }
}
