<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
          'image' => 'required',
          'content' => 'required|max:50'
        ];
    }

    public function messages() {
        return [
            'image.required' => '画像がなきゃ意味がない！！！',
            'content.required' => '説明文を頂けると幸いです。',
            'content.max' => 'うーん・・・ちょっと長いかな（ヒント：50文字以内）'
        ];
    }
}
