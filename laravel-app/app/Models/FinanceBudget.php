<?php

namespace App\Models;

use Database\Factories\FinanceBudgetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceBudget extends Model
{
    /** @use HasFactory<FinanceBudgetFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'month',
        'unit',
        'amount',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'amount' => 'integer',
        ];
    }
}
