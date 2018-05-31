@extends('Admin.index')
@section('content')
        	<!-- 内容开始 -->
              @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/carousel" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图1</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                        <input type="file"  name="img_one" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径1</label>
                                    <div class="mws-form-item">
                                        <input input id="myform" type="text"  name="url_one" class="small" style="width: 380px;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图2</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                        <input type="file"  name="img_two" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径2</label>
                                    <div class="mws-form-item">
                                        <input id="myform" type="text"  name="url_two" class="small" style="width: 380px;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图3</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                        <input type="file"  name="img_three" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径3</label>
                                    <div class="mws-form-item">
                                        <input id="myform" type="text"  name="url_three" class="small" style="width: 380px;">
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
            </div>
            <!-- 内容结束-->
@endsection