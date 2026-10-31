<?php

namespace App\Models;

use Database\Factories\FinanceTransactionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceTransaction extends Model
{
    /** @use HasFactory<FinanceTransactionFactory> */
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'date',
        'type',
        'unit',
        'category',
        'description',
        'amount',
        'is_sample',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'date' => 'date:Y-m-d',
            'amount' => 'integer',
            'is_sample' => 'boolean',
        ];
    }
}
