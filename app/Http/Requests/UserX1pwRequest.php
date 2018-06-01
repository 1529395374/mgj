<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserX1pwRequest extends Request
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
            'upwd' => 'required',
            'xupwd' => 'required|regex:/[\w]{6,}/',
            'xreupwd' => 'required|same:xupwd',

        ];
    }

    public function messages()
    {
        return [
            'upwd.required' => '原密码必填',
            'xupwd.required' => '新密码必填',
            'xupwd.regex' => '新密码最少6位',
            'xreupwd.required' => '新确认密码必填',
            'xreupwd.same' => '新确认密码与新密码不一致',

        ];
    }
}
