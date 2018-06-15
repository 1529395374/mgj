@extends('Home.index')
@section('content')
    <!--Begin 用户中心 Begin -->
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
                    <li><a href="/home/info" class="now">用户信息</a></li>
                    <li><a href="/home/collect/sclist">我的收藏</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                    <li><a href="/home/safe">账户安全</a></li>
                </ul>
            </div>

        </div>
       
        <div class="m_right">
            <div class="mem_t">账号信息</div>
                <div class="m_des">
                    <form action="/home/info/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                            <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                          <tr valign="top">
                            <td width="115">
                                <label for="test1">
                                @if($data->pic != null)
                                    <img id="pic" src="{{ $data->pic }}" width="90" height="90" />
                                @else
                                    <img id="pic" src="/uploads/define.jpg" width="90" height="90" />
                                @endif
                                </label>
                                <input type="hidden" name="pic" value="" id="hidden">
                                <?php echo csrf_field(); ?>
                                <script>
                                    layui.use('upload', function(){
                                      var upload = layui.upload;//文件上传对象
                                       
                                      //执行实例
                                      var uploadInst = upload.render({
                                        elem: '#pic' //绑定元素
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
                                    $('.layui-upload-file').remove();
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
                            <input type="radio" name="sex" value="m" @if($data->userinfo->sex == 'm') checked @endif  />男
                            <input type="radio" name="sex" value="w"  @if($data->userinfo->sex == 'w') checked @endif />女
                            <input type="radio" name="sex" value="x"  @if($data->userinfo->sex == 'x') checked @endif />保密
                        </td>
                      </tr>
                      <tr>
                        <td>电&nbsp; &nbsp; 话：<input type="text" name="tel" value="{{ $data->tel }} " /></td>
                        <td>邮&nbsp; &nbsp; 箱：<input type="text" name="email" value="{{ $data->email }}" /></td>
                      </tr>
                      <tr>
                        <td>地&nbsp; &nbsp; 址：<input type="text" name="addr" value="{{ $data->userinfo->addr }}" /></td>
                        <td>年&nbsp; &nbsp; 龄：<input type="text" name="age" value="{{ $data->userinfo->age }}" /></td>
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