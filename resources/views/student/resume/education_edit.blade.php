@extends('layouts.student')

@section('content')
	<style>* {margin:0;padding:0;}
		
		ul li{ list-style:none;}
		
		.provinceSchool { display:none;position:absolute;width:580px;height:300px;border:1px solid #72B9D7; z-index:2;
			background:url(/css/images/background.png);}
		.provinceSchool .title { width:100%;height:30px;background:url(/css/images/title-bg.png) repeat-x center left;}
		.provinceSchool .title span { margin-left:10px;font-weight:600;color:#FFF;line-height:30px;}
		.provinceSchool .proSelect { width:550px;height:22px;margin:10px 0 6px 15px;}
		.provinceSchool .proSelect select { width:136px;}
		.provinceSchool .proSelect input { display:none;}
		.provinceSchool .schoolList { width:550px;height:200px;margin-left:15px;overflow-y:auto; border:1px solid #72B9D7;}
		.provinceSchool .schoolList ul { width:510px;}
		.provinceSchool .schoolList ul li { float:left;width:158px;height:22px;margin-left:6px;padding-left:6px;line-height:22px;cursor:pointer;}
		.provinceSchool .schoolList ul li.DoubleWidthLi { width:328px;}
		.provinceSchool .schoolList ul li:hover { background:#72B9D7;}
		.provinceSchool .button { width:100%;height:40px;margin-top:8px;}
		.provinceSchool .button button { 
			float:right;
			height:30px;
			margin-right:20px;
			padding:4px 10px; 
			background:url(/css/images/background.png);
			border:none;
			color:#FFF;
			font-weight:600;
			cursor:pointer;
		}
	</style>
<script type="text/javascript" src="/js/jquery-1.7.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript" src="/js/school_select.js" ></script>
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

                    
			<div class="panel panel-default" id="panel_education">
                <div class="panel-heading">教育经历</div>

                <div class="panel-body">
                  	
                  	<form id="form_education" name="form_education" action="/student/post_resume_education" method="POST">

			            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			            <input type="hidden" name="rid" value="{{ $rid }}">
			            <input type="hidden" name="method" value="{{ $method }}">
			            <input type="hidden" name="id" value="{{ $id }}">


			            <div class="row">
			            	<div class="col-md-3 col-md-offset-0">
			                    <div class="form-group">
			                      	<label for="startdate">开始时间</label>
			                      	<input type="text" class="form-control" id="startdate" name="startdate" value="{{ $education->startdate or '' }}" required>
			                    </div>
			            	</div>
			            	<div class="col-md-3 col-md-offset-0">
			            		<div class="form-group">
			                      	<label for="enddate">结束时间</label>
			                      	<input type="text" class="form-control" id="enddate" name="enddate" value="{{ $education->enddate or '' }}" required>
			                    </div>
			            	</div>
			            	<div class="col-md-6 ">
			            		<div class="form-group">
		                      		<label for="school">学校</label>
			                      	<input type="text" class="form-control" id="schoolName" name="school" value="{{ $education->school or '' }}" placeholder="输入学校名称" required>

									<div id="proSchool" class="provinceSchool">
								      <div class="title">
								        <span>已选择:</span>
								      </div>
								      <div class="proSelect">
										<select></select>
										<span>如没找到选择项，请选择其他手动填写</span>
										<input type="text" >
									  </div>
								      <div class="schoolList"><ul></ul></div>
								      <div class="button">
								      	<button flag='0'>取消</button>
								        <button flag='1'>确定</button>
								      </div>
								    </div>
			                    </div>
			            	</div>		            	
			            </div>


			            <div class="row">
			            	<div class="col-md-4">
			            		<div class="row">
					            	<div class="col-md-12 col-md-offset-0">
						                <div class="form-group">
					                      	<label for="type">教育类型</label>
					                      	<select class="form-control" id="type" name="type">
					                      		<option value="0">--请选择</option>
					                      		<option value="1">全日制</option>
												<option value="2">非全日制</option>
					                      		<option value="3">其它</option>
					                      	</select>
					                    </div>
					            	</div>
					            </div>

					            <div class="row">
					            	<div class="col-md-12 col-md-offset-0">
					                    <div class="form-group">
					                      	<label for="degree">学位</label>
					                      	<select class="form-control" id="degree" name="degree">
					                      		<option value="0">--请选择</option>
					                      		<option value="1">学士</option>
					                      		<option value="2">学术型硕士</option>
					                      		<option value="3">全日制专业型硕士</option>
					                      		<option value="4">非全日制专业硕士</option>
					                      		<option value="5">其它</option>
					                      	</select>
					                    </div>
					            	</div>
					            </div>

					            <div class="row">
					            	<div class="col-md-12 col-md-offset-0">
					            		<div class="form-group">
					                      	<label for="qualification">学历</label>
					                      	<select class="form-control" id="qualification" name="qualification">
					                      		<option value="0">--请选择</option>
					                      		<option value="1">博士</option>
					                      		<option value="2">研究生</option>
					                      		<option value="3">本科</option>
					                      		<option value="4">大专</option>
					                      		<option value="5">中专</option>
					                      		<option value="6">其它</option>
					                      	</select>
					                    </div>
					            	</div>
					            </div><!-- .row -->
			            	</div><!-- .col-md-4 -->

			            	<div class="col-md-8">
			            		<div class="form-group">
		                      		<label for="class">课程</label>
			                      	<textarea class="form-control" id="class" name="class" placeholder="输入所学课程..." rows="8">{{ $education->class or '' }}</textarea>
			                    </div>
			            	</div>

			            </div>
			            


			            <div class="row">

			            	<div class="col-md-4 col-md-offset-0">
			            		<div class="form-group">
			                      	<label for="campus">院系</label>
			                      	<input type="text" class="form-control" id="campus" name="campus" value="{{ $education->campus or '' }}" placeholder="输入所在学院">
			                    </div>
			            	</div>
			            	<div class="col-md-4 col-md-offset-0">
			            		<div class="form-group">
			                      	<label for="major">专业</label>
			                      	<input type="text" class="form-control" id="major" name="major" value="{{ $education->major or '' }}" placeholder="输入专业方向">
			                    </div>
			            	</div>
			            	<div class="col-md-4 col-md-offset-0">
			            		<div class="form-group">
			                      	<label for="rank">排名</label>
			                      	<input type="text" class="form-control" id="rank" name="rank" value="{{ $education->rank or '' }}" placeholder="输入专业排名，写百分比的整数">
			                    </div>
			            	</div>

			            </div>


						<button type="submit" class="btn btn-primary" id="submit_education" name="submit_education">确认</button>
                  
                  	</form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
