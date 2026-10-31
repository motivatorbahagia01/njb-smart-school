<?php

use App\Http\Controllers\FinanceBudgetController;
use App\Http\Controllers\FinanceDashboardController;
use App\Http\Controllers\FinanceTransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'njb.admin', 'throttle:60,1'])
    ->prefix('v1')
    ->group(function (): void {
        Route::get('finance/summary', FinanceDashboardController::class)->name('api.v1.finance.summary');
        Route::get('finance/budget', [FinanceBudgetController::class, 'index'])->name('api.v1.finance.budget.show');
        Route::put('finance/budget', [FinanceBudgetController::class, 'update'])->name('api.v1.finance.budget.update');

        Route::apiResource('finance/transactions', FinanceTransactionController::class)
            ->parameters(['finance/transactions' => 'transaction'])
            ->only(['index', 'store', 'show', 'update', 'destroy']);
    });
