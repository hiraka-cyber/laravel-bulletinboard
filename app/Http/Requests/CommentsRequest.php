<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'name' => 'required|max:40',
            'comment' => 'required|max:350',
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'required name!',
        'namse.max' => 'entry name 40 string!',
        'comment.required' => 'required comment!',
        'comment.max' => 'entry comment 350 string!',
      ];
    }
}
