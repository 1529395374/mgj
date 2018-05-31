@extends('Admin.index')
@section('content')
<div class="mws-panel grid_5">
            <div class="mws-panel-header">
                <span>添加子分类</span>
            </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/cate/issave/{{$data->cid}}" method="post">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品类别</label>
                            <div class="mws-form-item">
                                <select style="width:200px" name="pid" disabled="disabled">
                                    <option value="">{{$data->cname}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">类别名称</label>
                            <div class="mws-form-item">
                                <input type="text" style="width:200px" name="cname" value="{{ old('cname')}}">
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