<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidationRequest extends FormRequest
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
                'name'      =>  'required|max:191|unique:categories,name',
                'parent_id' =>  'required|not_in:0',
                'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ];
    }
}
