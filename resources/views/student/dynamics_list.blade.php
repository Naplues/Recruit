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
                <li>公司动态列表</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">公司动态列表</div>

                <div class="panel-body">

                    @if( count($dynamics) != 0 )
                        <div class="list-group">
                            @foreach( $dynamics as $dynamic )
                                <div class="list-group-item">
                                    {!! $dynamic->content !!}
                                </div>
                            @endforeach
                        </div>
                        {{ $dynamics->links() }}
                    @endif

                </div>

            </div>
        </div>
    </div>
</div><!-- .container -->

@endsection