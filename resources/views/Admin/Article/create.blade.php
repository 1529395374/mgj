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
                        <form class="mws-form" action="/admin/articles" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章标题</label>
                                    <div class="mws-form-item">
                                        <input type="text" id="myform" name="title" class="small" value="{{ old('title') }}">
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
                                        <textarea class="small" name="content">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">作者</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="author" class="small" value="{{ old('author') }}">
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