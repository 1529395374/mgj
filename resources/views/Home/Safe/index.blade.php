@extends('Home.index')
@section('content')
<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
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
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="Member_Safe.html" class="now">账户安全</a></li>
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