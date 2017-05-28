<?php use App\Extensions\StudentInfo as StudentInfo; ?>
<div class="row">
    <div class="col-md-12">

        <div id="show_basic">
            <h4>1.基本信息</h4>
            <div class="item_details">

                @if(!isset($resume->basic))
                    <h4 class="edit_button">
                        <small>添加基本信息，展现你的第一印象</small>
                        <a href="/student/resume_basic_edit/{{ $resume->id }}/create/-1" class="hide">
                            <button class="btn btn-success btn-xs">
                                新建
                            </button>
                        </a>
                    </h4>
                @else
                <a href="/student/resume_basic_edit/{{ $resume->id }}/update/{{$resume->basic->id}}" class="hide">
                    <button class="btn btn-primary ">
                        编辑
                    </button>
                </a>
                

                    <div class="jumbotron">


                    <img src="/uploads/{{ $resume->basic->photo or '' }} " alt="..."  height="100" class="img-rounded">

                    <div class="row">
                        <div class="col-md-3">
                            <h4>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                             姓名：{{ $resume->basic->name }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <i class="icon icon-user-md"></i>
                            性别： {{  StudentInfo::getGender($resume->basic->gender)  }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <span class="glyphicon glyphicon-header" aria-hidden="true">
                            身高：{{ $resume->basic->height }} cm</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <span class="glyphicon glyphicon-credit-card" aria-hidden="true">
                            体重：{{ $resume->basic->weight }} kg</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>
                                <i class="icon icon-group"></i>
                            民族：{{ StudentInfo::getNation($resume->basic->nation) }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <span class="glyphicon glyphicon-film" aria-hidden="true">
                            健康状况： {{ StudentInfo::getHealth($resume->basic->health) }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true">
                            政治面貌： {{ StudentInfo::getStatus($resume->basic->status) }}</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
                            婚姻状况： {{ StudentInfo::getMarriage($resume->basic->marriage) }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                <span class="glyphicon glyphicon-dashboard" aria-hidden="true">
                            出生日期 ：{{ $resume->basic->birthday }}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="icon icon-tag"></i>
                            证件号码：{{ $resume->basic->idnumber }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <i class="icon icon-hospital"></i>
                            籍贯：{{ $resume->basic->origin }}</h4>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                            <span class="glyphicon glyphicon-home" aria-hidden="true">
                            户口所在地：{{ $resume->basic->permanen }}</h4>
                        </div>
                    </div>                    
                        
                        
                        


                    </div>

                @endif
            </div>
        </div>


    </div>
</div>
