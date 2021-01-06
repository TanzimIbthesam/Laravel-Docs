<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStore extends FormRequest
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
            //
            'title' => 'required',
            'body' => 'required',
            'blogimage'=>'image|mimes:jpg,jpeg,png,gif,svg|max:1024'
        ];
    }

    public function messages()
    {
       return[
           'title.required'=>'Please enter the post title',
            'body.required'=>'Please enter the post body'
       ];
    }
}
