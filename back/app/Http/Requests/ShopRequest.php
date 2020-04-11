<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShopRequest extends FormRequest
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
                'shop_type_id' => 'exists:shop_types,id',
                'phone_number' => ['string', Rule::unique('shops', 'phone_number')->ignore(request()->route('shop'))],
                'name' => 'string',
                'address_line_1' => 'string',
                'city' => 'string',
                'zip' => 'string',
                'delivery' => 'boolean',
                'schedule' => 'array',
            ];
        }

        return [
            'shop_type_id' => 'required|exists:shop_types,id',
            'phone_number' => 'required|string|unique:shops,phone_number',
            'name' => 'required|string',
            'address_line_1' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'delivery' => 'required|boolean',
            'schedule' => 'required|array',
        ];
    }
}
