@extends('Admin.index')
@section('content')
<div class="mws-panel grid_5">
            <div class="mws-panel-header">
                <span>修改名称</span>
            </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/order/{{$data->wlid}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="mws-form-inline">
                        <div class="mws-form-row">
                            <label class="mws-form-label">订单号</label>
                            <div class="mws-form-item">
                                <input type="text" style="width:200px" name="wlid" value="{{$data->wlid}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">状态</label>
                            <div class="mws-form-item">
                                <input type="radio" name="state" value="1" {{$data->state == 1 ? 'checked' : ''}}>已付款&nbsp;
                                <input type="radio" name="state" value="2" {{$data->state == 2 ? 'checked' : ''}}>已发货&nbsp;
                                 <input type="radio" name="state" value="3" {{$data->state == 3 ? 'checked' : ''}}>已签收&nbsp;
                                <input type="radio" name="state" value="4" {{$data->state == 4 ? 'checked' : ''}}>订单已取消
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