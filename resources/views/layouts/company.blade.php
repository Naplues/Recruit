<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="toTop" content="true">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Campus Recruit 校园招聘') }}</title>

    <!-- Styles -->
    
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Font-Awesome/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript" src="/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/toTop.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/company/index') }}">
                        {{ config('app.name', 'Campus Recruit 校园招聘') }}公司端
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="/company/career_talk">宣讲安排</a></li>
                        <li><a href="/company/job_fair_list">招聘会</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    简历管理 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/company/resume_deliver">简历接收</a></li>
                                <li><a href="/company/resume_search">人才库</a></li>
                            </ul>
                        </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    职位信息 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/company/position_list">所有职位</a></li>
                                <li><a href="/company/position_add">添加职位</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    公司信息 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/company/info_show">查看信息</a></li>
                                <li><a href="/company/info_edit">编辑信息</a></li>
                                <li><a href="/company/get_dynamics_list/{{ $auth->company->id or 0 }}">公司动态</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    消息动态 <span class="badge" id="info_number"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" id="nav-info-list">
                            <!--
                                
                                -->
                            </ul>
                        </li>


                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('company/login') }}">登录</a></li>
                            <li><a href="{{ url('company/register') }}">注册</a></li>
                        @else
                            <!-- 
                            <li>
                                <a href="/chat_student" class="btn btn-danger" target="_blank">
                                    <i class="icon icon-comments"></i> 聊天室
                                </a>
                            </li>
                             -->
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/uploads/{{ $auth->avatar or 'images/company.jpg' }} " alt="..." width="25" height="25" class="img-rounded">
                                    <b>公司账户：</b>{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/company/profile_avatar">头像设置</a></li>
                                    <li><a href="/company/profile_details">账户资料</a></li>
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

<style type="text/css">
            .info-list{
                width: 500px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        </style>
<script type="text/javascript">
    $(document).ready(function() {
        getNewInfos();  //获取新消息
    });

    function getNewInfos()
    {
        $.get(
            '/company/get_new_infos/{{$auth->id }}',
            {}, 
            function(data)
            {
                var str = '';
                if( data.length > 0 )
                {
                    $('#info_number').text(data.length);
                    for(var i = 0 ; i < data.length ; i++)
                        str += '<li class="list-group-item info-list"><a href="/company/get_one_info/' + data[i].id + '">' + data[i].content + '</a></li>';
                    str +='<li class="list-group-item text-center"><a href="/company/get_unread_info_list">查看全部消息</a></li>';
                }
                else
                {
                    str += '<li class="list-group-item text-center "><a href="/company/get_unread_info_list">查看历史消息</a></li>';
                }
                

                $('#nav-info-list').html(str);
                
            }
        );
    }
</script>
<br><br><br>



        @yield('content')
    </div>

    <!-- Scripts -->
    
</body>
</html>



<!-- git测试 -->