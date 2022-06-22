<?php

namespace App\Http\Requests\Backend\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'category_id' => 'required', 
            'title' => 'required|string', 
            'slug' => 'required', 
            'desc' => 'required|string|max:200',  
            'content' => 'required|string',  
            'keywords' => 'required|string',  
            'meta_desc' => 'nullable|string',
            'cover' => 'file|mimes:svg,jpg,jpeg,png|max:2048',
        ];
    }
}
