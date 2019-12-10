<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FTAToolErrorFirstRequest extends FormRequest
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
            'errorFirst' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'errorFirst.required' => 'エラー要因を選択してください',
        ];
    }
}
