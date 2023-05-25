<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'name' => 'required|string',
            'users_id' => 'required|integer|exists:users,id',
            'nominals_id' => 'required|integer|exists:nominals,id',
            'categories_id' => 'required|integer|exists:categories,id',
            'thumbnail' => 'required|image|max:2048',
        ];
    }
}
