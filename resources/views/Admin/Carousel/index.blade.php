@extends('Admin.index')
@section('content')
<style type="text/css">
    .page ul,.page li{
        list-style-type: none;
    }

    .page li{
        float: left;
        height: 20px;
        padding: 0 10px;
        display: block;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
        cursor: pointer;
        outline: none;
        background-color: #444444;
        color: #fff;
        text-decoration: none;
        border-right: 1px solid #232323;
        border-left: 1px solid #666666;
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        border-left: 1px solid rgba(255, 255, 255, 0.15);
        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }

    .page a{
        color:#fff;
    }

    .page .active{
        background: #c5d52b;
        color:#323232;
    }

    .page .disabled{
            color: #666666;
            cursor: default;
    }

</style>
<!-- 内容开始 -->
            <div class="container">
                @if(session('error'))
                <div class="mws-form-message error">
                   {{ session('error') }}
                </div>
                @endif

                @if(session('success'))
                <div class="mws-form-message success">
                     {{ session('success') }}
                </div>
                @endif
               
               <div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                    <span>
                      <i class="icon-table"></i>{{ $title }}</span>
                  </div>
                  <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                      <form class="layui-form xbs" action="/admin/articles" method="get">
                      </div>
                      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    </form>
                        <tr>
	                        <th>ID</th>
	                        <th>轮播图1</th>
	                        <th>跳转路径1</th>
	                        <th>轮播图2</th>
                          <th>跳转路径2</th>
                          <th>轮播图3</th>
	                        <th>跳转路径3</th>
	                        <th>操作</th>
                    	</tr>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach($data as $k=>$v)
                        <tr>
                            <td>{{$v->cid}}</td>
                             <td><img src="{{URL::asset($v->img_one)}}"  width="100px" height="100px"></td>
                            <td>{{$v->url_one}}</td>
                            <td><img src="{{URL::asset($v->img_two)}}"  width="100px" height="100px"></td>
                            <td>{{$v->url_two}}</td>
                            <td><img src="{{URL::asset($v->img_three)}}"  width="100px" height="100px"></td>
                            <td>{{$v->url_three}}</td>
                            <td>
                                <form action="/admin/carousel/{{$v->cid}}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="删除" class="btn btn-danger">
                                </form>
                                <a href="/admin/carousel/{{$v->cid}}/edit" class="btn btn-warning">修改</a>
                            </td>
                        </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                        <div class="page dataTables_paginate paging_full_numbers">
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- 内容结束-->

@endsection