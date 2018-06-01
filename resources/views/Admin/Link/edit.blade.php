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
                        <form class="mws-form" action="/admin/link/{{$data['lid']}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="mws-form-inline">
                               
                                <div class="mws-form-row">
                                    <label class="mws-form-label">链接标题</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="lname" class="small" value="{{ $data->lname }}">
                                    </div>
                                </div>
                                <div class="mws-form-row" style="width: 650px">
                                    <label class="mws-form-label">链接原图片</label>
                                    <div class="mws-form-item">
                                        <img src="{{URL::asset($data->limg)}}" width="600px" height="600px">
                                    </div>
                                </div>
                                <div class="mws-form-row" style="width: 650px">
                                    <label class="mws-form-label">链接新图片</label>
                                    <div class="mws-form-item">
                                        <input type="file" name="limg" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">链接地址</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="lurl" class="small" value="{{ $data->lurl }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="修改" class=" btn btn-success">
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