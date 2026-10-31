<?php

namespace App\Http\Requests;

use App\Models\FinanceTransaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class FinanceTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $transaction = $this->route('transaction');
        $currentType = $transaction instanceof FinanceTransaction ? $transaction->type : null;
        $type = $this->input('type', $currentType);
        $categories = is_string($type) ? config('finance.categories.'.$type, []) : [];
        $required = $this->isMethod('PATCH') ? 'sometimes' : 'required';

        return [
            'date' => [$required, 'date_format:Y-m-d'],
            'type' => [$required, Rule::in(array_keys(config('finance.categories', [])))],
            'unit' => [$required, Rule::in(config('finance.units', []))],
            'category' => [$required, 'string', Rule::in($categories)],
            'description' => [$required, 'string', 'max:100'],
            'amount' => [$required, 'integer', 'min:1', 'max:9007199254740991'],
        ];
    }

    /** @return array<int, callable> */
    public function after(): array
    {
        return [function (Validator $validator): void {
            if ($validator->errors()->hasAny(['type', 'category'])) {
                return;
            }

            $transaction = $this->route('transaction');
            $currentType = $transaction instanceof FinanceTransaction ? $transaction->type : null;
            $currentCategory = $transaction instanceof FinanceTransaction ? $transaction->category : null;
            $type = $this->input('type', $currentType);
            $category = $this->input('category', $currentCategory);

            if (is_string($type) && is_string($category) &&
                ! in_array($category, config('finance.categories.'.$type, []), true)) {
                $validator->errors()->add('category', 'The selected category is invalid for this transaction type.');
            }
        }];
    }
}
