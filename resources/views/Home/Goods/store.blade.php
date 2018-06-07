@extends('Home.index')
@section('content')
    <script type="text/javascript" src="/Home/js/gwc.js"></script>

    <div class="postion">
        <span class="fl">全部 > 美妆个护 > 香水 > 迪奥 > 迪奥真我香水</span>
    </div>  
                      <!-- 隐藏域区域 -->
    <input type="hidden" value="{{$data->id}}" class="goodsid">     
    <div class="content">
         
        <div id="tsShopContainer">
            <div id="tsImgS"><a href="{{$data->pic}}" title="Images" class="MagicZoom" id="MagicZoom"><img src="{{$data->pic}}" width="390" height="390" /></a></div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon">
                    <ul>
                        <li onclick="showPic(0)" rel="MagicZoom" class="tsSelectImg"><img src="{{$data->pic}}" tsImgS="{{$data->pic}}" width="79" height="79" /></li>
                        <li onclick="showPic(1)" rel="MagicZoom"><img src="/Home/images/ps2.jpg" tsImgS="/Home/images/ps2.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(2)" rel="MagicZoom"><img src="/Home/images/ps3.jpg" tsImgS="/Home/images/ps3.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(3)" rel="MagicZoom"><img src="/Home/images/ps4.jpg" tsImgS="/Home/images/ps4.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(4)" rel="MagicZoom"><img src="/Home/images/ps1.jpg" tsImgS="/Home/images/ps1.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(5)" rel="MagicZoom"><img src="/Home/images/ps2.jpg" tsImgS="/Home/images/ps2.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(6)" rel="MagicZoom"><img src="/Home/images/ps3.jpg" tsImgS="/Home/images/ps3.jpg" width="79" height="79" /></li>
                        <li onclick="showPic(7)" rel="MagicZoom"><img src="/Home/images/ps4.jpg" tsImgS="/Home/images/ps4.jpg" width="79" height="79" /></li>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="/Home/images/loading.gif" alt="Loading..." />               
        </div>
        
        <div class="pro_des">
            <div class="des_name">
                <p>{{$data->gname}}</p>
               {{$data->gdesc}}
            </div>
            <div class="des_price">
                本店价格：￥<b class="money">{{$data->price}}</b><br />
            </div>
            <div class="des_choice">
                <span class="fl">型号选择：</span>
                <ul>
                    <li class="checked size1">30ml<div class="ch_img"></div></li>
                    <li class="size2">50ml<div class="ch_img"></div></li>
                    <li class="size3">100ml<div class="ch_img"></div></li>
                </ul>
            </div>
            <div class="des_choice">
                <span class="fl">颜色选择：</span>
                <ul>
                    <li class="color1">红色<div class="ch_img"></div></li>
                    <li class="checked color2">白色<div class="ch_img"></div></li>
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
                <div class="d_care"><a onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
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
                        <a href="/Home/#">查看我的关注 >></a>
                    </td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td>&nbsp;</td>
                    <td><a href="/Home/#" class="b_sure">确定</a></td>
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
@endsection