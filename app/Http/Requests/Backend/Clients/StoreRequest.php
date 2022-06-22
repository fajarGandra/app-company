<?php

namespace App\Http\Requests\Backend\Clients;

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
            'name' => 'required', 
            'country' => 'required', 
            'image' => 'required|file|mimes:svg,jpg,jpeg,png|max:2048',
        ];
    }
}
