@extends('admin.index')

@section('content')

<!-- 显示错误信息 -->


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/user" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="username" value="{{ old('username') }}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="upwd">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" class="small" name="reupwd">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="tel" value="{{ old('tel') }}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="email" value="{{ old('email') }}">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="auth" value="{{ old('auth') }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">年龄</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="age" value="{{ old('age') }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">收货地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="addr" value="{{ old('addr') }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label" >头像</label>
                    <div class="mws-form-item" style="width:455px">
                        <input type="file" class="small" name="pic" value="">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="sex" value="m" checked> <label>男</label></li>
                            <li><input type="radio" name="sex" value="w"> <label>女</label></li>
                            <li><input type="radio" name="sex" value="x"> <label>保密</label></li>
                        </ul>
                    </div>
                </div>

    		</div>
    			
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-success">
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>    	
</div>
@endsection