@extends('layouts.company')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">消息动态</div>

                <div class="panel-body">
                    <div id="deliver" class="bg-danger">
                        @if(count($infos) == 0)
                            <h4>暂时没有更新的消息</h4>
                        @else
                        <div class="list-group">
                        
                            @foreach( $infos as $info )
                                <div class="list-group-item">
                                    <button class="btn btn-danger btn-xs" id="mark">标记已读</button>
                                    {{ $info->content }}
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
@endsection
