@extends('Admin.index')
@section('content')
<div class="mws-panel grid_5">
            <div class="mws-panel-header">
                <span>修改名称</span>
            </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/cate/{{$data->cid}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label class="mws-form-label">商品类别</label>
                            <div class="mws-form-item">
                                <select style="width:200px" name="pid" disabled="disabled">
                                    <option value="">{{$data->pname}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">类别名称</label>
                            <div class="mws-form-item">
                                <input type="text" style="width:200px" name="cname" value="{{$data->cname}}">
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