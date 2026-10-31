<?php

namespace Database\Factories;

use App\Models\FinanceTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FinanceTransaction>
 */
class FinanceTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'type' => 'expense',
            'unit' => fake()->randomElement(config('finance.units')),
            'category' => fake()->randomElement(config('finance.categories.expense')),
            'description' => fake()->sentence(3),
            'amount' => fake()->numberBetween(10_000, 2_000_000),
            'is_sample' => false,
        ];
    }

    public function income(): static
    {
        return $this->state(fn (): array => [
            'type' => 'income',
            'category' => fake()->randomElement(config('finance.categories.income')),
        ]);
    }

    public function expense(): static
    {
        return $this->state(fn (): array => [
            'type' => 'expense',
            'category' => fake()->randomElement(config('finance.categories.expense')),
        ]);
    }
}
