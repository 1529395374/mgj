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
            <span><i class="icon-table"></i> 商品列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table" style="text-align:center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>所属分类</th>
                        <th>商品名称</th>
                        <th>商品图片</th>
                        <th>商品价格</th>
                        <th>商品描述</th>
                        <th>商品数量</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td width="20px">{{$v->id}}</td>
                        <td>{{ Cate::find($v->cid)->cname }}</td>
                        <td><div class="wrap">{{$v->gname}}</div></td>
                        <td><img src="{{$v->pic}}" style="width:100px;"></td>
                        <td>{{$v->price}}</td>
                        <td><div class="wrap">{{$v->gdesc}}</div></td>
                        <td>{{$v->gnum}}</td>
                        <td>
                            {{$v->status == 1 ? '上架' : '下架'}}
                        </td>
                        <td>
                            <form action="/admin/goods/{{$v->id}}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger">
                            </form>
                            <a href="/admin/goods/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Panels End -->
@endsection