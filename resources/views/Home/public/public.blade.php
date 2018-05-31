<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="text/css" rel="stylesheet" href="{{url()}}/Home/css/style.css" />
    <link type="text/css" rel="stylesheet" href="{{url()}}/Home/css/pic.css" />
	<link type="text/css" rel="stylesheet" href="{{url()}}/Home/layui/css/layui.css" />
     <link rel="stylesheet" href="{{url()}}/Admins/css/pages.css">
	
    <script type="text/javascript" src="{{url()}}/Home/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="{{url()}}/Home/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="{{url()}}/Home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/menu.js"></script>    
        
    <script type="text/javascript" src="{{url()}}/Home/js/select.js"></script>
	<script type="text/javascript" src="{{url()}}/Home/layui/layui.all.js"></script>
    
	<script type="text/javascript" src="{{url()}}/Home/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="{{url()}}/Home/js/iban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/fban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/f_ban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/mban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/bban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/hban.js"></script>
    <script type="text/javascript" src="{{url()}}/Home/js/tban.js"></script>
	<script type="text/javascript" src="{{url()}}/Home/js/lrscroll_1.js"></script>
    <script src="{{url()}}/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>  
    <script type="text/javascript" src="{{url()}}/file_upload.js"></script>
<title>小蘑菇</title>
</head>
<body style="margin-left: 75px;margin-right: 75px">  
    <!-- 显示自动验证的错误信息 -->
    @if (count($errors) > 0)
        <div class="mws-form-message error">
                @foreach ($errors->all() as $error)
                <script>
                    sweetAlert('{{ $error }}');
                </script>
                @endforeach
        </div>
    @endif
    <!-- 读取模版的提示信息 -->
       @if(session('success'))
        <script>
            sweetAlert("{{session('success')}}");
        </script>
        @endif        
        @if(session('error'))
            <script>
                  sweetAlert("{{session('error')}}");
            </script>     
        @endif
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
        	<span class="fl"><a href="/home/login/index">
                            <a href="#" id="iusername">{{session('username')}}</a>
                             <a href="/home/login/outlogin"><font color="red">退出</font></a>
                        
                    </a>&nbsp; <a href="/home/regist/regist" style="color:#FE0277;">免费注册</a>&nbsp;|&nbsp;<a href="/home/order" class="myorder">我的订单</a>&nbsp;| <a href="/home/person">个人中心|</a></span>
        	       <span class="ss">
                    <script>
                    $('.myorder').click(function(){
                        $(this).attr('href','/home/order')
                    })
                </script>
            	<div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="/home/collect/list">我的收藏</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
               <div class="ss_list">
                    <a href="#">客户服务 </a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>       
            </span>
        </span><div style="">
                 <a href="/home/car" style="cursor: pointer;"><i class="layui-icon" style="font-size: 20px; color: #FF225e;">&#xe657;</i>    购物车</a>
            </div>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/"><img src="{{url()}}/Home/images/logo.png" / style="width: 80%;height: 100%;"></a></div>
    <div class="search">
        <form action="/home/search" method="get">
            <input type="text" value="" name="key"  class="s_ipt keyword" placeholder="" />
            <input type="submit" value="搜索" class="s_btn" id = "isearch">
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
</div>
   <script>
    $('#isearch').click(function(){
        if ($('.keyword').val().length == 0) {
            layer.msg('请输入要搜索的商品,比如:T恤,卫衣...', {icon: 6, time: 3000});
            return false;
        } 
    })
   </script>      
<!--End Header End-->
@section('content')

@show

  <!--Begin Footer Begin -->
   <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="{{url()}}/Home/images/b11.jpg" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="{{url()}}/Home/images/b22.jpg" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="{{url()}}/Home/images/b33.jpg" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="{{url()}}/Home/images/b44.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div> 
    <div class="b_nav">
        <dl>                                                                                            
            <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
            <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
            <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
            <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
            <a href="#" class="b_sh1">新浪微博</a>            
            <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="{{url()}}/Home/images/er.png" width="118" height="118" /></div>
            <img src="{{url()}}/Home/images/ss.png" />
        </div>
    </div>   
   <!-- 友情链接-->
   <label>友情链接：</label>
   <p style="height: 100%;">
    @if(!empty($link))
    @foreach($link as $k=>$v)
		@if($v['limg'])
        <a target="_blank" href="https://{{$v['lurl']}}" style="float:left;">
			<span style="display:bloak;">
				<img  src="{{URL::asset($v['limg'])}}" style="width:70px;height:30px;border-radius:4px" /> 
			</span>
        </a>
        <b>|</b>
        @else
        <a target="_blank" href="https://{{$v['lurl']}}">
            <span style="margin-left:5px;">{{$v['lname']}}</span>
        </a>
        <b>|</b>
        @endif
    @endforeach
	@endif
    </p>
    <div class="btmbg">
        <div class="btm">
            备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 蘑菇街 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="{{url()}}/Home/images/b_1.gif" width="98" height="33" /><img src="{{url()}}/Home/images/b_2.gif" width="98" height="33" /><img src="{{url()}}/Home/images/b_3.gif" width="98" height="33" /><img src="{{url()}}/Home/images/b_4.gif" width="98" height="33" /><img src="{{url()}}/Home/images/b_5.gif" width="98" height="33" /><img src="{{url()}}/Home/images/b_6.gif" width="98" height="33" />
        </div>      
    </div>
    <!--End Footer End -->    
</div>

</body>
</html>

