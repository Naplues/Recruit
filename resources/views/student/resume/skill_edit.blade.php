@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default" id="panel_skill">
                <div class="panel-heading">技能水平</div>

                <div class="panel-body">
                  	<form id="form_skill" name="form_skill" action="/student/post_resume_skill" method="POST">

              			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
              			<input type="hidden" name="rid" value="{{ $rid }}">
              			<input type="hidden" name="method" value="{{ $method }}">
                    <input type="hidden" name="id" value="{{ $id }}">

      	  			        <div class="form-group">
                        	<label for="type">技能名称</label>
                        	<select class="form-control" id="type" name="type">
                        		<option value="0">--请选择</option>
                        		<option value="1">CET-4</option>
                        		<option value="2">CET-6</option>
                        		<option value="3">计算机二级</option>
                        		<option value="4">计算机三级</option>
                        		<option value="5">其它（请在水平框内输入名称及水平情况）</option>
                        	</select>
                      	</div>

                      	<div class="form-group">
                        	<label for="level">技能水平(分数)</label>
                        	<input type="text" class="form-control" id="level" name="level" value="{{ $skill->level or '' }}" placeholder="填写分数或者等级" required>
                      	</div>
						
					              <button type="submit" class="btn btn-primary" id="submit_skill" name="submit_skill">确认</button>

                  	</form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
