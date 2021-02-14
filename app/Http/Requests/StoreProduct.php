<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->product.'|max:128',
            'slug' => 'nullable|unique:products,slug,'.$this->product.'|max:128',
            'price' => 'required|min:1',
            'description' => 'nullable',
            'size' => 'nullable|max:128',
            'metal' => 'nullable|max:128',
            'stone' => 'nullable|max:128',
            'availability' => 'boolean',
            'recommended' => 'boolean',
            'category_id' => 'nullable',
            'img' => 'nullable|mimes:jpeg,bmp,gif,png,jpg',
            // 'images'=> 'nullable|mimes:jpeg,bmp,gif,png,jpg',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Required to fill',
            'name.unique' => 'A product with this name exists',
            'name.max' => 'Allowed name up to 128 characters',            
            'slug.unique' => 'A slug with exists',
            'slug.max' => 'Allowed slug up to 128 characters',
            'price.max' => 'Product price cannot exceed six figures',
            'size.max' => 'Allowed size up to 128 characters', 
            'metal.max' => 'Allowed metal up to 128 characters', 
            'stone.max' => 'Allowed stone up to 128 characters',             
            'img.mimes' => 'Inappropriate file format',
            // 'images.mimes' => 'Inappropriate file format',
        ];
    }
}
