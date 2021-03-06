@extends('Home.index')
@section('content')
<div class="postion">
    <span class="fl">全部 {{$set}} </span>
</div>

<div class="content mar_20">
    <div class="l_history">
        <div class="his_t">
            <span class="fl">浏览历史</span>
            <span class="fr"><a href="#">清空</a></span>
        </div>
        <ul>
            <li>
                <div class="img"><a href="#"><img src="/Home/images/his_1.jpg" width="185" height="162" /></a></div>
                <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                <div class="price">
                    <font>￥<span>368.00</span></font> &nbsp; 18R
                </div>
            </li>
            <li>
                <div class="img"><a href="#"><img src="/Home/images/his_2.jpg" width="185" height="162" /></a></div>
                <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                <div class="price">
                    <font>￥<span>768.00</span></font> &nbsp; 18R
                </div>
            </li>
            <li>
                <div class="img"><a href="#"><img src="/Home/images/his_3.jpg" width="185" height="162" /></a></div>
                <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                <div class="price">
                    <font>￥<span>680.00</span></font> &nbsp; 18R
                </div>
            </li>
            <li>
                <div class="img"><a href="#"><img src="/Home/images/his_4.jpg" width="185" height="162" /></a></div>
                <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                <div class="price">
                    <font>￥<span>368.00</span></font> &nbsp; 18R
                </div>
            </li>
            <li>
                <div class="img"><a href="#"><img src="/Home/images/his_5.jpg" width="185" height="162" /></a></div>
                <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                <div class="price">
                    <font>￥<span>368.00</span></font> &nbsp; 18R
                </div>
            </li>
        </ul>
    </div>
    <div class="l_list">
        <div class="list_t">
            <span class="fl list_or">
                <a href="#" class="now">默认</a>
                <a href="#">
                    <span class="fl">销量</span>                        
                    <span class="i_up">销量从低到高显示</span>
                    <span class="i_down">销量从高到低显示</span>                                                     
                </a>
                <a href="#">
                    <span class="fl">价格</span>                        
                    <span class="i_up">价格从低到高显示</span>
                    <span class="i_down">价格从高到低显示</span>     
                </a>
                <a href="#">新品</a>
            </span>
            <span class="fr">共发现120件</span>
        </div>
        <div class="list_c">
            
            <ul class="cate_list">
            @foreach($data as $v)
                <li class="higood">
                    <div class="img"><a href="/home/goods/store/{{$v->id}}"><img src="{{$v->pic}}" width="210" height="185" /></a></div>
                    <div class="price">
                        <font>￥<span>{{$v->price}}.00</span></font> &nbsp; 26R
                    </div>
                    <div class="name"><a href="/home/goods/store/{{$v->id}}">{{$v->gdesc}}</a></div>
                    <div class="carbg">
                        <a href="#" class="ss">收藏</a>
                        <a href="/home/goods/store/{{$v->id}}" class="j_car">加入购物车</a>
                    </div>
                </li>
            @endforeach
            </ul>
            
            <!-- <div class="pages">
                <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
            </div> -->
            
            
            
        </div>
    </div>
</div>
<script>
    if ($('.higood').length == 0) {
        layer.msg('没有找到该宝贝,试试搜索其他的商品吧....', {icon: 6, time: 3000});  
    }
</script>
@endsection