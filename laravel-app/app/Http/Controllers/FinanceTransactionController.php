<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinanceTransactionRequest;
use App\Http\Resources\FinanceTransactionResource;
use App\Models\FinanceTransaction;
use DateTimeImmutable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class FinanceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $filters = $request->validate([
            'month' => ['sometimes', 'date_format:Y-m'],
            'unit' => ['sometimes', Rule::in(array_merge(['Semua Unit'], config('finance.units', [])))],
            'type' => ['sometimes', Rule::in(array_keys(config('finance.categories', [])))],
            'q' => ['sometimes', 'string', 'max:100'],
            'per_page' => ['sometimes', 'integer', 'between:1,100'],
        ]);

        $query = FinanceTransaction::query();

        if (isset($filters['month'])) {
            $startDate = $filters['month'].'-01';
            $endDate = (new DateTimeImmutable($startDate))->modify('+1 month')->format('Y-m-d');

            $query->where('date', '>=', $startDate)->where('date', '<', $endDate);
        }

        if (isset($filters['unit']) && $filters['unit'] !== 'Semua Unit') {
            $query->where('unit', $filters['unit']);
        }

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (! empty($filters['q'])) {
            $search = $filters['q'];
            $query->where(function ($builder) use ($search): void {
                $builder->where('description', 'like', '%'.$search.'%')
                    ->orWhere('unit', 'like', '%'.$search.'%')
                    ->orWhere('category', 'like', '%'.$search.'%');
            });
        }

        $perPage = $filters['per_page'] ?? 50;

        return FinanceTransactionResource::collection(
            $query->orderByDesc('date')->orderByDesc('id')->paginate($perPage)->appends($request->query())
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FinanceTransactionRequest $request): JsonResponse
    {
        $transaction = FinanceTransaction::query()->create([
            ...$request->validated(),
            'is_sample' => false,
        ]);

        return (new FinanceTransactionResource($transaction))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FinanceTransaction $transaction): FinanceTransactionResource
    {
        return new FinanceTransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FinanceTransactionRequest $request, FinanceTransaction $transaction): FinanceTransactionResource
    {
        $transaction->update($request->validated());

        return new FinanceTransactionResource($transaction->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinanceTransaction $transaction): Response
    {
        $transaction->delete();

        return response()->noContent();
    }
}
