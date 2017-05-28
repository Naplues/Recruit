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
              <li>招聘会列表</li>
          </ol>
      </div>
  </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                  共<b>{{ $job_fairs->total() }}</b>场招聘会
                  <a href="{{ $job_fairs->url(1) }}">首页</a>
                  <a href="{{ $job_fairs->previousPageUrl() }}">上一页</a>
                  <a href="{{ $job_fairs->nextPageUrl() }}">下一页</a>
                  <a href="{{ $job_fairs->url( $job_fairs->lastPage() ) }}">尾页</a>
                </div>
                <div class="panel-body">
                    @if( count($job_fairs) == 0 )
                        <h4>暂未发布任何招聘会信息</h4>
                    @else
                    <div class="list-group">
                      <div class="text-center">
                        {{ $job_fairs->links() }}  
                      </div>
                      @foreach( $job_fairs as $list )
                          <div class="list-group-item">
                            <div class="row">
                              <div class="col-md-4">
                                <a href="/company/job_fair_show/{{ $list->id }}">
                                  {{ $list->name }}
                                </a>
                              </div>
                              <div class="col-md-4">
                                举办日期：{{ $list->time }}
                              </div>
                              <div class="col-md-4">
                                总席位：<span class="badge">{{ $list->total_number }}</span>
                              </div>
                            </div>
                          </div>

                      @endforeach
                      <div class="text-center">
                        {{ $job_fairs->links() }}  
                      </div>
                    </div>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
