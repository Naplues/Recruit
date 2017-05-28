@extends('layouts.student')

@section('content')
<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>

<script type="text/javascript" src="/js/company.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li><a href="/guest/get_companies_list">公司列表</a></li>
                <li class="active">公司详情</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    校招单位详情
                </div>

                <div class="panel-body">
                    
                    @if(!isset($company_info))
                        <h1>您还没有填写公司信息</h1>
                        <a href="/company/info_edit">
                            <button class="btn btn-success">马上填写</button>
                        </a>
                    @else
                        
                    <h1>
                        单位名称： {{ $company_info->name }}
                        <small>
                            <span class="badge">{{ CompanyInfo::getAuth( $company_info->auth ) }}</span>
                        </small>
                        <!-- 游客不显示此项 -->
                        @if (!Auth::guest())
                        <div class="text-right">
                            <input type="hidden" id="cid" name="cid" value="{{ $company_info->id }}">
                            @if($isFollow == true)
                                <h4 id="isFollow">已关注</h4>
                                <button class="btn btn-default btn-xs" id="follow" value="follow" >
                                    <span id="f_value">取消关注</span></button>
                            @else
                                <h4 id="isFollow">未关注</h4>
                                <button class="btn btn-success btn-xs" id="follow" value="unfollow" ><span id="f_value" >关注该公司</span></button>
                            @endif   
                        </div>
                        @endif
                    </h1>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3>
                                        <i class="icon icon-group icon-lg"></i>
                                        {{ CompanyInfo::getScale($company_info->scale) }}
                                    </h3>
                                </div>
                                <div class="panel-footer text-center">
                                        <h4>公司规模</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3>
                                        <i class="icon icon-tags icon-lg"></i>
                                        {{ CompanyInfo::getCompanyProperty($company_info->property) }}
                                    </h3>
                                </div>
                                <div class="panel-footer text-center">
                                        <h4>公司性质</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h2>
                                        <i class="icon icon-calendar icon-lg"></i>
                                        {{ $company_info->job_number }}
                                    </h2>
                                </div>
                                <div class="panel-footer text-center">
                                        <h4>职位数目</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1>
                                        <i class="icon icon-group icon-lg"></i>
                                        <span id="follow_number">{{ $company_info->focus }}</span>
                                    </h1>
                                </div>
                                <div class="panel-footer text-center">
                                        <h4>关注人数</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="jumbotron h4">
                    <div class="row">
                        <div class="col-md-12">
                            <b>公司行业：</b> {{ $company_info->industry }}
                        </div>
                        <div class="col-md-6">
                            <b>邮箱：</b>{{ $company_info->email }}
                        </div>
                        <div class="col-md-6">
                            <i class="icon icon-phone"></i>
                            <b>电话：</b>{{ $company_info->phone }}
                        </div>
                        <div class="col-md-12">
                            <b>公司地址：</b> {{ $company_info->address }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <b>公司简介：</b> {{ $company_info->abstract }}
                        </div>
                    </div>            
                </div>

                        


                        <h4>职位列表</h4>
                        <div class="list-group">
                            @foreach( $company_info->positions as $position )
                            <a href="/guest/goto_position_info/{{$position->id}}" class="list-group-item" >
                                {{ $position->name }}
                            </a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
