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
                <li><a href="/guest/get_positions_list">职位列表</a></li>
                <li class="active">职位详情</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    职位详情
                    @if( $has_deliver == 0 )
                        @if(Auth::guest())
                        <button class="btn btn-success resume_post" id="resume_post" name="resume_post" disabled>投递简历</button>
                        @else
                        <button class="btn btn-success resume_post" id="resume_post" name="resume_post" >投递简历</button>
                        @endif
                        
                    @else
                        <span>
                            已投递过简历，请等待公司回应或查看该公司
                            <a href="/student/position_other_list/{{$position->id}}">其它职位</a>
                        </span>
                    @endif
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        <input type="hidden" id="pid" name="pid" value=" {{ $position->id or '' }} ">
                            
                            @if(isset($position))
                            <h1>
                                职位名称：{{ $position->name or '' }}
                                <!-- 游客不显示此按钮 -->
                                @if(!Auth::guest())
                                    @if($isCollect == true)
                                    <small id="isCollect">已收藏</small>
                                    <button class="btn btn-default btn-xs" id="collect" value="collect" ><span id="f_value">已收藏</span></button>
                                    @else
                                    <small id="isCollect">未收藏</small>
                                    <button class="btn btn-danger btn-xs" id="collect" value="uncollect" ><span id="f_value" >收藏职位</span></button>
                                    @endif
                                @endif

                            </h1>
                            <div class="jumbotron h4">
                                <div class="bg-info">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <i class="icon icon-building"></i> <b>公司：</b><a href="/guest/goto_company_info/{{ $position->company->id }}">{{ $position->company->name }}</a>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <i class="icon icon-time"></i>
                                            <b>发布时间：</b> {{ $position->created_at  or ''}}<br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="icon icon-money"></i>
                                            <b>月薪：</b> {{ $position->salary or '' }}
                                        </div>
                                        <div class="col-md-6">
                                            <span id="collection_number">{{ $position->collection_number or '' }}</span>人<b>已收藏</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <b>招聘人数：</b> {{ $position->recruit_number or '' }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>投递人数：</b> {{ $position->post_number or '' }}
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>职位职责</h3>
                                        <p>{{ $position->abstract  or ''}}</p>
                                    </div>
                                </div>
                            </div>
                                @if( $has_deliver == 0 )
                                    @if(Auth::guest())
                                    <button class="btn btn-success resume_post" id="resume_post" name="resume_post" disabled>投递简历</button>
                                    @else
                                    <button class="btn btn-success resume_post" id="resume_post" name="resume_post" >投递简历</button>
                                    @endif
                                @else
                                    <span>
                                        已投递过简历，请等待公司回应或查看该公司
                                        <a href="/student/position_other_list/{{$position->id}}">其它职位</a>
                                    </span>
                                @endif
                            @else
                            <h1>该职位已经撤销</h1>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    @if(isset($position))
        @include('student._modals')
    @endif

<script type="text/javascript">
    $(document).ready(function() {
        $('.resume_post').click(function(){

            $('#resume_deliver').modal();   //显示模态框 

        });
        
    });
</script>
<script type="text/javascript">
    

$(document).ready(function() {
    $('#collect').click(collect);
});


function collect()
{
    if( $('#collect').val() == 'uncollect' )
        collectUp();
    else
        collectDown();
}

//关注
function collectUp()
{
    $.get('/student/collection/' + $('#pid').val(),
        {},
        function(data)
        {
            $('#collection_number').text(data.collection_number);  //关注数目
            $('#isCollect').text('已收藏');    //关注信息
            $('#collect').removeClass('btn-success');
            $('#collect').addClass('btn-default');
            $('#collect').val('collect');
            $('#f_value').text('取消收藏');
        }
    );
}

//取消
function collectDown()
{
    $.get('/student/uncollection/' + $('#pid').val(),
        {},
        function(data)
        {
            $('#collection_number').text(data.collection_number);  //关注数目
            $('#isCollect').text('未收藏');    //关注信息
            $('#collect').removeClass('btn-default');
            $('#collect').addClass('btn-success');
            $('#collect').val('uncollect');
            $('#f_value').text('收藏职位');
        }
    );
}
</script>
@endsection


