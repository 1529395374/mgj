@extends('Home.index')
@section('content')

    <!--Begin 用户中心 Begin -->
    <div class="m_content">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="/home/address">收货地址</a></li>
                    <li><a href="#">缺货登记</a></li>
                    <li><a href="#">跟踪订单</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                    <li><a href="" class="now">用户信息</a></li>
                    <li><a href="Member_Collect.html">我的收藏</a></li>
                    <li><a href="Member_Msg.html">我的留言</a></li>
                    <li><a href="Member_Links.html">推广链接</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                    <li><a href="Member_Safe.html">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg4">分销中心</div>
                <ul>
                    <li><a href="Member_Member.html">我的会员</a></li>
                    <li><a href="Member_Results.html">我的业绩</a></li>
                    <li><a href="Member_Commission.html">我的佣金</a></li>
                    <li><a href="Member_Cash.html">申请提现</a></li>
                </ul>
            </div>
        </div>
        <div class="m_right">
            <p></p>
            <div class="mem_tit">
                <span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现4件</span>我的收藏
            </div>
            @foreach($collect_data as $k=>$v)
            <table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" width="420">商品名称</td>
                    <td align="center" width="180">价格</td>
                    <td align="center" width="270">操作</td>
                </tr>
                <tr>
                    <td style="font-family:'宋体';">
                        <div class="sm_img"><img src="{{ $v->pic }}" width="48" height="48" /></div>{{ $v->gname }}
                    </td>
                    <td align="center">{{ $v->price }}</td>
                    <td align="center">&nbsp; &nbsp; <a href="/home/goods/store/{{$v->id}}" style="color:#ff4e00;">加入购物车</a>&nbsp; &nbsp; <a href="/home/collect/sc?id={{$v->id}}">删除</a></td>
                </tr>
            </table>
            @endforeach


        </div>
    </div>
@endsection