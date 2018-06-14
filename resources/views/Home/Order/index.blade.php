@extends('Home.index')
@section('content')

<link href="/Home/Order/css/orstyle.css" rel="stylesheet" type="text/css">

<div class="m_content">
    <div class="m_left">
        <div class="left_n">管理中心</div>
        <div class="left_m">
            <div class="left_m_t t_bg1">订单中心</div>
            <ul>
                <li><a href="Member_Order.html" class="now">我的订单</a></li>
                <li><a href="Member_Address.html">收货地址</a></li>
                <li><a href="#">缺货登记</a></li>
                <li><a href="#">跟踪订单</a></li>
            </ul>
        </div>
    </div>
    <div class="m_right" style="min-height:437px">
       <div class="am-tab-panel am-fade am-in am-active" id="tab1" style="padding:20px 10px">
            <div class="order-top">
                <div class="th th-item">
                    <td class="td-inner">商品</td>
                </div>
                <div class="th th-price">
                    <td class="td-inner">单价</td>
                </div>
                <div class="th th-number">
                    <td class="td-inner">数量</td>
                </div>
                <div class="th th-operation">
                    <td class="td-inner">商品操作</td>
                </div>
                <div class="th th-amount">
                    <td class="td-inner">合计</td>
                </div>
                <div class="th th-status">
                    <td class="td-inner">交易状态</td>
                </div>
                <div class="th th-change">
                    <td class="td-inner">交易操作</td>
                </div>
            </div>
            <div class="order-main">
                <div class="order-list">
                    <!--交易成功-->
                    @foreach($data as $k=>$v)
                        <div class="order-status0">
                            <div class="order-title">
                                <div class="dd-num">订单编号：{{$k}}</div>
                                <span>成交时间：{{$v[0]->created_at}}</span>
                                <!--    <em>店铺：小桔灯</em>-->
                            </div>
                            <div class="order-content">
                                <div class="order-left">
                                @foreach($v as $vv)
                                    <ul class="item-list">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a href="/home/goods/store/{{$vv->gid}}" class="J_MakePoint">
                                                    <img src="{{$vv->pic}}" style="width:100%">
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <a href="/home/goods/store/{{$vv->gid}}">
                                                        <p>{{$vv->gname}}</p>
                                                    </a>    
                                                        <p class="info-little">颜色：12#川南玛瑙
                                                            <br/>包装：裸装 </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div style="padding:19px 0px">
                                                {{$vv->dj}}
                                            </div>
                                        </li>
                                        <li class="td td-number">
                                            <div class="item-number" style="padding:19px 0px">
                                                <span>×</span>{{$vv->gnum}}
                                            </div>
                                        </li>
                                        <li class="td td-operation">
                                            <div class="item-operation">
                                                
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach    
                                </div>
                                <div class="order-right">
                                    <li class="td td-amount">
                                        <div class="btn btn-default" style="border:0px;background-color:#fff;cursor:default">
                                            合计：{{$vv->money}}
                                        </div>
                                    </li>
                                    <div class="move-right">
                                        <li class="td td-status">
                                            <div class="btn btn-default" style="border:0px;background-color:#fff;cursor:default">
                                                    @if($vv->state == 1)
                                                        已付款
                                                    @elseif($vv->state == 2)
                                                        已发货
                                                    @elseif($vv->state == 3)
                                                        已签收
                                                    @elseif($vv->state == 4)
                                                        订单已取消
                                                    @endif
                                            </div>
                                        </li>
                                        <li class="td td-change">
                                            <div class="">
                                            @if($vv->state != 4)
                                                <a href="/home/order/delete/{{$k}}" class="btn btn-danger">取消订单</a>
                                            @else
                                                <a href="" class="btn btn-danger" disabled>订单已取消</a>
                                            @endif
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection