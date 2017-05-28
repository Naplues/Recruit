<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="toTop" content="true">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Font-Awesome/css/font-awesome.min.css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/toTop.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    @if (Auth::guest())
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @else
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/student/index') }}">
                        
                        {{ config('app.name', 'Laravel') }}学生端
                    </a>
                    @endif

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <!-- 游客不显示此项 -->
                        @if (!Auth::guest())
                        <li class="dropdown">
                            <a href="/resume_list" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 我的简历 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <form id="form_new_resume" action="/student/resume_create" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="输入职位名称" required>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" id="open_modal_head" type="button" data-toggle="modal">新建</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </form>
                                </li>
                                <li><a href="/student/resume_list/{{ $auth->id or '' }}">查看简历</a></li>
                            </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    招聘活动 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/student/career_talk">专场宣讲</a></li>
                        <li><a href="/student/job_fair_list">大型招聘</a></li>
                            </ul>
                        </li>

                    </ul>

                    
                    <form class="navbar-form navbar-left" action="/position_search" method="GET">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="position_name" name="position_name" placeholder="输入职位信息" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="icon icon-search"></i>
                                    搜索
                                    </button>
                                </span>
                            </div>
                        </div>
                        
                    </form>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="/position_search" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    找工作 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/student/position_search_type/0">找全职</a></li>
                                <li><a href="/student/position_search_type/1">找兼职</a></li>
                                <li><a href="/student/position_search_type/2">找实习</a></li>
                            </ul>
                        </li>


                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        账户 <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('login') }}">登录</a></li>
                                    <li><a href="{{ route('register') }}">注册</a></li>
                                </ul>
                            </li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        消息动态 <span class="badge" id="info_number"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" id="nav-info-list">
                                    
                                </ul>
                            </li>
                            <!-- 
                            <li>
                                <a href="/chat_student" class="btn btn-danger" target="_blank">
                                    <i class="icon icon-comments"></i> 聊天室
                                </a>
                            </li>
                             -->
                            
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/uploads/{{ $auth->avatar or 'images/student.jpg' }} " alt="..." width="25" height="25" class="img-rounded">
                                    
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/student/profile_avatar">头像设置</a></li>
                                    <li><a href="/student/profile_details">账户资料</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出账户
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- 显示部分内容 -->
        <style type="text/css">
            .info-list{
                max-width: 500px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        </style>

<script type="text/javascript" src="/js/jquery.pin.min.js"></script>
@if (!Auth::guest())
<script type="text/javascript">
    $(document).ready(function() {
        
        getNewInfos();  //获取新消息
        
    });

    function getNewInfos()
    {
        $.get(
            '/student/get_new_infos/{{$auth->id }}',
            {},
            function(data)
            {
                var str = '';
                if( data.length > 0 )
                {
                    $('#info_number').text(data.length);
                    for(var i = 0 ; i < data.length ; i++)
                        str += '<li class="list-group-item info-list"><a href="/student/get_one_info/' + data[i].id + '">' + data[i].content + '</a></li>';
                    str +='<li class="list-group-item text-center"><a href="/student/get_unread_info_list">查看全部消息</a></li>';
                }
                else
                {
                    str += '<li class="list-group-item text-center"><a href="/student/get_unread_info_list">查看历史消息</a></li>';
                }
                
                $('#nav-info-list').html(str);
                
            }
        );
    }
</script>
@endif
<br><br><br><br>
        
        @yield('content')

    <!-- Small modal -->

    <div class="modal fade bs-example-modal-sm" id="new_resume" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">确认框</h4>
                </div>
                <div class="modal-body">
                    <button class="btn btn-success" id="add_new_resume_head">确认添加</button>
                    <button class="btn btn-danger" data-dismiss="modal">取消</button>
                </div>
            </div>
      </div>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#add_new_resume_head').click(function(){
            $('#form_new_resume_head').submit();
        });
        //打开模态框
        $('#open_modal_head').click(function(){
            $('#new_resume').modal({backdrop: 'static', keyboard: false});
        });
    });
</script>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
