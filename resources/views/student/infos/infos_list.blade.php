@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li>消息列表</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                动态消息
                    <!-- Split button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm">显示选项</button>
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/student/load_infos/is_read" id="btn-is-read">已读</a></li>
                            <li><a href="/student/load_infos/un_read" id="btn-un-read">未读</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/student/load_infos/all" id="btn-all">全部消息</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    @if( count($infos) == 0)
                        <h4>暂无新消息</h4>
                    @else
                        <div class="list-group">
                            @foreach( $infos as $info )
                                            
                                @if( $info->is_read == 0 )
                                <div  class="list-group-item un_read"> 
                                    <span class="btn btn-danger btn-xs read" >
                                    <i class="icon icon-time"></i>
                                    </span> &nbsp; 
                                    {!! $info->content !!}  {{ $info->created_at }}
                                    <input type="hidden" name="" class="id" value="{{ $info->id }}" >
                                </div>
                                @else
                                <div  class="list-group-item is_read"> 
                                    <span class="btn btn-success btn-xs">
                                    <i class="icon icon-time"></i>
                                    </span> &nbsp; 
                                    {!! $info->content !!} {{ $info->created_at }}
                                    <input type="hidden" name="" class="id" value="{{ $info->id }}" >
                                </div>
                                @endif
                            
                            @endforeach
                        </div>
                        @if(!isset($one_record))
                            {{ $infos->links() }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        
        //标记为已读
        $('.read').click(function(){

            var info_item = $(this);
            var info_id = $(this).parent().children('.id').val();
            $.get(
                '/student/mark_info_read/' + info_id,
                {},
                function(data)
                {
                    $(info_item).removeClass('read');
                    $(info_item).removeClass('btn-danger');
                    $(info_item).addClass('btn-success');
                }
                );
        });

    });


</script>
@endsection
