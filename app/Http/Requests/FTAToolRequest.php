<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FTAToolRequest extends FormRequest
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

     // FTAToolRequestフォームリクエストでのルール追加
    public function rules()
    {
        return [
            'errorDetail' => 'required',
        ];
    }

    // FTAToolRequestフォームリクエストでのエラーメッセージ追加
    public function messages()
    {
        return [
          'errorDetail.required' => 'エラー内容を入力してください',
        ];
    }

}
