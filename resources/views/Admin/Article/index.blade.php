@extends('Admin.index')
@section('content')
<style type="text/css">
    .page ul,.page li{
        list-style-type: none;
    }

    .page li{
        float: left;
        height: 20px;
        padding: 0 10px;
        display: block;
        font-size: 12px;
        line-height: 20px;
        text-align: center;
        cursor: pointer;
        outline: none;
        background-color: #444444;
        color: #fff;
        text-decoration: none;
        border-right: 1px solid #232323;
        border-left: 1px solid #666666;
        border-right: 1px solid rgba(0, 0, 0, 0.5);
        border-left: 1px solid rgba(255, 255, 255, 0.15);
        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }

    .page a{
        color:#fff;
    }

    .page .active{
        background: #c5d52b;
        color:#323232;
    }

    .page .disabled{
            color: #666666;
            cursor: default;
    }

</style>
<!-- 内容开始 -->
            <div class="container">    
               <div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                    <span>
                      <i class="icon-table"></i>{{ $title }}&nbsp;&nbsp;&nbsp;&nbsp;共有数据：{{ $count }}条</span>
                  </div>
                  <div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                    <form id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid" action="/admin/articles" method="get">
                      <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>显示
                          <select name="page_count" id="">
                           <option value="5"
                               @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 5)
                               selected 
                               @endif >5条
                            </option>
                           <option value="15"
                             @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 15)
                                 selected 
                                 @endif >15条
                            </option>
                             <option value="25"
                             @if(isset($search['page_count']) && !empty($search['page_count']) && $search['page_count'] == 25)
                                 selected 
                                 @endif >25条
                            </option>
                   </select>
                      </div>
                      <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>搜索:
                          <input type="text" aria-controls="DataTables_Table_1" name="search"  placeholder="请输入文章标题" value="{{$search['search'] or ''}}">
                        <input type="submit" name="" value="搜索">
                      </label></div>
                      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    </form>
                        <tr>
	                        <th>ID</th>
	                        <th>文章标题</th>
	                        <th>文章作者</th>
	                        <th>发布时间</th>
	                        <!-- <th>文章图片</th> -->
	                        <th>操作</th>
                    	</tr>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach($data as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->author}}</td>
                            <td>{{$v->created_at}}</td>
                            
                            <td>
                                <a href="javascript:;" class="btn btn-danger art_delete">删除</a>
                                <a href="/admin/articles/{{$v->id}}/edit" class="btn btn-warning">修改</a>
                                <a href="/admin/articles/{{$v->id}}" class="btn btn-info">查看文章内容</a>
                            </td>
                        </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                        <div class="page dataTables_paginate paging_full_numbers">
                            {!! $data->appends($search)->render() !!}
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- 内容结束-->
<script type="text/javascript">
  $('.art_delete').click(function(){
    //设置ajax保护
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        }); 
      //发送ajax
      var id = $(this).parent().prev().prev().prev().prev().text();
      var tr = $(this).parent().parent();
      // alert(id)
      $.ajax({
        url:'/admin/articles/'+id,
        type:'DELETE',
        dataType:'json',
        success:function(msg){
          if (msg.status == 1) {
            layer.msg(msg.msg, {icon: 6, time: 1000});
            tr.remove();
          } else {
            layer.msg(msg.msg, {icon: 5, time: 1000});
          }
        },
        async:true,
      });
  });
</script>
@endsection