<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryPost extends FormRequest
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
           'category_name'=> ['required','unique:categories'],

        ];
    }


    public function messages()
     {
        return [
           'category_name.required'=> 'Please enter your category name!',
            'category_name.unique' => 'Category you entered  already exists!',
        ];
    }
}

