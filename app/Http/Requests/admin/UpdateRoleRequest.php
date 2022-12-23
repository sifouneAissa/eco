<?php

namespace App\Http\Requests\admin;

use App\Models\CustomRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $role = CustomRole::find($this->role);

        return [
            //
            'name' => ['required','max:255',Rule::unique('roles', 'name')->ignore($role->id)],
            'permissions' => 'required'
        ];
    }
}
