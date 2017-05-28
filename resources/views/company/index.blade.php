@extends('layouts.company')

@section('content')
<link href="/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="/css/style.css" rel="stylesheet">
<link href="/css/style-responsive.css" rel="stylesheet">

<script src="/js/Chart.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //标记已读事件
        $('.read_button').click(function(){
            var info_item = $(this).parent();
            var info_id = info_item.children('.info_id').val();
            
            $.get(
                '/company/mark_info_read/' + info_id,
                {},
                function(data)
                {
                    info_item.addClass('hide');
                }
                );
        });

    });
</script><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if( count($infos) != 0 )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="badge">新消息</span>
                    {!! $infos[0]->content !!}
                    <a href="/company/get_unread_info_list">查看全部</a>
                </div>
            @endif

        </div>
    </div><!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">人才库查询</div>
                <div class="panel-body">
                    <form action="/company/resume_search" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="input-group input-group-lg">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="resume_search_toggle" type="button">精确查找</button>
                            </span>
                            <input type="text" class="form-control" id="resume_input" name="name" placeholder="输入简历名称：填写相关职位">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="submit" type="submit">
                                <i class="icon icon-search"></i>一键搜索简历</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                    
                    @include('common.search.module_search_resumes_company')

                </div>
            </div>
        </div>
    </div><!-- .row -->

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
                                    <h3>{{ $deliver_number or '0' }}份 新 简 历 </h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/company/resume_deliver" class="btn btn-success btn-block">查看新投递</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-danger">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>职 位 管 理</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/company/position_list" class="btn btn-success btn-block">职位管理</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-cloud-upload icon-4x"></i>
                                    <h3>宣 讲 安 排</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/company/career_talk" class="btn btn-success btn-block">宣讲安排</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-warning">
                                <div class="panel-heading text-center">
                                    
                                    <span class="badge">
                                        <i class="icon icon-user icon-4x"></i>
                                    <h3>公 司 资 料</h3></span>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/company/profile_details" class="btn btn-success btn-block">查看我的资料</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- .panel-body -->
            </div><!-- .panel -->
        </div>
    </div><!-- .row -->
    <!-- 公司动态 -->
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">公司动态</div>

                <div class="panel-body">
                @if( count($dynamics) != 0 )
                <div class="list-group">
                    @foreach( $dynamics as $dynamic )
                        <div class="list-group-item">
                            {!! $dynamic->content !!}<a href="/company/get_dynamics_list/{{ $dynamic->cid }}">更多</a>
                        </div>
                    @endforeach
                </div>
                @else
                    <h3>公司暂无动态</h3>
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
        
        $('#resume_search_toggle').click(function(){
            var input = $('#resume_input');
            var submit_btn = $('#submit');
            if( $('#module_search_resumes').hasClass('hide') )    //如果有hide，则去掉，否则加上
            {
                $('#module_search_resumes').removeClass('hide');
                input.prop('disabled', 'disabled');
                submit_btn.prop('disabled', 'disabled');
            }
            else
            {
                $('#module_search_resumes').addClass('hide');
                input.prop('disabled', false);
                submit_btn.prop('disabled', false);
            }
        });
        
    });
</script>
@endsection
