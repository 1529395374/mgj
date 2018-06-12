@extends('Home.index')
@section('content')
<!--End Menu End-->
<script type="text/javascript" src="/Home/js/igwc.js"></script>
<div class="i_bg">  
    <div class="content mar_20">
      <img src="/Home/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
      <div class="two_bg">
          <div class="two_t">
              <span class="fr"></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>
              @if(!empty($tmp))
              @foreach($tmp as $v)
              <tr class="order_list">
                <td>
                    <div class="c_s_img"><img src="{{$v->pic}}" width="73" height="73" /></div>
                    {{$v->gname}}
                </td>
                <input type="hidden" value="{{$v->id}}">
                <td align="center">{{$v->num}}</td>
                <td align="center" style="color:#ff4e00;">￥<span>{{$v->price*$v->num}}</span></td>
              </tr>
              @endforeach
           	  @endif
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：￥{{$total}}
                </td>
              </tr>
            </table>
            
            <div class="two_t">
              <span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="p_td" width="160">商品名称</td>
                <td width="395">海贼王</td>
                <td class="p_td" width="160">电子邮件</td>
                <td width="395">12345678@qq.com</td>
              </tr>
              <tr>
                <td class="p_td">详细信息</td>
                <td>四川省成都市武侯区</td>
                <td class="p_td">邮政编码</td>
                <td>6011111</td>
              </tr>
            </table>
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="70">
                <td align="right">
                  <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;" class="itotal">￥{{$total}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="#"><img src="images/btn_sure.gif" /></a></td>
              </tr>
            </table>
        </div>
    </div>
  <!--End 第二步：确认订单信息 End-->
@endsection