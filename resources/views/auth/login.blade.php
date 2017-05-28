@extends('layouts.app')

@section('content')
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#email').focus();
        $('#email').blur(function(){
            
            var result = false;
            $.get(
                '/student/validate_type',
                {
                    'email': $('#email').val()
                },
                function(data){
                    
                    if(data.type == 1)
                    {
                        $('#login').removeClass('disabled')
                        $('.error').addClass('hide');
                        result = true;  //类型正确
                    }
                    else
                    {
                        $('#login').addClass('disabled');
                        $('.error').removeClass('hide');
                        result = false;  //类型错误
                    }
                }
            );
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success">
                <div class="panel-heading">学生登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">用户</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="请输入用户邮箱"><!-- 用户邮箱输入框-->
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">密码</label>
                            <div class="col-md-8"><!-- 密码输入框-->
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="usertype" value="1"><!-- 隐藏域代表用户类型-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我</label><br>
                                    <span class="error hide text-danger">用户类型不匹配,重新输入用户名</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4"><!-- 登录按钮-->
                                <button type="submit" id="login" class="btn btn-primary">
                                    登录
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
