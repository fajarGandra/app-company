<?php

namespace App\Http\Requests\Backend\Teams;

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
            'name' => 'required', 
            'deskripsi' => 'required', 
            'jabatan' => 'required', 
            'image' => 'file|mimes:svg,jpg,jpeg,png|max:2048',
        ];
    }
}
