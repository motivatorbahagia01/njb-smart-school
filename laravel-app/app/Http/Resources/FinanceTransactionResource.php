<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinanceTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date->toDateString(),
            'type' => $this->type,
            'unit' => $this->unit,
            'category' => $this->category,
            'description' => $this->description,
            'amount' => (int) $this->amount,
            'sample' => (bool) $this->is_sample,
        ];
    }
}
