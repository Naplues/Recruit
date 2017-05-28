@extends('layouts.student')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    initdatepicker_cn();
    $('#startdate').datepicker();
    $('#enddate').datepicker();
  });
</script>



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

		        <div class="panel panel-default" id="panel_work">
                <div class="panel-heading">实习/工作经历</div>

                <div class="panel-body">
                  	<form id="form_work" name="form_work" action="/student/post_resume_work" method="POST">

						        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              			<input type="hidden" name="rid" value="{{ $rid }}">
              			<input type="hidden" name="method" value="{{ $method }}">
                    <input type="hidden" name="id" value="{{ $id }}">

                      	<div class="form-group">
                        	<label for="company">实习/工作单位</label>
                        	<input type="text" class="form-control" id="company" name="company" value="{{ $work->company or '' }}" placeholder="工作单位" required >
                      	</div>

                      	<div class="form-group">
                        	<label for="position">岗位职责</label>
                        	<input type="text" class="form-control" id="position" name="position" value="{{ $work->position or '' }}" placeholder="负责的任务" required >
                      	</div>

                      	<div class="form-group">
                        	<label for="startdate">开始时间</label>
                        	<input type="text" class="form-control" id="startdate" name="startdate" required >
                      	</div>

                      	<div class="form-group">
                        	<label for="enddate">结束时间</label>
                        	<input type="text" class="form-control" id="enddate" name="enddate" required >
                      	</div>

                      	<div class="form-group">
                        	<label for="content">项目内容</label>
                        	<textarea class="form-control" id="content" name="content" rows="5" placeholder="描述一下项目内容" required>{{ $work->content or '' }}</textarea>
                      	</div>

                      	<div class="form-group">
                        	<label for="harvest">收获感悟</label>
                        	<textarea class="form-control" id="harvest" name="harvest" rows="5" placeholder="描述在项目中收获的知识经验等" required> {{ $work->harvest or '' }} </textarea>
                      	</div>

						            <button type="submit" class="btn btn-primary" id="submit_work" name="submit_work">确认</button>                                                    
                  	</form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
