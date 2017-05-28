<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>校园招聘</title>


        <!-- Fonts -->
        

        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FFFFCC;
                color: #636b6f;
                /**background-image: url('/photos/bg-1.png');*/
                background-repeat: no-repeat;
                background-size:100% 100%;
                height: 100vh;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 72px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>

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

                    <!-- Branding Image -->
                    @if (Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @else
                        @if( $auth->usertype == 1 )
                        <a class="navbar-brand" href="{{ url('/student/index') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        @elseif( $auth->usertype == 2 )
                        <a class="navbar-brand" href="{{ url('/company/index') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        @elseif( $auth->usertype == 3 )
                        <a class="navbar-brand" href="{{ url('/admin/index') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        @endif                        

                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    学生用户 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/login') }}">学生登录</a></li>
                                <li><a href="{{ url('/register') }}">学生注册</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    校招单位 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('company/login') }}">单位登录</a></li>
                                <li><a href="{{ url('company/register') }}">单位注册</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    管理员 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('admin/login') }}">管理员登录</a></li>
                                <li><a href="{{ url('admin/register') }}">管理员注册</a></li>
                            </ul>
                        </li>

                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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

        <br><br><br>
<div class="container-fluid">

<div class="row">
    <div class="col-md-6">

        <div class="row" >
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" height="500">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    <div class="item active text-center">
                      <img src="/photos/xz-1.jpg" >
                        <div class="carousel-caption">
                            <a href="/guest/get_job_fairs_list"><button class="btn btn-info btn-lg"><h2>大型招聘</h2></button></a>
                        </div>
                    </div>
                    
                    <div class="item">
                      <img src="/photos/xz-2.jpg">
                        <div class="carousel-caption">
                            <a href="/guest/get_companies_list"><button class="btn btn-warning btn-lg"><h2>在线公司</h2></button></a>
                        </div>
                    </div>
                    
                    <div class="item">
                      <img src="/photos/xz-3.jpg">
                        <div class="carousel-caption">
                            <a href="/guest/get_career_talks_list"><button class="btn btn-danger btn-lg"><h2>专场宣讲</h2></button></a>
                        </div>
                    </div>
                    
                    <div class="item">
                      <img src="/photos/xz-4.jpg">
                        <div class="carousel-caption">
                            <a href="/guest/get_positions_list"><button class="btn btn-success btn-lg"><h2>职位预览</h2></button></a>
                        </div>
                    </div>
                    
                  </div>

                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div><!-- .row -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                    信息速览
                    </div>
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#job_fair" aria-controls="home" role="tab" data-toggle="tab">大型校招</a></li>
                        <li role="presentation"><a href="#company" aria-controls="profile" role="tab" data-toggle="tab">热门公司</a></li>
                        <li role="presentation"><a href="#position" aria-controls="messages" role="tab" data-toggle="tab">焦点职位</a></li>
                        <li role="presentation"><a href="#career_talk" aria-controls="settings" role="tab" data-toggle="tab">名企宣讲</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="job_fair">
                            @if( count( $job_fairs ) != 0 )
                            <div class="list-group">
                                @foreach( $job_fairs as $job )
                                <div class="list-group-item">
                                    <a href="/guest/goto_job_fair_info/{{$job->id}}">{{ $job->name }}</a>
                                    {{ $job->time }}
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="company">
                            @if( count( $companies ) != 0 )
                            <div class="list-group">
                                @foreach( $companies as $company )
                                <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="/guest/goto_company_info/{{ $company->id }}">{{ $company->name }}</a> 
                                        <span class="badge">{{ $company->focus }} 关注</span>
                                    </div>
                                    <div class="col-md-3">
                                        {{ $company->city }}
                                    </div>
                                </div>
                                   
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="position">
                            @if( count( $positions ) != 0 )
                            <div class="list-group">
                                @foreach( $positions as $position )
                                <div class="list-group-item">
                                    <a href="/guest/goto_position_info/{{ $position->id }}">
                                        {{ $position->name }}
                                    </a>
                                    <span class="badge">{{ $position->post_number }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="career_talk">
                            @if( count( $career_talks ) != 0 )
                            <div class="list-group">
                                @foreach( $career_talks as $talk )
                                <div class="list-group-item">
                                    <a href="/guest/goto_career_talk_info/{{ $talk->id }}">
                                    {{ $talk->college }}</a>
                                    <small><a href="/guest/goto_company_info/{{ $talk->company->id }}">
                                        {{ $talk->company->name }}
                                    </a></small>{{ $talk->day }}
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        公司最新动态
                    </div>
                    <div class="panel-body">
                         @if( count( $dynamics ) != 0 )
                            <div class="list-group">
                                @foreach( $dynamics as $dynamic )
                                <div class="list-group-item">
                                    {!! $dynamic->content !!}
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- 外层row -->
    





<script type="text/javascript">
    $('#myTabs a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

</script>

</div>
    </body>
</html>
