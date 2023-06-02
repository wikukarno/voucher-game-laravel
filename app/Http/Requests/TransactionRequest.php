<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'users_id' => ['required', 'exists:users,id'],
            'categories_id' => ['required', 'exists:categories,id'],
            'tax' => ['required', 'integer'],
            'value' => ['required', 'integer'],
            'status' => ['required', 'in:INCOME,EXPENSE'],
        ];
    }
}
