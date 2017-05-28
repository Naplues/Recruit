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
                <li>账户资料</li>
            </ol>
        </div>
    </div>
    <div class="row success hide">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>密码修改成功</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">账户资料</div>

                <div class="panel-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#deliver" aria-controls="deliver" role="tab" data-toggle="tab">投递我的</a>
                            </li>
                            <li role="presentation">
                                <a href="#collect" aria-controls="collect" role="tab" data-toggle="tab">被收藏的职位</a>
                            </li>
                            <li role="presentation">
                                <a href="#follow" aria-controls="follow" role="tab" data-toggle="tab">关注我的</a>
                            </li>
                            <li role="presentation">
                                <a href="#reset" aria-controls="reset" role="tab" data-toggle="tab"><b>重置密码</b></a>
                            </li>
                        </ul>
                        <br>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="deliver">
                                @if( count($delivers) == 0)
                                    <h4>没有投递记录</h4>
                                @else
                                    <div class="list-group">
                                        @foreach( $delivers as $deliver )
                                        <!-- 某个职位有投递记录 -->
                                            @if( count( $deliver ) != 0 )
                                                职位：<a href="/company/position_show/{{ $deliver[0]->position->id }}">{{ $deliver[0]->position->name  or ''}}</a> 收到的简历:<br>
                                                @foreach( $deliver as $d )

                                                    <a href="/company/resume_show_in_lib/{{ $d->resume->id }} " class="list-group-item"> {{ $d->resume->name or '' }} </a>
                                                @endforeach
                                                <hr>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane" id="collect">
                                @if( count($collects) == 0)
                                    <h4>没有职位被收藏</h4>
                                @else
                                        @foreach( $collects as $collect )
                                        <div class="list-group">
                                            @foreach( $collect as $c )
                                            <div class="list-group-item">
                                                <a href="/company/position_show/{{ $c->position->id }}">
                                                {{ $c->position->name }} </a>
                                                <span class="badge"> {{ $c->message or 0 }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    
                                @endif
                            </div>
                            
                            <div role="tabpanel" class="tab-pane" id="follow">
                                @if( count($follows) == 0)
                                    <h4>暂未有人关注</h4>
                                @else
                                    <div class="list-group">
                                        @foreach( $follows as $follow )
                                            <a href="#/company/get_resume_list/{{ $follow->user->id }} " class="list-group-item"> {{ $follow->user->name }} </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane" id="reset">
                                <form >
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label for="old_pwd">原密码</label>
                                                <input type="password" class="form-control" id="old_pwd" name="old_pwd" placeholder="请输入原密码" required>
                                                <div class="text-danger hide" id="old_pwd_info"><strong>原密码有误</strong></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label for="new_pwd">新密码</label>
                                                <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="请输入新密码" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label for="con_pwd">确认密码</label>
                                                <input type="password" class="form-control" id="con_pwd" name="con_pwd" placeholder="确认密码" required>
                                                <div class="text-danger hide" id="con_pwd_info"><strong>两次密码不一致</strong></div> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                           
                                    <p class="text-center">
                                        <button class="btn btn-danger" disabled type="button" id="submit">确认修改</button>
                                    </p>

                                </form>
                            </div><!-- .tab-pane -->
                        </div>

                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //原密码输入框失去焦点
        $('#old_pwd').blur(function(){
            if( $('#old_pwd').val() != '' )
            {
                $.get(
                '/company/check_pwd',
                {
                    pwd : $('#old_pwd').val()
                },
                function(data){
                    if(data == 'right')
                    {
                        $('#old_pwd_info').addClass('hide');
                        $('#new_pwd').prop('disabled', false);
                        $('#con_pwd').prop('disabled', false);
                    }
                    else
                    {
                        $('#old_pwd_info').removeClass('hide');
                    }
                });
            }
        });
        //确认框
        $('#con_pwd').keyup(function(){
            var new_pwd = $('#new_pwd').val();
            var con_pwd = $('#con_pwd').val();
            if( new_pwd == con_pwd )   //密码一致
            {   
                $('#con_pwd_info').removeClass('hide');
                $('#con_pwd_info').removeClass('text-danger');
                $('#con_pwd_info').addClass('text-success');
                $('#con_pwd_info').html('密码输入一致');
                $('#submit').prop('disabled', false);
            }
            else    //密码不一致
            {   /*
                $('#con_pwd_info').removeClass('hide');
                $('#con_pwd_info').removeClass('text-success');
                $('#con_pwd_info').addClass('text-danger');
                $('#con_pwd_info').html('密码有误');*/
                $('#submit').prop('disabled', 'disabled');
            }
        });

        //提交
        $('#submit').click(function(){
            $.get(
                '/company/reset_password'
                ,
                {
                    pwd : $('#new_pwd').val()
                },
                function(data){
                    $('.success').removeClass('hide');
                    $('.success').show();
                    $(".success").delay(3000).hide('fade');
                    $('#submit').prop('disabled', 'disabled');
                    $('#old_pwd').focus();
                    $('#old_pwd').val('');
                    $('#new_pwd').val('');
                    $('#con_pwd').val('');
                    $('#con_pwd_info').addClass('hide');
                });
        });

    });
</script>
@endsection
