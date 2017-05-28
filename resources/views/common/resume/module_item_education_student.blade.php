<?php use App\Extensions\StudentInfo as StudentInfo; ?>
<div class="row">
    <div class="col-md-12">

        <h4>
            2.教育经历
            <a href="/student/resume_education_edit/{{ $resume->id }}/create/-1" class="hide">
                <button class="btn btn-success">
                    新增
                </button>
            </a>
        </h4>

        <div class="item_details">
        
            @if(count($resume->educations) == 0)
                <h4 class="edit_button">
                    <small>你的学识由此体现</small>
                    
                </h4>
            @else

                <div class="jumbotron">
                @foreach( $resume->educations as $education )
                <a href="/student/resume_education_edit/{{ $resume->id }}/update/{{ $education->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>


                <div class="row">
                    <div class="col-md-3">
                        <h4>
                        <i class="icon  icon-time"></i>
                            开始时间：{{ $education->startdate }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon  icon-time"></i>
                            结束时间：{{ $education->enddate }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-hospital"></i>
                            学校：{{ $education->school }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-tasks"></i>
                            类型：{{ StudentInfo::getEducationType($education->type) }}
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-sitemap"></i>
                            学历：{{ StudentInfo::getDegree($education->degree) }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-trophy"></i>
                            学位：{{ StudentInfo::getQualification($education->qualification) }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-building"></i>
                            学院：{{ $education->campus }}
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-beaker"></i>
                            专业：{{ $education->major }}
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>
                        <i class="icon icon-calendar"></i>
                            课程：{{ $education->class }}
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h4>
                        <i class="icon icon-signal"></i>
                            排名：{{ $education->rank }}
                        </h4>
                    </div>
                </div>

                    <hr>
                @endforeach   

                </div>
            @endif
        </div>

    </div>
</div>
