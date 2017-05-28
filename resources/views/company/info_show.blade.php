@extends('layouts.company')

@section('content')
<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/company/index">主页</a></li>
            @endif
                <li>公司详情</li>
                
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
                        
                        <div>
                            <h1>单位名称： {{ $company_info->name }}</h1>
                            规模： {{ CompanyInfo::getScale($company_info->scale) }}<br>
                            公司地址： {{ $company_info->address }}<br>
                            公司性质： {{ CompanyInfo::getCompanyProperty($company_info->property) }}<br>
                            公司行业： {{ $company_info->industry }}<br>
                            邮箱：{{ $company_info->email }}<br>
                            电话：{{ $company_info->phone }}<br>
                            公司简介： {{ $company_info->abstract }}<br>
                            是否认证： {{ CompanyInfo::getAuth( $company_info->auth ) }}<br>
                            关注人数： {{ $company_info->focus }}<br>
                            发布职位数量： {{ $company_info->job_number }}<br>
                        </div>
                        <a href="/company/position_add">
                            <button class="btn btn-primary">发布职位</button>
                        </a>
                        
                        <div class="text-right">
                            <a href="/company/info_edit">
                                <button class="btn btn-success">更新信息</button>
                            </a>
                        </div>
                        
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
