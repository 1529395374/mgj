@extends('Admin.index')
@section('content')
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
            </div>
@endsection