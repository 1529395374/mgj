<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarouselRequest extends Request
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
             'profile' => 'required',   //图一验证
            'url_profile' => 'required',    //图一地址验证
        ];
    }

    public function messages()
    {
        return [
            'profile.required' => '轮播图*必填',
            'url_profile.required' => '跳转路径*必填',
        ];
    }
}
