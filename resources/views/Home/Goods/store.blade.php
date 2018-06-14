@extends('Home.index')
@section('content')
<!-- 放大镜 -->
    <link rel="stylesheet" type="text/css" href="/Home/fanda/css/zzsc.css">
    <script type="text/javascript" class="library" src="/Home/fanda/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" class="library" src="/Home/fanda/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" class="library" src="/Home/fanda/js/zzsc.js"></script>

    <script type="text/javascript" src="/Home/js/gwc.js"></script>

    <div class="postion">
        <span class="fl"></span>
    </div>  
                      <!-- 隐藏域区域 -->
    <input type="hidden" value="{{$data->id}}" class="goodsid">     
    <div class="content">
                            
      <div class="con-FangDa" id="fangdajing">
          <div class="con-fangDaIMg">
            <!-- 正常显示的图片-->
            <img src="{{$data->pic}}">
            <!-- 滑块-->  
            <div class="magnifyingBegin"></div>
            <!-- 放大镜显示的图片 -->
            <div class="magnifyingShow"><img src="{{$data->pic}}"></div>
          </div>
          
          <ul class="con-FangDa-ImgList">
            <!-- 图片显示列表 -->
            <li class="active"><img src="{{$data->pic}}" data-bigimg="{{$data->pic}}"></li>
            <li><img src="/Home/fanda/images/thumb/2.jpg" data-bigimg="/Home/fanda/images/big/2.jpg"></li>
            <li><img src="/Home/fanda/images/thumb/3.jpg" data-bigimg="/Home/fanda/images/big/3.jpg"></li>
            <li><img src="/Home/fanda/images/thumb/4.jpg" data-bigimg="/Home/fanda/images/big/4.jpg"></li>
          </ul>
         
        </div>
        
        <div class="pro_des">
            <div class="des_name">
                <p>{{$data->gname}}</p>
            </div>
            <br>
            <br>
            <h4>商品描述</h4>
            <div>
                <h5><p>{{$data->gdesc}}</p></h5>
            </div>
            <br>
            <div class="des_price">
                本店价格：￥<b class="money">{{$data->price}}</b><br />
            </div>
            <br>
            <div class="des_choice">
                <span class="fl">型号选择：</span>
                <ul>
                    <li class="size1">30ml<div class="ch_img"></div></li>
                    <li class="size2">50ml<div class="ch_img"></div></li>
                    <li class="size3">100ml<div class="ch_img"></div></li>
                </ul>
            </div>
            <div class="des_choice">
                <span class="fl">颜色选择：</span>
                <ul>
                    <li class="color1">红色<div class="ch_img"></div></li>
                    <li class="color2">白色<div class="ch_img"></div></li>
                    <li class="color3">黑色<div class="ch_img"></div></li>
                </ul>
            </div>
            <div class="des_share">
                <div class="d_sh">
                    分享
                    <div class="d_sh_bg">
                        <a href="/Home/#"><img src="/Home/images/sh_1.gif" /></a>
                        <a href="/Home/#"><img src="/Home/images/sh_2.gif" /></a>
                        <a href="/Home/#"><img src="/Home/images/sh_3.gif" /></a>
                        <a href="/Home/#"><img src="/Home/images/sh_4.gif" /></a>
                        <a href="/Home/#"><img src="/Home/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a href="/home/collect?id={{ $data->id }}">关注商品</a></div>
            </div>
            <div class="des_join">
                <div class="j_nums">
                    <input type="text" value="1" name="" class="n_ipt" />
                    <input type="button" value=""  class="n_btn_1" />
                    <input type="button" value=""  class="n_btn_2" />   
                </div>
                <div class="j_nums" style="line-height: 45px;border: 0px solid red">
                库存 :<span class="ignum">{{$data->gnum-1}}</span>件  
                </div>
                <span class="fl ifl" id="gwc"><a href="javascript:;"><img src="/Home/images/j_car.png" /></a></span>
            </div>            
        </div>    
        
        <div class="s_brand">
            <div class="s_brand_img"><img src="/Home/images/sbrand.jpg" width="188" height="132" /></div>
            <div class="s_brand_c"><a href="/Home/#">进入品牌专区</a></div>
        </div>    
    </div>
    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/Home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/Home/images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                        <a href="#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="/home/goods/store/{{ $data->id }}" class="b_sure">确定</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-收藏成功 End-->
    
    
    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="/Home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="40"><img src="/Home/images/suc.png" /></td>
                    <td>
                        <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                        购物车共有<span class="icar"></span>件宝贝&nbsp; &nbsp; 合计：<span class="imoney"></span>元
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="/home/car" class="b_sure">去购物车结算</a><a href="/home/goods/index/{{$data->cid}}" class="b_buy">继续购物</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>
<script type="text/javascript">
    $('.des_choice:eq(0) ul li').click(function(){
        // alert('');
        $('.des_choice:eq(0) ul li').removeClass('checked');
        $(this).addClass('checked');
    });
    $('.des_choice:eq(1) ul li').click(function(){
        // alert('');
        $('.des_choice:eq(1) ul li').removeClass('checked');
        $(this).addClass('checked');
    });
</script>
@endsection
