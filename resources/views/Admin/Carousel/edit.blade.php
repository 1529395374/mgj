@extends('Admin.index')
@section('content')
        	<!-- 内容开始 -->
            <div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/carousel/{{$data->cid}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图1</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                        <img src="{{URL::asset($data->img_one)}}" style="width: 190px;height: 150px;">
                                        <input type="file"  name="img_one" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径1</label>
                                    <div class="mws-form-item">
                                        <input input id="myform" type="text"  name="url_one" class="small" value="{{$data->url_one}}" style="width: 380px;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图2</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                         <img src="{{URL::asset($data->img_two)}}" style="width: 190px;height: 150px;">
                                        <input type="file"  name="img_two" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径2</label>
                                    <div class="mws-form-item">
                                        <input id="myform" type="text"  name="url_two" class="small" value="{{$data->url_two}}" style="width: 380px;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">轮播图3</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                         <img src="{{URL::asset($data->img_three)}}" style="width: 190px;height: 150px;">
                                        <input type="file"  name="img_three" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径3</label>
                                    <div class="mws-form-item">
                                        <input id="myform" type="text"  name="url_three" class="small" value="{{$data->url_three}}" style="width: 380px;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-success">
                                <input type="reset" value="重置" class="btn btn-info">
                            </div>
                        </form>
                    </div>      
                </div>
            </div>
            <!-- 内容结束-->
@endsection