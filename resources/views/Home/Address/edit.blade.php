@extends('Home.index')
@section('content')
    <div class="m_content">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="/home/address" class="now">收货地址</a></li>
                    <li><a href="/home/address/create">添加收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="m_right">
            <p></p>
            <div class="mem_tit">
                <a href="#"><img src="/Home/images/add_ad.gif" /></a>
            </div>
            <form action="/home/address/{{ $data->aid }}" method="post">
                {{ csrf_field() }}
                {{method_field('PUT')}}
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
                <tr>
                    <td align="right">收货人姓名</td>
                    <td style="font-family:'宋体';"><input type="text" name="name" value="{{ $data->name }}" class="add_ipt" />（必填）</td>
                    <td align="right">电子邮箱</td>
                    <td style="font-family:'宋体';"><input type="text" name="email" value="{{ $data->email }}" class="add_ipt" />（必填）</td>
                </tr>
                <tr>
                    <td align="right">详细地址</td>
                    <td style="font-family:'宋体';"><input type="text" name="address" value="{{ $data->address }}" class="add_ipt" />（必填）</td>
                    <td align="right">手机</td>
                    <td style="font-family:'宋体';"><input type="text" name="phone"  value="{{ $data->phone }}"class="add_ipt" />（必填）</td>
                </tr>
            </table>
            <p align="right">
                <input type="submit" value="修改" class="btn-success">
                <input type="reset" value="重置" class="btn-info">
            </p>
            </form>


        </div>
    </div>
    <!--End 用户中心 End-->
@endsection