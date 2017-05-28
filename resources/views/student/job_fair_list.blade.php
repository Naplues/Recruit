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
                <li>招聘会列表</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">招聘会列表</div>

                <div class="panel-body">
                    @if( count($lists) == 0 )
                        <h4>暂未发布任何招聘会信息</h4>
                    @else
                        @include('common.lists.module_list_job_fair_student')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
