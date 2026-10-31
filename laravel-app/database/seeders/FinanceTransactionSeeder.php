<?php

namespace Database\Seeders;

use App\Models\FinanceTransaction;
use Illuminate\Database\Seeder;

class FinanceTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        FinanceTransaction::factory()->income()->create([
            'date' => now()->startOfMonth()->addDays(4)->toDateString(),
            'unit' => 'KB-TK',
            'category' => 'SPP',
            'description' => 'Contoh SPP bulanan',
            'amount' => 12_500_000,
            'is_sample' => true,
        ]);

        FinanceTransaction::factory()->income()->create([
            'date' => now()->startOfMonth()->addDays(9)->toDateString(),
            'unit' => 'SMK',
            'category' => 'Bantuan',
            'description' => 'Contoh bantuan pendidikan',
            'amount' => 18_000_000,
            'is_sample' => true,
        ]);

        FinanceTransaction::factory()->expense()->create([
            'date' => now()->startOfMonth()->addDays(11)->toDateString(),
            'unit' => 'SMP',
            'category' => 'Sarana & Prasarana',
            'description' => 'Contoh buku dan bahan ajar',
            'amount' => 2_350_000,
            'is_sample' => true,
        ]);
    }
}
