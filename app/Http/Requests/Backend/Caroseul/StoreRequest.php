<?php

namespace App\Http\Requests\Backend\Caroseul;

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
            'title' => 'required', 
            'description' => 'required', 
            'btn_link' => 'nullable', 
            'btn_name' => 'nullable', 
            'text_color' => 'nullable',
            'item_order' => 'required|numeric', 
            'image' => 'required|file|mimes:svg,jpg,jpeg,png|max:2048',
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
        ];
    }
}
