<?php

namespace App\Modules\Administration\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'age' => 'required',
            'phone_number' => 'required',
            'card_number' => 'required',
            'street_name' => 'required',
            'house_number' => 'required',
            'country' => 'required',
            'city_name' => 'required',
            'postal_code' => 'required',
            'state' => 'required',
            'nationality_name' => 'required'
        ];
    }
}
