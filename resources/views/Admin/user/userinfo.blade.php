@extends('admin.index')

@section('content')
<table class="mws-table">
	<caption><h3>用户详情</h3></caption>
    <thead>
        <tr>
            <th>手机号</th>
            <th>邮箱</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>权限</th>
            <th>年龄</th>
            <th>性别</th>
            <th>收货地址</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data->userinfo->tel }}</td>
            <td>{{ $data->userinfo->email }}</td>
            <td>{{ $data->userinfo->created_at }}</td>
            <td>{{ $data->userinfo->updated_at }}</td>
            <td>
                @if($data->userinfo->auth == '1')
                    超级管理员
                @elseif($data->userinfo->auth == '2')
                    普通管理员
                @endif
            </td>
            <td>{{ $data->userinfo->age }}</td>
            <td>
                @if($data->userinfo->sex == 'm')
                    男
                @elseif($data->userinfo->sex == 'w')
                    女
                @elseif($data->userinfo->sex == 'x')
                    保密
                @endif
            </td>
            <td>{{ $data->userinfo->addr }}</td>
            <td><a href="/admin/user">返回</a></td>
        </tr>
    </tbody>
</table>
@endsection