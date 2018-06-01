<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInsertRequest extends Request
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
            'username' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'upwd' => 'required|regex:/[\w]{6,}/',
            'reupwd' => 'required|same:upwd',
            'tel' => 'required|regex:/^1[3-9]{1}[\d]{9}$/',
            'email' => 'required|email',
            'pic'  => 'required|mimes:jpeg,jpg,png,gif,bmp,jpeg2000,tiff,psd,svg,pcx,',
            'auth'  => 'required',
            'addr'  => 'required',
        ];
    }

    //自定义错误信息
    public function messages()
    {
        return [
            'username.required' => '用户名必填',
            'username.regex' => '用户名格式不正确',
            'username.unique' => '用户名已存在',
            'upwd.required' => '密码必填',
            'upwd.regex' => '密码最少6位',
            'reupwd.required' => '确认密码必填',
            'reupwd.same' => '确认密码与密码不一致',
            'tel.required' => '手机号必填',
            'tel.regex' => '手机号格式不正确',
            'email.required' => '邮箱必填',
            'email.email'   => '邮箱格式不正确',
            'pic.required' => '头像必填',
            'pic.mimes' => '头像格式不正确',
            'auth.required' => '权限必填',
            'addr.required' => '收货地址必填',
        ];
    }
}
