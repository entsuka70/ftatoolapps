<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FTAPostUpdateRequest extends FormRequest
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
            'body' => 'required|max:400',
        ];
    }

    public function messages()
    {
        return [
            'body.required' => '更新内容を記入してください',
            'body.max' => '400文字以内で入力してください',
        ];
    }
}
