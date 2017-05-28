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
                <li><a href="/company/position_list">职位列表</a></li>
            @endif
                <li>职位详情</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">职位详情</div>

                <div class="panel-body">
                    <h1>职位名称：{{ $position->name or '' }}</h1>

                    发布时间： {{ $position->created_at  or ''}}<br>
                    月薪： {{ $position->salary or '' }}<br>
                    招聘人数： {{ $position->recruit_number or '' }}<br>
                    投递人数：{{ $position->post_number or '' }}<br>
                    <h3>职位职责</h3>
                    <p class="bg-info">
                        {{ $position->abstract  or ''}}
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
