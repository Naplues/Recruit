@extends('layouts.student')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    initdatepicker_cn();
    $('#time').datepicker();

  });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if( count($infos) != 0 )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="badge">新消息</span>
                    {!! $infos[0]->content !!}
                    <a href="/student/get_unread_info_list">查看全部</a>
                </div>
            @endif

        </div>
    </div>

    <!-- 信息速览 -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">信息速览</div>

                <div class="panel-body">
                
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>{{ $info_number or 0 }}条未读消息</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="get_unread_info_list" class="btn btn-success btn-block">查看未读</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-danger text-center">
                                <div class="panel-heading">
                                    
                                    <span class="badge">
                                    <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>我 的 简 历</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/student/resume_list/{{ $auth->id }}" class="btn btn-success btn-block">
                                    管理简历</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-info text-center">
                                <div class="panel-heading">

                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>职 位 预 览</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/guest/get_positions_list" class="btn btn-success btn-block">寻找职位</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-warning">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-user icon-4x"></i>
                                    <h3>个人账户资料</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/student/profile_details" class="btn btn-success btn-block">进入账户</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- .panel-body -->
            </div><!-- .panel -->
        </div>
    </div><!-- .row -->

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">企业查询</div>

                <div class="panel-body">
                    
                    <form action="/student/company_search" method="GET">
                        <div class="input-group input-group-lg">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="company_search_toggle" type="button">精确查找</button>
                            </span>
                            <input type="text" class="form-control" id="company_name" name="name" placeholder="输入企业全称或关键词">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="submit" type="submit">
                                <i class="icon icon-search"></i>
                                搜索企业</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                    
                    @include('common.search.module_search_companies')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            待完善的简历 
                        </div>
                        <div class="col-md-6">
                            <form id="form_new_resume_body" action="/student/resume_create" method="GET">
                                <div class="input-group ">
                                    <input type="text" class="form-control input-sm" id="name" name="name" placeholder="输入职位名称" required>
                                    <span class="input-group-btn">
                                        <button id="open_modal_body" class="btn btn-success btn-sm" type="button" data-toggle="modal" >新建简历</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <div class="col-md-2">
                            <a href="/student/resume_list/{{ $auth->id }}">更多简历</a>
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body">
                    @if( count($resumes) != 0 )
                        <div class="list-group">
                            @foreach( $resumes as $resume )
                                <div class="list-group-item">
                                    <a href="/student/resume_show/{{ $resume->id }}">{{ $resume->name }}</a>
                                    <span class="badge">{{ $resume->complete }}%</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        没有不完善的简历，查看我的<a href="/student/resume_list/{{ $auth->id }}">简历列表</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    最新动态
                    <a href="/student/get_dynamics_list/all">更多动态</a>
                </div>
                <div class="panel-body">
                    @if( count($dynamics) != 0 )
                        <div class="list-group">
                            @foreach( $dynamics as $dynamic )
                                @foreach( $dynamic as $d )
                                    <div class="list-group-item">
                                        {!! $d->content !!}<a href="/student/get_dynamics_list/{{ $d->cid }}">更多</a>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#module_search_companies').hide();
        //$('#module_search_positions').hide();
        
        $('#company_search_toggle').click(function(){
            var input = $('#company_name');
            var submit_btn = $('#submit');
            if( $('#module_search_companies').hasClass('hide') )    //如果有hide，则去掉，否则加上
            {
                $('#module_search_companies').removeClass('hide');
                input.prop('disabled', 'disabled');
                submit_btn.prop('disabled', 'disabled');
            }
            else
            {
                $('#module_search_companies').addClass('hide');
                input.prop('disabled', false);
                submit_btn.prop('disabled', false);
            }
        });
        
        $('#position_search_toggle').click(function(){
            if( $('#module_search_positions').hasClass('hide') )
                $('#module_search_positions').removeClass('hide');
            else
                $('#module_search_positions').addClass('hide');
        });
    });
</script>


<div class="modal fade bs-example-modal-sm" id="new_resume_body" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">确认框</h4>
            </div>
            <div class="modal-body">
                <button class="btn btn-success" id="add_new_resume_body">确认添加</button>
                <button class="btn btn-danger" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add_new_resume_body').click(function(){
            $('#form_new_resume_body').submit();
        });
        //打开模态框
        $('#open_modal_body').click(function(){
            $('#new_resume_body').modal({backdrop: 'static', keyboard: false});
        });
    });
</script>
@endsection
