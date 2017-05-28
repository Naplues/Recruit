@extends('layouts.student')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
    initdatepicker_cn();
    $('#arrival').datepicker();
    
  });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                    
            <div class="panel panel-default" id="panel_job">
                <div class="panel-heading">求职意向</div>

                <div class="panel-body">
                  	<form id="form_job" name="form_job" action="/student/post_resume_job" method="POST">

						        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              			<input type="hidden" name="rid" value="{{ $rid }}">
              			<input type="hidden" name="method" value="{{ $method }}">
                    <input type="hidden" name="id" value="{{ $id }}">

                    <div class="row">
                      <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                          <label for="job_property">公司性质</label>
                          <select class="form-control" id="property" name="property">
                            <option value="0">--请选择</option>
                              <option value="1">国有企业</option>
                              <option value="2">股份合作企业</option>
                              <option value="3">联营企业</option>
                              <option value="4">有限责任公司</option>
                              <option value="5">股份有限公司</option>
                              <option value="6">私营企业</option>
                              <option value="7">中外合资企业</option>
                              <option value="8">外商独资企业</option>
                              <option value="9">其他企业</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="city">偏爱城市(填数字)</label>
                          <input class="form-control sg-area-result" id="city" name="city">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                          <label for="state">目前状况</label>
                          <select class="form-control" id="state" name="state">
                            <option value="0">请选择</option>
                            <option value="1">应届毕业生</option>
                            <option value="2">往届毕业生</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="salary">期望薪资</label>
                          <input type="text" class="form-control" id="salary" name="salary" value="{{ $job->salary or '' }}" placeholder="期望薪资" required >
                        </div>   
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                          <label for="arrival">到岗时间</label>
                          <input type="text" class="form-control" id="arrival" name="arrival" required>
                        </div> 
                      </div>
                      <div class="col-md-1 col-md-offset-3">
                      <br>
                        <button type="submit" class="btn btn-primary" id="submit_job" name="submit_job" >确认</button>
                      </div>
                    </div>	
                      	                         
                  	</form>

                </div>
            </div>

        </div>
    </div>
</div>
    <link rel="stylesheet" type="text/css" href="/css/SG_area_select.css">
    <script type="text/javascript" src='/js/iscroll.js'></script>
    <script type="text/javascript" src='/js/SG_area_select.js'></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#city').on('click',function(){
                $.areaSelect(); 
                $
            })  

        })
    </script>
@endsection
