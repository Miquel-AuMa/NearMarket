<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                 'user_id' => 'exists:user,id',
                 'delivery' => 'string',
                 'state' => 'in:accepted,declined,received',
                 'request_date' => 'date:Y-m-d H:i:s',
                 'pickup_date' => 'date:Y-m-d H:i:s',
                 'annotations' => 'string'
             ];
         }

        return [
            'user_id' => 'required|exists:users,id',
            'delivery' => 'required|boolean',
            'state' => 'required|in:accepted,declined,received',
            'request_date' => 'required|date:Y-m-d H:i:s',
            'pickup_date' => 'required|date:Y-m-d H:i:s',
            'annotations' => 'nullable|string'
        ];
    }
}
