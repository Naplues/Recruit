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
<!-- 显示部分宣讲会内容 -->
<style type="text/css">
    .part-content{
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
    $('#enddate').datepicker();
  });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li><a href="/guest/get_career_talks_list">宣讲会</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">宣讲查询</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="/student/career_talk_search" method="GET">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" id="detail_btn" type="button">详细筛选</button>
                                    </span>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="输入宣讲公司名称查询宣讲..." required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" id="submit" type="submit">搜索宣讲</button>
                                    </span>
                                </div><!-- /input-group -->
                                
                            </form><br>
                        </div>
                    </div>


                    <!-- Ajax 筛选条件 -->
                    <form action="/student/career_talk_search_details" method="GET">
                        <div class="row hide" id="more">
                            <div class="col-md-2 col-md-offset-2">
                                <div class="form-group">
                                    <input type="text" class="form-control sg-area-result" id="city" name="city" value="" placeholder="城市">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="schoolName" name="college" value="" placeholder="输入学校名称" >

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
                            <div class="col-md-2">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="enddate" name="enddate" placeholder="截止日期" >
                                </div>
                            </div>

                            <div class="col-md-2" >
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" id="search">查找宣讲</button>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="result">
        @include('common.lists.module_list_talk_all_student')
        @include('common.lists.module_list_talk_student')
    </div>


</div>

    <link rel="stylesheet" type="text/css" href="/css/SG_area_select.css">
    <script type="text/javascript" src='/js/iscroll.js'></script>
    <script type="text/javascript" src='/js/SG_area_select.js'></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#city').on('click',function(){  //选择城市
                $.areaSelect(); 
            })  

            //显示详细搜索
            $('#detail_btn').click(function(){
                var more = $('#more');
                var input = $('#company');
                var submit_btn = $('#submit');

                if(more.hasClass('hide'))
                {
                    more.removeClass('hide');
                    $(this).text('收起筛选');
                    input.prop('disabled', 'disabled');
                    submit_btn.prop('disabled', 'disabled');
                }
                else
                {
                    more.addClass('hide');
                    $(this).text('详细筛选');
                    input.prop('disabled', false);
                    submit_btn.prop('disabled', false);
                }
            });
        })
    </script>
@endsection
