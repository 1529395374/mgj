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
                        <form class="mws-form" action="/admin/articles/{{$data->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章标题</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="title" id="myform" class="small" value="{{$data->title}}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">图片</label>
                                    <div class="mws-form-item" style="width: 380px;">
                                        <input type="file" name="apic" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章内容</label>
                                    <div class="mws-form-item">
                                        <textarea class="small" name="content">{{$data->content}}</textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">作者</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="author" class="small" value="{{$data->author}}">
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