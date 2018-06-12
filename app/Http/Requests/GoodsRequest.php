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
            'gname' => 'required',   //验证商品名称
            'price' => 'required',    //验证商品价格
            'gnum' => 'required',    //验证商品数量
            'editorValue' => 'required',    //验证商品描述
            
        ];
    }

    public function messages()
    {
        return [
            'gname.required' => '商品名称必填',
            'price.required' => '商品价格必填',
            'gnum.required' => '商品数量必填',   
            'editorValue.required' => '商品描述必填',   
        ];
    }
}
