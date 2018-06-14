@extends('Home.index')
@section('content')
<div class="m_content">
    <div class="m_left">
        <div class="left_n">管理中心</div>
        <div class="left_m">
            <div class="left_m_t t_bg1">订单中心</div>
            <ul>
                <li><a href="Member_Order.html" class="now">我的订单</a></li>
                <li><a href="Member_Address.html">收货地址</a></li>
                <li><a href="#">缺货登记</a></li>
                <li><a href="#">跟踪订单</a></li>
            </ul>
        </div>
    </div>
    <div class="m_right" style="min-height:437px">
        <p></p>
        <div class="mem_tit">订单详情</div>
        <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
          <tr>           
            <td width="20%">订单号</td>
            <td width="15%">商品名称</td>
            <td width="15%">商品单价</td>
            <td width="15%">商品数量</td>
            <td width="10%">商品描述</td>
            <td width="25%">操作</td>
          </tr>
          
          @foreach($data as $v)
          <tr>
            <td><font color="#ff4e00">{{$v->wlid}}</font></td>
            <td>{{$v->order_goods[0]->gname}}</td>
            <td>￥{{$v->money}}</td>
            <td>
                @if($v->state == 1)
                    {{ '已付款' }}
                @elseif($v->state == 2)
                    {{ '已发货' }}
                @elseif($v->state == 3)
                    {{ '已签收' }}
                @else
                    {{ '订单已取消' }}
                @endif
            </td>
            <td></td>
            <td></td>
          </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection