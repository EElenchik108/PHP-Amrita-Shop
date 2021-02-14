<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:articles,name,'.$this->article.'|max:128',
            'slug' => 'nullable|unique:articles,slug,'.$this->article.'|max:128',
            'description' => 'nullable',
            'topic' => 'nullable',
            'text' => 'required',
            'author' => 'nullable',
            'img' => 'nullable|mimes:jpeg,bmp,gif,png,jpg',            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Required to fill',
            'name.unique' => 'A article with this name exists',
            'name.max' => 'Allowed name up to 128 characters',            
            'slug.unique' => 'A slug with exists',
            'slug.max' => 'Allowed slug up to 128 characters',            
            'text.required' => 'Articles without text cannot be',                         
            'img.mimes' => 'Inappropriate file format',            
        ];
    }
}
