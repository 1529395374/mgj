@extends('Admin.index')
@section('content')
<style type="text/css">
    .page ul,.page li{
        list-style-type: none;
    }
    .page ul{
        margin-left:780px;
    }
    .page li{
        float: left;
        height: 20px;
        
        display: block;
        /*padding: 0px 10px;*/
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
        display:block;
        height:20px;
        width:28.55px;
        color:#fff;
    }

    .page span{
        display:block;
        height:20px;
        width:28.55px;
        /*color:#fff;*/
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
        <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span><i class="icon-table"></i> 分类列表</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <table class="mws-table" style="text-align:left">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>父类</th>
                                <th>类别名称</th>
                                <th>类别路径</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody >
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$v->cid}}</td>
                                <td>
                                {{ $v->pname }}
                                </td>
                                <td>
                                    <?php
                                        $n = substr_count($v->path, ',') - 1;
                                    ?>
                                    {{str_repeat('|--',$n).$v->cname}}
                                </td>
                                <td>{{$v->path}}</td>
                                <td style="width:200px">
                                    <form action="/admin/cate/{{$v->cid}}" method="post" style="display:inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger" value="删除">
                                    </form>
                                    <a href="/admin/cate/{{$v->cid}}/edit" class="btn btn-warning">修改</a>
                                    <a href="/admin/cate/isedit/{{$v->cid}}" class="btn btn-info">添加子类</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="page dataTables_paginate paging_full_numbers">
                      {!! $data->render() !!}  
                </div>
            </div>
@endsection