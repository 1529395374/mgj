@extends('Admin.index')
@section('content')

<div class="mws-panel grid_5">
            <div class="mws-panel-header">
                <span>添加分类</span>
            </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/cate" method="post">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品类别</label>
                            <div class="mws-form-item">
                                <select style="width:200px" name="pid">
                                    <option value="0">顶级分类</option>
                                @foreach($data as $k=>$v)
                                    <option value="{{$v->cid}}">
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
                            <label class="mws-form-label">类别名称</label>
                            <div class="mws-form-item">
                                <input type="text" style="width:200px" name="cname" value="{{old('cname')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                </form>
            </div>      
        </div>

@endsection