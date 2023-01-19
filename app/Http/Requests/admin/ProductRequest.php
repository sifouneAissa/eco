<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

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
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => ['required','max:255'],
            'price' => ['required','numeric','min:1'],
            'desc' => ['required'],
            'product_category_id' => ['exists:product_categories,id'],
            'product_inventory_id' => ['exists:product_inventories,id']
        ];
    }
}
