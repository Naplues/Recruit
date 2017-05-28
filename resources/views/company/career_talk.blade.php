@extends('layouts.company')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    initdatepicker_cn();
    $('#day').datepicker();

  });
</script>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <ol class="breadcrumb">
          @if (Auth::guest())
              <li><a href="/">首页</a></li>
          @else
              <li><a href="/company/index">主页</a></li>
          @endif
              <li>宣讲会列表</li>
          </ol>
      </div>
  </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">宣讲行程</div>

                <div class="panel-body">
                   
                   <a href="#"><button id="post" class="btn btn-success">添加宣讲</button></a><br><br>
               		@if( count($talks) == 0)
               			<h2>暂未发布任何宣讲详情</h2>
               		@else
               			<table class="table table-hover">
               				<tr class="success">
               					<td>时间</td>
               					<td>城市</td>
               					<td>学校</td>
               					<td>详细地址</td>
               					<td>说明</td>
               				</tr>
	               			@foreach( $talks as $talk )
	               				<tr>
	               					<td> {{ $talk->day }} </td>
	               					<td> {{ $talk->city }} </td>
	               					<td> {{ $talk->college }} </td>
	               					<td> {{ $talk->address }} </td>
	               					<td>
                            <a href="/company/career_talk_show/{{ $talk->id }}">
                              <button type="button" class="btn btn-danger details_btn">查看详情</button>
                            </a>
                          </td>
	               				</tr>
	               			@endforeach
               			</table>

               		@endif
                </div>

            </div>
        </div>
    </div>
</div>

@include('company._modals')


@endsection
