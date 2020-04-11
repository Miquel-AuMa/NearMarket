<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                'phone_number' => ['string', Rule::unique('users', 'phone_number')->ignore(request()->route('user'))],
                'password' => 'string|confirmed',
                'name' => 'string',
                'surname' => 'string',
                'type' => 'string|in:user,shop',
                'address_line_1' => 'string',
                'city' => 'string',
                'zip' => 'string',
            ];
        }

        return [
            'user.phone_number' => 'required|string|unique:users,phone_number',
            'user.password' => 'required|string|confirmed',
            'user.name' => 'required|string',
            'user.surname' => 'required|string',
            'user.address_line_1' => 'required|string',
            'user.city' => 'required|string',
            'user.zip' => 'required|string',
            'user.is_shop' => 'required|boolean',
            'shop.shop_type_id' => 'required_if:user.is_shop,1|exists:shop_types,id',
            'shop.phone_number' => 'required_if:user.is_shop,1|string|unique:shops,phone_number',
            'shop.name' => 'required_if:user.is_shop,1|string',
            'shop.address_line_1' => 'required_if:user.is_shop,1|string',
            'shop.city' => 'required_if:user.is_shop,1|string',
            'shop.zip' => 'required_if:user.is_shop,1|string',
            'shop.delivery' => 'required_if:user.is_shop,1|boolean',
            'shop.schedule' => 'required_if:user.is_shop,1|array',
        ];
    }
}
