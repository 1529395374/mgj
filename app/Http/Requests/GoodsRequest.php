<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsRequest extends Request
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
            'gname' => 'required|unique:goods,gname',   //图一验证
            'price' => 'required',    //图一地址验证
            'gnum' => 'required',    //图二验证
            'gdesc' => 'required',    //图二地址验证
            'pic' => 'required',  //图三验证
        ];
    }

    public function messages()
    {
        return [
            'gname.required' => '商品名称必填',
            'gname.unique' => '商品名称重复',
            'price.required' => '商品价格必填',
            'gnum.required' => '商品数量必填',   
            'gdesc.required' => '商品描述必填',   
            'pic.required' => '商品图片必填',   
        ];
    }
}
