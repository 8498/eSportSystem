<?php

namespace App\Modules\Teammanagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlayerRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'office' => 'required',
            'birthday' => 'required|date|before:tomorrow',
            'phone_number' => 'required',
            'card_number' => 'required',
            'street_name' => 'required',
            'house_number' => 'required',
            'country' => 'required',
            'city_name' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
            'nationality_name' => 'required',
            'nickname' => 'required'
        ];
    }
}
