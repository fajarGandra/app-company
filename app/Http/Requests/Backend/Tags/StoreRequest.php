<?php

namespace App\Http\Requests\Backend\Tags;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'name' => 'required|string|unique:App\Models\Tag,name', 
            'slug' => 'required|unique:App\Models\Tag,slug', 
            'keywords' => 'required', 
            'meta_desc' => 'required', 
        ];
    }
}
