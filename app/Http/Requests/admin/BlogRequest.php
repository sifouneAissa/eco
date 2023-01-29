<?php

namespace App\Http\Requests\admin;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Console\Input\Input;

class BlogRequest extends FormRequest
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

        setIfString($this);

        return [
            'title' => 'required|max:255',
            'blog' => 'required'
        ];
    }
}
