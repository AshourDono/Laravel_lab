<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            'title' => ['required','min:3', Rule::unique('posts')->ignore($this->user_id, 'user_id')],
            'description' => 'required|min:10',
            // Rule::unique('posts')->ignore($post->$id)
            
            'user_id' => 'exists:users,id'
        ];
    }

    public function messages()
    {
        return[

            'title.required' => 'Title is required',
            'title.unique' => 'This title is used before',
            'title.min' => 'minimum length is 3 chars',
            'description.required' => 'Description is required',
            'description.min' => 'description minimum length is 10 chars'
        ];
    }
}
