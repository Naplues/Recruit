@extends('layouts.student')

@section('content')


<script type="text/javascript">
    $(document).ready(function() {/*
        $('.edit_button').hide();
        $('#edit').click(function(){

            if($('#edit').val() == 'show')
            {
                $('.edit_button').show();
                
                $('#edit_span').text('返回预览');
                $('#edit').val('hide');
                $('#edit').removeClass('btn-success');
                $('#edit').addClass('btn-default');
            }
            if($(('#edit').val()) == 'hide')
            {

                $('.edit_button').hide();

                $('#edit_span').text('编辑简历');
                $('#edit').val('show');
                $('#edit').removeClass('btn-default');
                $('#edit').addClass('btn-success');
            }

        });*/
        $('#edit').click(function(){
            $('.hide').removeClass('hide');
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li><a href="/student/resume_list/{{ $auth->id }}">简历列表</a></li>
                <li>简历列表</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    我的简历 完整度 {{ $resume->complete }}%
                    @if($resume->is_post == 0 )
                        <button id="edit" class="btn btn-success btn-sm" value="show">
                            <i class="icon icon-edit"></i>
                            <span id="edit_span">编辑简历</span>
                        </button>
                    @else
                        <button id="edit" class="btn btn-success btn-sm disabled" data-toggle="tooltip" data-placement="top" title="简历已经投放人才库，不可编辑" >
                            <i class="icon icon-edit"></i>
                            <span id="edit_span">编辑简历</span>
                        </button>
                    @endif

                </div>

                <div class="panel-body">
                    
                    @if(!isset($resume))
                        <h1>数据出错</h1>
                    @else

                        <h4>求职名称：<span class="badge">{{ $resume->name }}</span></h4>

                        @include('common.resume.module_item_basic_student')
                        @include('common.resume.module_item_education_student')
                        @include('common.resume.module_item_contact_student')
                        @include('common.resume.module_item_project_student')
                        @include('common.resume.module_item_work_student')
                        @include('common.resume.module_item_award_student')
                        @include('common.resume.module_item_job_student')
                        @include('common.resume.module_item_skill_student')
                        @include('common.resume.module_item_comment_student')
                        @include('common.resume.module_item_attach_student')

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
