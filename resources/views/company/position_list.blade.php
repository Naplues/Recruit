@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/company/index">主页</a></li>
            @endif
                <li>职位列表</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">所有职位</div>

                <div class="panel-body">
                    @if( isset($not_complete) )
                        <h3>请先完善单位信息</h3>
                        <a href="/company/info_edit">
                            <button class="btn btn-success">完善信息</button>
                        </a>
                    @else

                        @if(count($positions) == 0 )
                            <h1>贵公司还未发布任何职位</h1>
                            <a href="/company/position_add">
                                <button class="btn btn-success">立即发布</button>
                            </a>
                        @else
                        <h1>
                            职位列表
                            <a href="/company/position_add" >
                                <button class="btn btn-success">发布新职位</button>
                            </a>
                        </h1>
                        <div class="list-group">
                            @foreach( $positions as $position )
                                <li class="list-group-item">
                                    <a href="/company/position_show/{{$position->id}}">{{ $position->name }}</a>
                                    <div class="text-right">--{{ $position->created_at }}</div>
                                </li>
                            @endforeach                        
                        </div>

                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
