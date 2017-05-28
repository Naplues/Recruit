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
                <li><a href="/student/career_talk">宣讲会</a></li>
            @endif
                <li>宣讲会列表</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">宣讲会列表</div>

                <div class="panel-body">
                

                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            @if( count($talks) == 0 )
                            <h4>未找到相应的宣讲会 <a href="/student/career_talk">查看其它</a></h4>
                            @else
                                <div class="list-group">
                                    @foreach($talks as $talk)
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="icon icon-building"></i>
                                                    学校：{{ $talk->college }}
                                                </div>
                                                <div class="col-md-3">
                                                    <i class="icon icon-home"></i>
                                                    公司：<a href="/guest/goto_company_info/{{ $talk->company->id }}">{{ $talk->company->name }}</a>
                                                </div>
                                                <div class="col-md-2">
                                                    <i class="icon icon-time"></i>
                                                    时间： {{ $talk->day }}
                                                </div>
                                                <div class="col-md-3">
                                                    发布时间:{{ $talk->created_at }}
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-success btn-xs details_btn">查看明细</button>
                                                </div>
                                            </div>
                                            <div class="row details hide jumbotron h4">
                                                <div class="col-md-4">
                                                    城市：{{ $talk->city }}
                                                </div>
                                                <div class="col-md-8">
                                                    详细地址: {{ $talk->address }}
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    宣讲说明：{{ $talk->details }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div><!-- .col-md -->
                    </div><!-- .row -->



                </div><!-- .panel -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.details_btn').click(function(){

            var de = $(this).parent().parent().parent().children('.details');
            if(de.hasClass('hide'))
                de.removeClass('hide');
            else
                de.addClass('hide');
        });
    });
</script>
@endsection
