<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => [
                'nullable', 'integer', Rule::exists((new Category())->getTable(), 'id')
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string']
        ];
    }
}
