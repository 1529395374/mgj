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
             'img_one' => 'required',   //图一验证
            'url_one' => 'required',    //图一地址验证
            'img_two' => 'required',    //图二验证
            'url_two' => 'required',    //图二地址验证
            'img_three' => 'required',  //图三验证
            'url_three' => 'required',  //图三地址验证
        ];
    }

    public function messages()
    {
        return [
            'img_one.required' => '轮播图(1)必填',
            'url_one.required' => '跳转路径(1)必填',
            'img_two.required' => '轮播图(2)必填',   
            'url_two.required' => '跳转路径(2)必填',   
            'img_three.required' => '轮播图(3)必填',   
            'url_three.required' => '跳转路径(3)必填',   
        ];
    }
}
