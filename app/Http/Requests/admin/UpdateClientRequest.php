<?php

namespace App\Http\Requests\admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
        $user = User::find($this->client);

        return [
            'name' => 'required|max:255',
            'email' => ['required',Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'confirmed|min:6|nullable',
        ];
    }
}
