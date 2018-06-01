@extends('admin.index')

@section('content')


		<form action="/admin/user" method="get">
			显示：<select name="count">
				<!-- 判断:如果$params存在 切条数不为空 并且条数默认为5-->
				<option value="5" @if(isset($params) && !empty($params['count']) && $params['count'] == 5) selected @endif>5</option>
				<option value="10" @if(isset($params) && !empty($params['count']) && $params['count'] == 10) selected @endif>10</option>
				<option value="15" @if(isset($params) && !empty($params['count']) && $params['count'] == 15) selected @endif>15</option>
				<option value="20" @if(isset($params) && !empty($params['count']) && $params['count'] == 20) selected @endif>20</option>
			</select>条
			关键字：<input type="text" name="username" value="{{ $params['username'] or ''}}">
			<input type="submit" value="搜索" class="btn btn-success">
		</form>
		<table class="mws-table">
			<tr>
				<td>ID</td>
				<td>用户名</td>
				<td>手机号</td>
				<td>邮箱</td>
				<td>头像</td>
				<td>创建时间</td>
				<td>操作</td>
			</tr>
			@foreach($data as $v)
			<tr>
				<td>{{ $v->id }}</td>
				<td>{{ $v->username }}</td>
				<td>{{ $v->userinfo->tel }}</td>
				<td>{{ $v->userinfo->email }} </td>
				<td><img src="{{URL::asset($v->pic)}}" width="100px" height="100px"></td>
				
				<td>{{ $v->userinfo->created_at }}</td>
				<td>
					<form action="/admin/user/{{ $v->id }}" method="post" style="display:inline;">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="submit" value="删除" class="btn btn-danger" >
						
					</form>
					<a href="/admin/user/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
					<a href="/admin/user/xpw/{{ $v->id }}" class="btn btn-warning">修改密码</a>
					<a href="/admin/user/{{ $v->id }}" class="btn btn-success">详情</a>
				</td>
			</tr>
			@endforeach
		</table>
<div class="page">
	{!! $data->appends($params)->render() !!}
</div>
@endsection