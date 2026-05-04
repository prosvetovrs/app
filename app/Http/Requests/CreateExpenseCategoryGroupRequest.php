<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateExpenseCategoryGroupRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'sort' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Поле user_id обязательно',
            'user_id.exists' => 'Пользователь не найден',
            'name.required' => 'Название обязательно',
            'sort.required' => 'Поле sort обязательно',
        ];
    }
}
