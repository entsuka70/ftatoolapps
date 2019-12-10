<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FTAProfileImageRequest extends FormRequest
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
            'profile_fileName' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
      return [
        'profile_fileName.required' => '写真を選択してください',
        'profile_fileName.file' => 'ファイルを選択してください',
        'profile_fileName.image' => '画像ファイルを選択してください',
        'profile_fileName.mimes' => 'jpeg,png,jpg,gifいずれかのファイルを選択してください',
        'profile_fileName.max' => '2MB以下のファイルを選択してください',
      ];
    }
}
