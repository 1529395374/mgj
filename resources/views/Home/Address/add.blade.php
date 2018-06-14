@extends('Home.index')
@section('content')
    <div class="m_content">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="/home/address">收货地址</a></li>
                    <li><a href="/home/address/create">收货地址添加</a></li>
                    <li><a href="#">跟踪订单</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg2">会员中心</div>
                <ul>
                    <li><a href="" class="now">用户信息</a></li>
                    <li><a href="/home/collect/sclist">我的收藏</a></li>
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
                <a href="#"><img src="/Home/images/add_ad.gif" /></a>
            </div>
            <form action="/home/address" method="post">
                {{ csrf_field() }}
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
                <tr>
                    <td align="right">收货人姓名</td>
                    <td style="font-family:'宋体';"><input type="text" name="name" value="{{ old('name') }}" class="add_ipt" />（必填）</td>
                    <td align="right">电子邮箱</td>
                    <td style="font-family:'宋体';"><input type="text" name="email" value="{{ old('email') }}" class="add_ipt" />（必填）</td>
                </tr>
                <tr>
                    <td align="right">详细地址</td>
                    <td style="font-family:'宋体';"><input type="text" name="address" value="{{ old('address') }}" class="add_ipt" />（必填）</td>
                    <td align="right">手机</td>
                    <td style="font-family:'宋体';"><input type="text" name="phone"  value="{{ old('phone') }}"class="add_ipt" />（必填）</td>
                </tr>
            </table>
            <p align="right">
                <input type="submit" value="添加" class="btn-success">
                <input type="reset" value="重置" class="btn-info">
            </p>
            </form>


        </div>
    </div>
    <!--End 用户中心 End-->
@endsection