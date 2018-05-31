<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarouselupdateRequest extends Request
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
            'url_one' => 'required',    //图一地址验证
            'url_two' => 'required',    //图二地址验证
            'url_three' => 'required',  //图三地址验证
        ];
    }

    public function messages()
    {
        return [
            'url_one.required' => '跳转路径(1)必填', 
            'url_two.required' => '跳转路径(2)必填',    
            'url_three.required' => '跳转路径(3)必填',   
        ];
    }
}
