<?php

namespace App\Http\Requests\Backend\Profile;

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
            
            'name' => 'required|string', 
            'email' => 'required',
            'profile_photo_path' => 'file|mimes:svg,jpg,jpeg,png|max:2048',
        ];
    }
}
