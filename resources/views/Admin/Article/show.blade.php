@extends('Admin.index')
@section('content')

<div class="container">
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>{{ $title }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/articles" method="post">
                            {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <div class="mws-form-item">
                                        <textarea class="small" name="content">{{$datas->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                              <a href="/admin/articles" class="btn btn-info">返回</a>
                            </div>
                        </form>
                    </div>
                </div>
</div>
            <!-- 内容结束-->

@endsection