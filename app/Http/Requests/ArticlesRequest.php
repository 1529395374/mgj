<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticlesRequest extends Request
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
            'title' => 'required',      //标题验证
            'content' => 'required',    //内容验证
            'author' => 'required',     //作者验证
        ];
    }

     public function messages()
    {
        return [
            'title.required' => '标题必填',
            'content.required' => '内容必填',
            'author.required' => '作者必填',   
        ];
    }
}
