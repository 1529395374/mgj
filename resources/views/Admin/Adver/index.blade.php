@extends('Admin.index')
@section('content')
    <div class="mws-panel grid_8">

        <div class="mws-panel-header">
                    <span>
                      <i class="icon-table">{{ $title }}</i></span>
        </div>
        <div class="mws-panel-body no-padding">
            <form id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid" action="/admin/adver" method="get">
                <div class="layui-input-inline xbs768">
                    <select name="page_count" id="">
                        <option value="1"
                                @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 1)
                                selected
                                @endif >1条</option>
                        <option value="15"
                                @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 15)
                                selected
                                @endif >15条</option>
                        <option value="25"
                                @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 25)
                                selected
                                @endif >25条</option>
                        <option value="35"
                                @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 35)
                                selected
                                @endif >35条</option>
                    </select>
                    <input type="submit" value="搜索" class="btn btn-info" >
                    <input type="text" name="search"  placeholder="请输入名称" autocomplete="off" class="layui-input" value="{{$search['search'] or ''}}">
                </div>

            </form>
            <table class="mws-datatable-fn mws-table dataTable " id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <tr>
                    <td>ID</td>
                    <td>顾客信息</td>
                    <td>广告标题</td>
                    <td>广告地址</td>
                    <td>广告图片</td>
                    <td>添加时间</td>
                    <td>修改时间</td>
                    <td>价格</td>
                    <td>操作</td>
                </tr>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($data as $k=>$v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->acustomer }}</td>
                        <td>{{ $v->atitle }}</td>
                        <td>{{ $v->aurl1 }}</td>
                        <td><img src="{{URL::asset($v->apic1)}}" width="100px" height="100px"></td>
                        <td>{{ $v->created_at }}</td>
                        <td>{{ $v->updated_at }}</td>
                        <td>{{ $v->aprice }}</td>
                        <td>
                            <form action="/admin/adver/{{ $v->id }}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger">
                            </form>
                            <a href="/admin/adver/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page">
                {!! $data->render() !!}
            </div>
        </div>
    </div>
    </div>
@endsection