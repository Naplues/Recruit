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
                <li>投递列表</li>
            </ol>
        </div>
    </div>
    <!-- 消息提示框 -->
    <div class="row success hide">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>发送成功</strong> 查看我发送的消息
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            简历投递列表
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="expand_all" aria-label="...">展开全部
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                
                @foreach( $delivers as $deliver )
                	@if( count($deliver) != 0 )
                    <div class="deliver_item">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>职位 <a href="/company/position_show/{{ $deliver[0]->position->id }}">
                                {{ $deliver[0]->position->name }}</a> 收到 <b>{{ count($deliver) }}</b> 份简历:</h4>
                            </div>
                            <div class="col-md-6 text-left">
                                <button class="btn btn-success btn-sm expand">展开</button>
                            </div>
                        </div>
                        <!-- 操作按钮组 -->
                        <div class="row operate hide">
                            <div class="col-md-12">
                                <button class="btn btn-danger send" data-toggle="modal" data-target="#dialog"
                                data-backgrop="static" data-keyboard="true">发送通知</button>
                            </div>
                        </div>
                        <br>

                        <div class="list-group hide">
                        @foreach( $deliver as $d )
                            <input type="hidden" class="resume_owner_id" value="{{ $d->resume->owner->id }}" 
                            data-name="{{ $d->resume->owner->name }}" data-did="{{ $d->id }}">
                            <div class="list-group-item">
                                <span>{{ $d->resume->owner->name }}</span> 的简历
                                <a href="/company/resume_show_in_lib/{{ $d->resume->id }}"><b>{{ $d->resume->name }}</b></a>
                                <button class="btn btn-danger btn-xs">淘汰</button>
                            </div>
                            
                        @endforeach
                        </div>
                    </div>
                    <hr>
                	@endif
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dialog"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">发送面试通知</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label for="day">收信人</label>
                            <div class="well" id="dialog_name" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details">通知内容</label>
                            <textarea class="form-control" id="details" name="details" rows="8" placeholder="请输入笔试，面试时间地点等相关事宜"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="button" id="send">发送</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        //单个职位展开按钮
        $('.expand').each(function(){
            $(this).click(function(){
                var list = $(this).parent().parent().parent().children('.list-group');   //列表组
                var operate = $(this).parent().parent().parent().children('.operate');   //操作按钮组

                if($(this).text() == '展开')
                {
                    list.removeClass('hide');
                    operate.removeClass('hide');
                    $(this).text('收起');
                    $(this).removeClass('btn-success');
                }
                else
                {
                    list.addClass('hide');
                    operate.addClass('hide');
                    $(this).text('展开');
                    $(this).addClass('btn-success');
                }
                
            });
        });

        //展开所有职位的投递简历
        $('#expand_all').change(function(){
            if($(this).prop('checked') == true)
            {
                $('.list-group').removeClass('hide');
                $('.operate').removeClass('hide');
                $('.expand').prop('disabled', 'disabled');
            }
            else
            {
                $('.list-group').addClass('hide');
                $('.operate').addClass('hide');
                $('.expand').prop('disabled', false);
            }
        });

        //打开模态框的按钮
        var button;
        //模态框显示前的操作
        $('#dialog').on('show.bs.modal', function (event) {
            button = $(event.relatedTarget);  //获取点击按钮

            var nameStr = '';
            var list = button.parent().parent().parent().children('.list-group').children('.resume_owner_id');
            list.each(function(){
                nameStr += '<button class="btn btn-info btn-xs" style="margin:3px;">' + $(this).data('name') +
                     '</button> ';
            });
            $('#dialog_name').html(nameStr);
        });

        //发送按钮,Ajax
        $('#send').click(function(){
            //获取学生id
            var id = new Array();
            var did = new Array();
            var list = button.parent().parent().parent().children('.list-group').children('.resume_owner_id');
            var deliver_item = button.parent().parent().parent();
            list.each(function(){
                id.push($(this).val());
                did.push($(this).data('did'));
            });

            $.get(
                '/company/accept_selected_resume',
                {
                    uids : id,
                    dids : did,
                    details : $('#details').val()
                },
                function(){
                    $('#dialog').modal('hide');  //关闭模态框
                    deliver_item.addClass('hide');   //隐藏发送过通知的简历列表
                    $('.success').removeClass('hide');   //显示发送结果
                    $(".success").delay(3000).hide('fade');
                });
        });
    });
</script>
@endsection
