@extends('Admin.index')
@section('content')
 <!-- 配置文件 -->
<script type="text/javascript" src="/Admin/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Admin/utf8-php/ueditor.all.js"></script>
        	<!-- 内容开始 -->
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
                                    <label class="mws-form-label">文章内容</label>
                                    <div class="mws-form-item">
                                        <!-- 加载编辑器的容器 -->
                                    <script id="container" name="content" class="small" type="text/plain">

                                    </script>
                                        
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
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
    ['fullscreen', 'source', 'undo', 'redo'],
    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','simpleupload','insertimage']
],
    });

</script>
@endsection