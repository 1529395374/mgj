<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'tel' => 'required|regex:/^1[3-9]{1}[\d]{9}$/',
            'email' => 'required|email',
            'addr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tel.required' => '手机号必填',
            'tel.regex' => '手机号格式不正确',
            'email.required' => '邮箱必填',
            'email.email'   => '邮箱格式不正确',
            'addr.required'   => '地址必填',
        ];
    }
}
