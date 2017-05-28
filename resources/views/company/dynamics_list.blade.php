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
                <li>公司动态列表</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <b>{{ $dynamics->total() }}</b>条公司动态
                    <a href="{{ $dynamics->url(1) }}">首页</a>
                    <a href="{{ $dynamics->previousPageUrl() }}">上一页</a>
                    <a href="{{ $dynamics->nextPageUrl() }}">下一页</a>
                    <a href="{{ $dynamics->url( $dynamics->lastPage() ) }}">尾页</a>
                </div>

                <div class="panel-body">

                    @if( count($dynamics) != 0 )
                        <div class="list-group">
                            <div class="text-center">
                                {{ $dynamics->links() }}
                            </div>
                            @foreach( $dynamics as $dynamic )
                                <div class="list-group-item">
                                    {!! $dynamic->content !!}
                                </div>
                            @endforeach
                            <div class="text-center">
                                {{ $dynamics->links() }}
                            </div>
                        </div>
                        
                    @endif

                </div>

            </div>
        </div>
    </div>
</div><!-- .container -->

@endsection