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
        <div class="left_m">
            <div class="left_m_t t_bg2">会员中心</div>
            <ul>
                <li><a href="Member_User.html">用户信息</a></li>
                <li><a href="Member_Collect.html">我的收藏</a></li>
                <li><a href="Member_Msg.html">我的留言</a></li>
                <li><a href="Member_Links.html">推广链接</a></li>
                <li><a href="#">我的评论</a></li>
            </ul>
        </div>
    </div>
    <div class="m_right" style="min-height:437px">
        <p></p>
        <div class="mem_tit">我的订单</div>
        <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
          <tr>           
            <td width="20%">订单号</td>
            <td width="25%">下单时间</td>
            <td width="15%">订单总金额</td>
            <td width="15%">订单状态</td>
            <td width="25%">操作</td>
          </tr>
          
          @foreach($data as $v)
          <tr>
            <td><font color="#ff4e00">{{$v->wlid}}</font></td>
            <td>{{$v->stime}}</td>
            <td>￥{{$v->money}}</td>
            <td>{{$v->state}}</td>
            <td>
                <a href="" class="btn btn-warning">取消订单</a>
                <a href="" class="btn btn-info">查看详细信息</a>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection