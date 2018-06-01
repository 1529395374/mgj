@extends('Admin.index')
@section('content')
    {{--显示错误信息--}}
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
                <form class="mws-form" action="/admin/adver" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">

                        <div class="mws-form-row">
                            <label class="mws-form-label">顾客信息</label>
                            <div class="mws-form-item">
                                <input type="text" name="acustomer" class="small" value="{{ old('acustomer') }}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">广告标题</label>
                            <div class="mws-form-item">
                                <input type="text" name="atitle" class="small" value="{{ old('atitle') }}">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">广告地址</label>
                            <div class="mws-form-item">
                                <input type="text" name="aurl1" class="small" value="{{ old('aurl1') }}">
                            </div>
                        </div>
                        <div class="mws-form-row" style="width: 650px">
                            <label class="mws-form-label">广告图片</label>
                            <div class="mws-form-item">
                                <input type="file" name="apic1" class="small">
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">￥价格</label>
                            <div class="mws-form-item" style="width: 100px">
                                <input type="text" name="aprice" class="small" value="{{ old('aprice') }}"><b>￥</b>
                            </div>
                        </div>
                    </div>
                    <div class="mws-button-row">
                        <input type="submit" value="添加" class=" btn btn-success">
                        <input type="reset" value="重置"  class=" btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="mws-footer">
        Copyright Your Website 2012. All Rights Reserved.
    </div>

    </div>
    <!-- Main Container End -->

@endsection