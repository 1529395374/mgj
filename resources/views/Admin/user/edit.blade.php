@extends('admin.index')

@section('content')



<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
		<form class="mws-form" action="/admin/user/{{ $data->id }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">用户名</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="username" disabled="disabled" value="{{ $data->username }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">手机号</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="tel" value="{{ $data->userinfo->tel }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">邮箱</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="email" value="{{ $data->userinfo->email }}">
					</div>
				</div>
				<div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="auth" value="1" @if(!empty($data->userinfo) && $data->userinfo->auth =='1')checked @endif> <label>超级管理员</label></li>
                            <li><input type="radio" name="auth" value="2" @if(!empty($data->userinfo) && $data->userinfo->auth =='2')checked @endif> <label>普通管理员</label></li>
                        </ul>
                    </div>
                </div>
				<div class="mws-form-row">
					<label class="mws-form-label">年龄</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="age" value="{{ $data->userinfo->age }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">收货地址</label>
					<div class="mws-form-item">
						<input type="text" class="small" name="addr" value="{{ $data->userinfo->addr }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">头像</label>
					<div class="mws-form-item" style="width:480px" >
						<input type="file" class="small" name="pic" value="" >
						<img src="{{URL::asset($data->pic)}}" alt="" width="100px" height="100px">
					</div>
				</div>
				<div class="mws-form-row">
		            <label class="mws-form-label">性别</label>
		            <div class="mws-form-item clearfix">
		                <ul class="mws-form-list inline">
		                    <li><input type="radio" name="sex" value="m" @if(!empty($data->userinfo) && $data->userinfo->sex =='m')checked @endif> <label>男</label></li>
		                    <li><input type="radio" name="sex" value="w" @if(!empty($data->userinfo) && $data->userinfo->sex =='w')checked @endif> <label>女</label></li> 
		                    <li><input type="radio" name="sex" value="x" @if(!empty($data->userinfo) && $data->userinfo->sex =='x')checked @endif> <label>保密</label></li>
		                </ul>
		 
		            </div>
		        </div>
			</div>
			<div class="mws-button-row">
				<input type="submit" value="提交" class="btn btn-danger">
				<input type="reset" value="重置" class="btn ">
			</div>
		</form>
	<div>
<div>
@endsection