@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">消息动态</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>{{ count($unauth) }}家公司注册</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/admin/auth_company" class="btn btn-success btn-sm btn-block">前往验证</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>0公司入驻招聘会</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-success btn-block btn-sm">查看入驻信息</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
        </div>
    </div>
    <!-- 系统资料面板 -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    系统资料
                </div>
                <div class="panel-body">
                    <div class="jumbotron">
                        <h2>注册公司：<span class="text-danger">{{ $company_number or 0 }}</span> 家</h2>
                        <h2>注册学生：<span class="text-danger">{{ $user_number or 0 }}</span>人</h2>
                        <h2>宣讲会：<span class="text-danger">{{ $career_talk_number or 0 }}</span>场</h2>
                        <h2>招聘会：<span class="text-danger">{{ $job_fair_number or 0 }}</span>场</h2>
                        <h2>职位数：<span class="text-danger">{{ $position_number or 0 }}</span>个</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
