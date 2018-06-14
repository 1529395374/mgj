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
            <span><i class="icon-table"></i> 订单列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form action="/admin/order" method="get" style="background-color:#ddd" >
                <div class="dataTables_length" style="font-size:20px;text-align:conter">
                    <label>显示:
                        <select name="count">
                            <option value="5" @if( $count == 5 ) selected @endif >5</option>
                            <option value="10" @if( $count == 10 ) selected @endif >10</option>
                            <option value="15" @if( $count == 15 ) selected @endif >15</option>
                        </select> 页
                    <div style="float:right;margin-right:5px">
                      </label >
                    订单号: <input type="text" name="wlid" value="{{$wlid}}"><input type="submit" value="搜索" class="btn btn-success">  
                    </div>
                    
                </div>
            </form>
            <table class="mws-datatable-fn mws-table" style="text-align:center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>订单号</th>
                        <th>下单人ID</th>
                        <th>总价</th>
                        <th>状态</th>
                        <th style="width:300px">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php $arr = []; ?>
                @foreach($data as $v)
                    @if(in_array($v->wlid,$arr,true))
                        <?php continue; ?>
                    @endif
                    <tr>
                        <td width="20px">{{$v->id}}</td>
                        <td>{{$v->wlid}}</td>
                        <?php $arr[] = $v->wlid; ?>
                        <td>{{$v->uid}}</td>
                        <td>{{$v->money}}</td>
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
                            <form action="/admin/order/{{$v->wlid}}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger">
                            </form>
                            <a href="/admin/order/{{$v->wlid}}/edit" class="btn btn-warning">修改</a>
                            <a href="/admin/order/{{$v->wlid}}" class="btn btn-info">查看详情</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="page">
            {!! $data->appends(['$wlid'=>$wlid])->render() !!}
        </div>
    </div>
    <!-- Panels End -->
@endsection