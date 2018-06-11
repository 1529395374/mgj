@extends('Admin.index')
@section('content')
    <div class="mws-panel grid_6">
            <div class="mws-panel-header">
                <span>商品添加</span>
            </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mws-form-block">
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品类别</label>
                            <div class="mws-form-item">
                                <select class="medium" name="cid">
                                @foreach($cate_cname as $v)
                                    <option value="{{$v->cid}}" 
                                    {{old('cid') == $v->cid ? 'selected' : ''}}>
                                    <?php
                                        $n = substr_count($v->path, ',') - 1;
                                    ?>
                                    {{str_repeat('|--',$n).$v->cname}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品名称</label>
                            <div class="mws-form-item">
                                <input type="text" class="medium" name="gname" value="{{old('gname')}}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品价格</label>
                            <div class="mws-form-item">
                                <input type="text" class="medium" name="price" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品数量</label>
                            <div class="mws-form-item">
                                <input type="text" class="medium" name="gnum" value="{{old('gnum')}}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品图片</label>
                            <div class="mws-form-item" style="width:490px;">
                                <input type="file" name="pic" value="{{old('pic')}}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品描述</label>
                            <div class="mws-form-item" style="width:494px;">
                                <script id="gdesc" type="text/plain" >
                                    {{old('gdesc')}}
                                </script>   
                            </div>
                        </div>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="/Admin/utf8-php/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="/Admin/utf8-php/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('gdesc',{
                                toolbars: [
                                            ['fullscreen', 'source', 'undo', 'redo'],
                                            ['bold', 'italic', 'underline', 'fontborder', 'strikethrough','blockquote', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','simpleupload']
                                        ]
                            });
                        </script>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
@endsection