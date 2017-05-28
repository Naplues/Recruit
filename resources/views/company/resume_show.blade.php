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
                <li><a href="/company/resume_search">简历列表</a></li>
                <li>简历展示</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    简历浏览
                    <button class="btn btn-danger btn-sm" id="send" 
                    data-toggle="modal" data-target="#info" data-backdrop="static" data-keyboard="true">发送通知</button>
                </div>

                <div class="panel-body">
                
                    @if(!isset($resume))
                        <h1>数据出错</h1>
                    @else

                        简历名称：{{ $resume->name }}<br>

                        @include('common.resume.module_item_basic_student')
                        @include('common.resume.module_item_education_student')
                        @include('common.resume.module_item_contact_student')
                        @include('common.resume.module_item_work_student')
                        @include('common.resume.module_item_project_student')
                        @include('common.resume.module_item_award_student')
                        @include('common.resume.module_item_job_student')
                        @include('common.resume.module_item_skill_student')
                        @include('common.resume.module_item_comment_student')
                        @include('common.resume.module_item_attach_student')

                    @endif

                </div>
            </div><!-- .panel -->
        </div><!-- .col-md-12 -->
    </div><!-- .row -->
</div><!-- .container -->

<div class="modal fade" id="info"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">发送面试通知</h4>
            </div>
            <div class="modal-body">

                <form action="/company/accept_resume" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="uid" value="{{$resume->owner->id}}" >
                    <input type="hidden" name="rid" value="{{$resume->id}}" >
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label for="day">收信人</label>
                                <input type="text" class="form-control disabled" disabled value="{{ $resume->owner->name }}" id="name" name="name"  >
                            </div>

                            <div class="form-group">
                                <label for="details">通知内容</label>
                                <textarea class="form-control" id="details" name="details" rows="5" placeholder="请输入笔试，面试时间地点等相关事宜"></textarea>
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-success">发送</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" >
    $(document).ready(function() {
        
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    });
</script>
@endsection
