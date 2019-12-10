<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FTAPostRequest extends FormRequest
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
            'ftatool_id' => 'required|exists:ftatools,id',
            'body' => 'required|max:400'
        ];
    }

    // FTAToolRequestフォームリクエストでのエラーメッセージ追加
    public function messages()
    {
        return [
          'ftatool_id.required' => '投稿エラーが必要です',
          'ftatool_id.exists' => '投稿エラーが存在しません',
          'body.required' => '内容を入力してください',
          'body.max' => '400文字以内で入力してください'
        ];
    }

}
