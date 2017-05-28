@extends('layouts.student')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
  	initdatepicker_cn();
   	$('#time').datepicker();
   	
  });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

			<div class="panel panel-default" id="panel_award">
                
                <div class="panel-heading">所获奖励</div>

                <div class="panel-body">
              		<form id="form_award" name="form_award" action="/student/post_resume_award" method="POST">
              			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
              			<input type="hidden" name="rid" value="{{ $rid }}">
              			<input type="hidden" name="method" value="{{ $method }}">
              			<input type="hidden" name="id" value="{{ $id }}">
              			<div class="row">
              				<div class="col-md-4 col-md-offset-2">
              					<div class="form-group">
									<label for="name">奖项名称</label>
									<input type="text" class="form-control" id="name" name="name" value="{{ $award->name or '' }}" placeholder="请输入奖项名称" required>
								</div>
							</div>
							<div class="col-md-4 col-md-offset-0">
								<div class="form-group">
									<label for="level">等级</label>
									<select class="form-control" id="level" name="level">
										<option value="0">--请选择</option>
										<option value="1">国家级</option>
										<option value="2">省级</option>
										<option value="3">校级</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
              				<div class="col-md-8 col-md-offset-2">	
								<div class="form-group">
									<label for="time">获奖时间</label>
									<input type="text" class="form-control" id="time" name="time" placeholder="获奖时间" required>
								</div>
								<div class="form-group">
									<label for="details">获奖内容</label>
									<textarea class="form-control" id="details" name="details" rows="5" placeholder="描述获奖内容" required>{{ $award->details or '' }}</textarea>
								</div>
								<button type="submit" class="btn btn-primary" id="submit_award" name="submit_award">确认</button>
              				</div>
              			</div>                                 
                  	</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
