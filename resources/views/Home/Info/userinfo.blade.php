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
                    <li><a href="Member_Address.html">收货地址</a></li>
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
                    <li><a href="/home/safe">账户安全</a></li>
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
            <div class="mem_t">账号信息</div>
                <div class="m_des">
                    <form action="/home/info/{{ session('log')->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                            <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                          <tr valign="top">
                            <td width="115">
                                <label for="test1">
                                    <img id="pic" src="{{ session('log')->pic }}" width="90" height="90" />
                                </label>
                                <button type="button" class="layui-btn" id="test1" style="display:none;">
                                  <i class="layui-icon">&#xe67c;</i>上传图片
                                </button>
                                <input type="hidden" name="pic" value="" id="hidden">
                                <?php echo csrf_field(); ?>
                                <script>
                                    layui.use('upload', function(){
                                      var upload = layui.upload;//文件上传对象
                                       
                                      //执行实例
                                      var uploadInst = upload.render({
                                        elem: '#test1' //绑定元素
                                        ,url: '/home/userinfo/uploads' //上传接口
                                        ,method: 'POST'
                                        ,data: {'_token':$('input[type=hidden]').eq(0).val()}
                                        ,field: 'pic'
                                        ,done: function(res){
                                          //上传完毕回调
                                          if(res.code == 1){
                                            layer.msg(res.msg);
                                            $('#pic').attr('src',res.data.src);
                                            $('#hidden').attr('value',res.data.src);
                                          }else{
                                            layer.msg(res.msg);
                                          }
                                        }
                                        
                                      });
                                    });
                                </script>
                                <script>
                                $('#pic').mouseover(function(){
                                    layer.tips('点击更换头像', '#pic');
                                })
                                </script>
                            </td>
                          </tr>
                        </table> 
                </div>
        
                <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="40%">姓&nbsp; &nbsp; 名：<input type="text" name="username" value="{{ session('log')->username }}" /></td>
                        <td width="60%">性&nbsp; &nbsp; 别：
                            <input type="radio" name="sex" @if(!empty(session('log')->userinfo) && session('log')->userinfo->sex == 'm')checked @endif value="m" />男
                            <input type="radio" name="sex" @if(!empty(session('log')->userinfo) && session('log')->userinfo->sex == 'w')checked @endif value="w" />女
                            <input type="radio" name="sex" @if(!empty(session('log')->userinfo) && session('log')->userinfo->sex == 'x')checked @endif value="x" />保密
                        </td>
                      </tr>
                      <tr>
                        <td>电&nbsp; &nbsp; 话：<input type="text" name="tel" value="{{ session('log')->tel }} " /></td>
                        <td>邮&nbsp; &nbsp; 箱：<input type="text" name="email" value="{{ session('log')->email }}" /></td>
                      </tr>
                      <tr>
                        <td>地&nbsp; &nbsp; 址：<input type="text" name="addr" value="{{ session('log')->userinfo->addr }}" /></td>
                        <td>年&nbsp; &nbsp; 龄：<input type="text" name="age" value="{{ session('log')->userinfo->age }}" /></td>
                      </tr>
                      <tr height="30">
                        <td>&nbsp;</td>
                        <td>
                            <input type="reset" value="重置" class="btn_tj">
                            <input type="submit" value="确认修改" class="btn_tj">
                        </td>
                      </tr>
                </table>
            </form>
        </div>
    </div>
    <!--End 用户中心 End--> 
@endsection