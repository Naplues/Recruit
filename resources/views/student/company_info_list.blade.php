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
                <li class="active">公司列表</li>
            </ol>
        </div>
    </div>
    <!-- 页面展示 -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    有 {{ $companies->total() }}家公司符合要求
                    <a href="{{ $companies->url(1) }}">首页</a>
                    <a href="{{ $companies->previousPageUrl() }}">上一页</a>
                    <a href="{{ $companies->nextPageUrl() }}">下一页</a>
                    <a href="{{ $companies->url( $companies->lastPage() ) }}">尾页</a>
                </div>
                <div class="panel-body">
                    @include('common.lists.module_list_company_student')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
