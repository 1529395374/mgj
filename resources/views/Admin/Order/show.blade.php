@extends('Admin.index')
@section('content')
<?php use App\Models\Cate; ?>
<style type="text/css">
    .wrap{  
    width: 80px; 
    white-space: nowrap;  
    text-overflow: ellipsis; 
    overflow: hidden;  
}  
</style>
   <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 订单详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table" style="text-align:center">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>下单人ID</th>
                        <th>商品ID</th>
                        <th>商品数量</th>
                        <th>商品价格</th>
                        <th>下单时间</th>
                        <th>状态</th>
                        <th style="width:100px">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->wlid}}</td>
                        <td>{{$v->uid}}</td>
                        <td>{{$v->gid}}</td>
                        <td>{{$v->gnum}}</td>
                        <td>{{$v->order_goods[0]->price}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>
                            @if($v->state == 1)
                                已付款
                            @elseif($v->state == 2)
                                已发货
                            @elseif($v->state == 3)
                                已签收
                            @elseif($v->state == 4)
                                订单已取消
                            @endif
                        </td>
                        <td>
                            <a href="/admin/order" class="btn btn-info">返回上一级</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Panels End -->
@endsection