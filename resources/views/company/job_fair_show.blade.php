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
                <li><a href="/company/job_fair_list">招聘会列表</a></li>
                <li>招聘会详情</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">招聘会详情</div>

                <div class="panel-body">
                    @if( !isset($job_fair) )
                        <h4>数据出错</h4>
                    @else
                        @if( isset($joined) )
                            <h4>已入驻</h4>
                        @else

                            <a href="/company/join_job_fair/{{ $job_fair->id }}">
                                <button class="btn btn-success">申报席位</button>
                            </a>
                        @endif<br>

                        招聘会名称：{{ $job_fair->name }}<br>
                        招聘会地点：{{ $job_fair->host_address }}<br>
                        时间：{{ $job_fair->time }}<br>
                        席位：{{ $job_fair->total_number }}<br>
                        已用席位：{{ $job_fair->used_number }}<br>
                        详细说明：{{ $job_fair->details }}<br>
                        
                        @if( count($job_fair->joins) == 0 )
                            <h4>暂时没有公司入驻</h4>
                        @endif
                        <h4>入驻公司列表</h4>
                        <div class="list-group">
                            @foreach( $job_fair->joins as $join )
                                <a href="#" class="list-group-item">{{ $join->company->name }} </a>
                            @endforeach
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
