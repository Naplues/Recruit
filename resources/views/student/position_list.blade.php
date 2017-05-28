@extends('layouts.student')


@section('content')
<div class="container">
    <!-- 路径导航 -->
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li>职位列表</li>
            </ol>
        </div>
    </div>
    <!-- 页面展示 -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <form action="/position_search" method="GET">
                <div class="input-group input-group-lg">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" id="position_search_toggle" type="button">精确查找</button>
                    </span>
                    <input type="text" class="form-control" id="name" name="position_name" placeholder="输入职位名称或关键字">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="icon icon-search"></i>
                        搜索职位</button>
                    </span>
                </div><!-- /input-group -->
            </form>
            <!-- 详细搜索框 -->
            @include('common.search.module_search_positions_student')
            <br>
            
            <div class="panel panel-success">
                <div class="panel-heading">
                    
                    共有<b>{{ $positions->total() }}</b>个相关职位
                    <a href="{{ $positions->url(1) }}">首页</a>
                    <a href="{{ $positions->previousPageUrl() }}">上一页</a>
                    <a href="{{ $positions->nextPageUrl() }}">下一页</a>
                    <a href="{{ $positions->url( $positions->lastPage() ) }}">尾页</a>
                </div>
                <div class="panel-body">
                    <!-- 职位列表展示模块 -->
                    @include('common.lists.module_list_position_student')
                    @if( count($positions) == 0 )
                        <h2>没有找到相关职位，换换查找条件吧。</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('#position_search_toggle').click(function(){
            
            if( $('#module_search_positions').hasClass('hide') )
                $('#module_search_positions').removeClass('hide');
            else
                $('#module_search_positions').addClass('hide');
        });
    });
</script>
@endsection