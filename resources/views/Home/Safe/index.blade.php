@extends('Home.index')
@section('content')
<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="/home/order/index">我的订单</a></li>
                    <li><a href="/home/address">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="/home/info">用户信息</a></li>
                    <li><a href="/home/collect/sclist">我的收藏</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="/home/safe" class="now">账户安全</a></li>
                </ul>
            </div>

        </div>

		<div class="m_right">
            <p></p>
            <div class="mem_tit">账户安全</div>
            <div class="m_des">
                <form method="post" action="/home/safe/xgtel/{{ session('log')->id }}">
                {{ csrf_field() }}
	                <table border="0" style="width:880px;" cellspacing="0" cellpadding="0">
		                  <tbody>
			                  <tr height="45">
			                    <td width="80" align="right">原手机 &nbsp; &nbsp;</td>
			                    <td><input type="text" name="ytel" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
			                  </tr>
			                  <tr height="45">
			                    <td align="right">新手机 &nbsp; &nbsp;</td>
			                    <td><input type="text" name="tel" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
			                  </tr>
			                  <tr height="50">
			                    <td>&nbsp;</td>
			                    <td><input type="submit" value="确认修改" class="btn_tj"></td>
			                  </tr>
		                </tbody>
	                </table>
                </form>
            </div>
            
            <div class="m_des">
                <form method="post" action="/home/safe/xgemail/{{ session('log')->id }}">
					{{ csrf_field() }}
	                <table border="0" style="width:880px;" cellspacing="0" cellpadding="0">
		                  <tbody><tr height="45">
		                    <td width="80" align="right">原邮箱 &nbsp; &nbsp;</td>
		                    <td><input type="text" name="yemail" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
		                  </tr>
		                  <tr height="45">
		                    <td align="right">新邮箱 &nbsp; &nbsp;</td>
		                    <td><input type="text" name="email" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
		                  </tr>
		                  <tr height="50">
		                    <td>&nbsp;</td>
		                    <td><input type="submit" value="确认修改" class="btn_tj"></td>
		                  </tr>
		                </tbody>
	                </table>
                </form>
            </div>
            
            <div class="m_des">
                <form method="post" action="/home/safe/xgupwd/{{ session('log')->id }}">
                {{ csrf_field() }}
	                <table border="0" style="width:880px;" cellspacing="0" cellpadding="0">
		                  <tbody><tr height="45">
		                    <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
		                    <td><input type="password" name="yupwd" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
		                  </tr>
		                  <tr height="45">
		                    <td align="right">新密码 &nbsp; &nbsp;</td>
		                    <td><input type="password" name="upwd" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
		                  </tr>
		                  <tr height="45">
		                    <td align="right">确认密码 &nbsp; &nbsp;</td>
		                    <td><input type="password" name="reupwd" value="" class="add_ipt" style="width:180px;">&nbsp; <font color="#ff4e00">*</font></td>
		                  </tr>
		                  <tr height="50">
		                    <td>&nbsp;</td>
		                    <td><input type="submit" value="确认修改" class="btn_tj"></td>
		                  </tr>
		                </tbody>
	                </table>
                </form>
            </div>
        </div>
    </div>
@endsection