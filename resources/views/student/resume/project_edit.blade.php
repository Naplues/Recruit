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
        <div class="col-md-12 col-md-offset-0">

            <div class="panel panel-default" id="panel_project">
                <div class="panel-heading">项目经验</div>

                <div class="panel-body">
           			
           			<form id="form_project" name="form_project" action="/student/post_resume_project" method="POST">
              		
              			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
              			<input type="hidden" name="rid" value="{{ $rid }}">
              			<input type="hidden" name="method" value="{{ $method }}">
                    <input type="hidden" name="id" value="{{ $id }}">

                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                          <label for="name">项目名称</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $project->name or '' }}" placeholder="输入项目名称" required >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 col-md-offset-3">
                        <div class="form-group">
                          <label for="startdate">开始时间</label>
                          <input type="text" class="form-control" id="startdate" name="startdate" required >
                        </div>
                      </div>
                      <div class="col-md-3 col-md-offset-0">
                        <div class="form-group">
                          <label for="enddate">结束时间</label>
                          <input type="text" class="form-control" id="enddate" name="enddate" required >
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">

                        <div class="form-group">
                          <label for="content">项目内容</label>
                          <textarea class="form-control" id="content" name="content" rows="5" placeholder="描述项目内容" required > {{ $project->content or '' }} </textarea>
                        </div>          
                        
                        <div class="form-group">
                          <label for="harvest">收获感悟</label>
                          <textarea class="form-control" id="harvest" name="harvest" rows="5" placeholder="描述你的收获" required > {{ $project->harvest or '' }} </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit_project" name="submit_project">确认</button>

                      </div>
                    </div>
                	</form>
                </div>
            </div>
              
        </div>
    </div>
</div>
@endsection
