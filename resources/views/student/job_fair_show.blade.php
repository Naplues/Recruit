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
                <li><a href="/guest/get_job_fairs_list">招聘会列表</a></li>
                <li class="active">招聘会详情</li>
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
                        @include('common.details.module_detail_job_fair_student')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
