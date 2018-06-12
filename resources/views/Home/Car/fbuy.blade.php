@extends('Home.index')
@section('content')

<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/Home/images/img3.jpg">        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
    	
        <!--Begin 银行卡支付 Begin -->
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tbody><tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$wlid}}</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                	您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥{{$money}}</font>
                </td>
              </tr>
              <tr>
                <td>
                	<a href="#">首页</a> &nbsp; &nbsp; <a href="#"><span style="color: red;text-decoration: underline;">查看我的订单</span></a>
                </td>
              </tr>
            </tbody></table>        	
        </div>
        <!--Begin 银行卡支付 Begin -->
    </div>
	<!--End 第三步：提交订单 End--> 
@endsection