@extends('Home.index')
@section('content')
	<!--End Menu End-->
@if(empty($tmp))
<div style="margin-left: 280px"><a href="/"><img src="/Home/images/kong.png" alt="" style="cursor: pointer;"></a></div>
@else
<script type="text/javascript" src="/Home/js/igwc.js"></script>
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="140"><input type="checkbox" class="car_checkeds"></td>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
            @if(!empty($tmp))
            @foreach($tmp  as $k=>$v)
          <tr>
            <td align="center"><input type="checkbox" class="car_checked"></td>
            <td>
            	<div class="c_s_img" style="height:73px;width: 73px"><a href="/home/goods/store/{{$v->id}}"><img src="{{$v->pic}}" alt="" style="height:73px;width: 73px"></a></div>
                <a href="/home/goods/store/{{$v->id}}">{{$v->gname}}</a>
            </td>
            <td align="center">
            	<div class="c_num">
                    <input type="button" value=""  class="car_btn_1" />
                	<input type="text" value="{{$v->num}}" name="" class="car_ipt" readonly/>  
                    <input type="button" value=""  class="car_btn_2" />
                    <!-- 商品id -->
                    <input type="hidden" value="{{$v->id}}" class="igid">
                    <!-- 商品总数量 -->
                    <input type="hidden" value="{{$v->gnum}}">
                    <!-- 商品价格 -->
                    <input type="hidden" value="{{$v->price}}">
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">¥ <span>{{$v->price*$v->num}}</span>
            </td>
            <td align="center">
                <a href="javascript:;" class="car_delete">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a>
            </td>
          </tr>
          @endforeach
          @endif
          
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad"></label><label class="r_txt"><a href="javascript:;" class="deleteall">全部删除</a></label>
                <span class="fr ifr">商品总价：￥<b style="font-size:22px; color:#ff4e00;">0.00</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
            	<a href="/"><img src="images/buy1.gif" /></a>&nbsp; &nbsp; <a href="#"><img src="images/buy3.jpg" class="gobuy" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
 
@endif
@endsection