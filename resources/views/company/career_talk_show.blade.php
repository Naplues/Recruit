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
                <li><a href="/company/career_talk">宣讲列表</a></li>
                <li class="active">宣讲会详情</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">宣讲会详情</div>

                <div class="panel-body">
                    
                    @if(isset($talk))
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    宣讲学校：<strong>{{ $talk->college }}</strong>
                                    <small>发布者<a href="/company/goto_company_info/{{ $talk->company->id }}">
                                        {{ $talk->company->name }}
                                    </a></small>

                                </h4>
                                
                                <h4>
                                    举办日期：{{ $talk->day }}
                                </h4>
                                <h4>
                                    城市：{{ $talk->city }}
                                    <small>详细地址：{{ $talk->address }}</small>
                                </h4>
                                
                                <div class="bg-info">{{ $talk->details }}</div>
                            </div>
                            
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
