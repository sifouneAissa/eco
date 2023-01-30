<?php

namespace App\Http\Requests\admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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

        $product = Product::find($this->product);

        return [
            //
            'name' => ['required','max:255',Rule::unique('products', 'name')->ignore($product->id)],
            'price' => ['required','numeric','min:1'],
            'old_price' => ['required','numeric','min:1'],
            'desc' => ['required'],
            'product_category_id' => ['exists:product_categories,id'],
            'product_inventory_id' => ['exists:product_inventories,id']
        ];
    }
}
