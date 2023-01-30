<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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

        $this->headers->set('Content-Type','application/json');

        return [
            //
            'name' => ['required','max:255'],
            'code' => ['required','string','min:1'],
            'content' => ['required','max:500'],
        ];
    }
}
