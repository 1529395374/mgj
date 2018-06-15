@extends('Home.index')
@section('content')
<div class="m_content">
    <div class="m_left">
        <div class="left_n">管理中心</div>
        <div class="left_m">
            <div class="left_m_t t_bg1">订单中心</div>
            <ul>
                <li><a href="/home/order/index" class="now">我的订单</a></li>
                <li><a href="/home/address">收货地址</a></li>
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
    </div>
        <div class="m_right">
            <p></p>
<div class="mem_tit">收货地址</div>
            @foreach($data as $k=>$v)
            <div class="address">
                <div class="a_close"><a href="#"><img src="/Home/images/a_close.png" /></a></div>
                <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right" width="80">姓名：</td>
                        <td>{{ $v->name }}</td>
                    </tr>
                    <tr>
                        <td align="right">地址：</td>
                        <td>{{ $v->address }}</td>
                    </tr>
                    <tr>
                        <td align="right">手机：</td>
                        <td>{{ $v->phone }}</td>
                    </tr>
                    <tr>
                        <td align="right">邮箱：</td>
                        <td>{{ $v->email }}</td>
                    </tr>

                </table>

                <p align="right">&nbsp;
                <form action="/home/address/{{ $v->aid }}" method="post" style="display: inline; color:red;" class="btn btn-error">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="删除">
                </form>
                &nbsp;&nbsp;
                @if($v->status == 1)
                    <span style="color:#CCCCCC">默认地址</span>&nbsp; &nbsp; &nbsp; &nbsp; <a href="/home/address/{{ $v->aid }}/edit" style="color:#ff4e00;">编辑</a>&nbsp;&nbsp; &nbsp; &nbsp;
                @else
                    <a href="/home/address/dafault/{{$v->aid}}" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="/home/address/{{ $v->aid }}/edit" style="color:#ff4e00;">编辑</a>&nbsp;&nbsp; &nbsp; &nbsp;
                @endif
                </p>
            </div>
            @endforeach
</div>
@endsection