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
                                    <label class="mws-form-label">轮播图</label>
                                    <div class="mws-form-item"  style="width: 380px;">
                                        <img src="{{URL::asset($data->profile)}}" id="pic" style="width: 190px;height: 150px;">
                                        <button type="button" class="layui-btn" id="test1">轮播图</button>
                                        <input type="hidden" name="profile" value="" id="hidden">
                                        <?php echo csrf_field(); ?>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">跳转路径</label>
                                    <div class="mws-form-item">
                                        <input input id="myform" type="text"  name="url_profile" class="small" value="{{$data->url_profile}}" style="width: 380px;">
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
            <script type="text/javascript">
                layui.use('upload', function(){
                    var upload = layui.upload;
                    //普通图片上传
                    var uploadInst = upload.render({
                    elem: '#test1',
                    url: '/admin/carousel/test1',
                    method:'POST',
                    data:{'_token':$('input[type=hidden]').eq(0).val()},
                    field:'profile'
                    ,done: function(res){
                      if(res.code == 1){
                        layer.msg(res.msg);
                        $('#pic').attr('src',res.data.src);
                        $('#hidden').attr('value',res.data.src);
                      }else{
                        layer.msg(res.msg);
                      }
                    }
                });
            });
            </script>
@endsection