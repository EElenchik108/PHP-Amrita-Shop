<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'name' => 'required|unique:categories,name,'.$this->category.'|max:64',
            'slug' => 'nullable|unique:categories,slug,'.$this->category.'|max:128',
            'img' => 'nullable|mimes:jpeg,bmp,gif,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Required to fill',
            'name.unique' => 'A category with this name exists',
            'name.max' => 'Allowed name up to 64 characters',
            // 'slug.required' => 'Such a slug exists',
            'slug.unique' => 'A slug with exists',
            'slug.max' => 'Allowed slug up to 128 characters',            
        ];
    }
}


