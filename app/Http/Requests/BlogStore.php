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
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg|required|max:1024|dimensions:min_height=500'
        ];
    }

    public function messages()
    {
       return[
           'title.required'=>'Please enter the post title',
            'body.required'=>'Please neter the post body'
       ];
    }
}
