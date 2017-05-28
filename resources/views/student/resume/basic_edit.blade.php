@extends('layouts.student')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datepicker_cn.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    initdatepicker_cn();
    $('#basic_birthday').datepicker();

  });
</script>


<div class="container">
    <div class="row">

      <div class="col-md-12 col-md-offset-0">

        <div class="panel panel-success" id="panel_basic">
          <div class="panel-heading">基本信息</div>

          <div class="panel-body">
          
            <form id="form_basic" name="form_basic" action="/student/post_resume_basic" method="POST" enctype="multipart/form-data">


              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <input type="hidden" name="rid" value="{{ $rid }}">
              <input type="hidden" name="method" value="{{ $method }}">
              <input type="hidden" name="id" value="{{ $id }}">


              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basic_name">姓名</label>
                    <input type="text" class="form-control" id="basic_name" name="name" value="{{ $basic->name or '' }}" placeholder="请务必填写真实姓名" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basic_gender">性别</label>
                    <select class="form-control" id="basic_gender" name="gender">
                      <option value="0">--请选择</option>
                      <option value="1">男</option>
                      <option value="2">女</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basic_birthday">出生日期</label>
                    <input type="text" class="form-control" id="basic_birthday" name="birthday" placeholder="出生日期" required>
                  </div>
                </div>
              </div>




              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="basic_height">身高</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="basic_height" name="height" value="{{ $basic->height or '' }}" placeholder="填写数字，如180cm,则填写180" required >
                        <div class="input-group-addon">cm</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="basic_weight">体重</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="basic_weight" name="weight" value="{{ $basic->weight or '' }}" placeholder="填写数字，如70kg,则填写70" required >
                        <div class="input-group-addon">kg</div>
                    </div>
                  </div>
                </div>
              </div>
              

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="basic_nation">民族</label>
                    <select class="form-control" id="basic_nation" name="nation">
                      <option value="0">请选择</option>
                      <option value="1">汉族</option>
                      <option value="2">壮族</option>
                      <option value="3">回族</option>
                      <option value="4">满族</option>
                      <option value="5">维吾尔族</option>
                      <option value="6">苗族</option>
                      <option value="7">彝族</option>
                      <option value="8">土家族</option>
                      <option value="9">藏族</option>
                      <option value="10">蒙古族</option>
                      <option value="11">侗族</option>
                      <option value="12">布依族</option>
                      <option value="13">瑶族</option>
                      <option value="14">白族</option>
                      <option value="15">朝鲜族</option>
                      <option value="16">哈尼族</option>
                      <option value="17">黎族</option>
                      <option value="18">哈萨克族</option>
                      <option value="19">傣族</option>
                      <option value="20">畲族</option>
                      <option value="21">傈僳族</option>
                      <option value="22">东乡族</option>
                      <option value="23">仡佬族</option>
                      <option value="24">拉祜族</option>
                      <option value="25">佤族</option>
                      <option value="26">水族</option>
                      <option value="27">纳西族</option>
                      <option value="28">羌族</option>
                      <option value="29">土族</option>
                      <option value="30">仫佬族</option>
                      <option value="31">锡伯族</option>
                      <option value="32">柯尔克孜族</option>
                      <option value="33">景颇族</option>
                      <option value="34">达斡尔族</option>
                      <option value="35">撒拉族</option>
                      <option value="36">布朗族</option>
                      <option value="37">毛南族</option>
                      <option value="38">塔吉克族</option>
                      <option value="39">普米族</option>
                      <option value="40">阿昌族</option>
                      <option value="41">怒族</option>
                      <option value="42">鄂温克族</option>
                      <option value="43">京族</option>
                      <option value="44">基诺族</option>
                      <option value="45">德昂族</option>
                      <option value="46">保安族</option>
                      <option value="47">俄罗斯族</option>
                      <option value="48">裕固族</option>
                      <option value="49">乌孜别克族</option>
                      <option value="50">门巴族</option>
                      <option value="51">鄂伦春族</option>
                      <option value="52">独龙族</option>
                      <option value="53">赫哲族</option>
                      <option value="54">高山族</option>
                      <option value="55">珞巴族</option>
                      <option value="56">塔塔尔族</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="basic_health">健康状况</label>
                    <select class="form-control" id="basic_health" name="health">
                      <option value="0">请选择</option>
                      <option value="1">健康</option>
                      <option value="2">良好</option>
                      <option value="3">有病史</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="basic_status">政治面貌</label>
                    <select class="form-control" id="basic_status" name="status">
                      <option value="0">请选择</option>
                      <option value="1">党员</option>
                      <option value="2">团员</option>
                      <option value="3">群众</option>
                      <option value="4">民主党派</option>
                      <option value="5">其它</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="basic_marriage">婚姻状况</label>
                    <select class="form-control" id="basic_marriage" name="marriage">
                      <option value="0">请选择</option>
                      <option value="1">已婚</option>
                      <option value="2">未婚</option>
                      <option value="3">离异</option>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
              </div>
              
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
              </div>
              

              

              
              
              <div class="form-group">
                <label for="basic_idnumber">证件号码</label>
                <input type="text" class="form-control" id="basic_idnumber" name="idnumber" value="{{ $basic->idnumber or '' }}" placeholder="请填写身份证号码" required>
              </div>

              

              <div class="form-group">
                <label for="basic_origin">籍贯</label>
                <input type="text" class="form-control" id="basic_origin" name="origin" value="{{ $basic->origin or '' }}" placeholder="籍贯" required >
              </div>

              <div class="form-group">
                <label for="basic_permanen">户口所在地</label>
                <input type="text" class="form-control" id="basic_permanen" name="permanen" value="{{ $basic->permanen or '' }}" placeholder="户口所在地" required >
              </div>

              <div class="form-group">
                <label for="basic_photo">照片</label>
                <input type="file" class="form-control" id="basic_photo" name="photo" value="{{ $basic->photo or '' }}" placeholder="照片(先填写一些字符串)" required >
              </div>

              <button type="submit" class="btn btn-primary" id="submit_basic" name="submit_basic">确认</button>
          </form>

        </div>
      </div>
    </div>
</div>
</div>
@endsection
