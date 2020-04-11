<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * https://laravel.com/docs/7.x/validation#available-validation-rules
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PUT') {
            return [
                'category_id' => 'exists:categories,id',
                'shop_id' => 'exists:shops,id',
                'name' => 'string',
                'description' => 'string',
                'unity_price' => 'numeric',
                'available' => 'boolean',
                'photo' => 'string',
            ];
        }

        return [
            'category_id' => 'required|exists:categories,id',
            'shop_id' => 'required|exists:shops,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'unity_price' => 'required|numeric',
            'available' => 'required|boolean',
            'photo' => 'nullable|string',
        ];
    }
}
