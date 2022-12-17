<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'address_line_1' => 'required|max:255' ,
            'address_line_2' => 'required|max:255' ,
            'city' => 'required|max:20',
            'country' => 'required|max:20',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'postal_code' =>  'required|regex:/^[0-9]{3,7}$/'
        ];
    }
}
