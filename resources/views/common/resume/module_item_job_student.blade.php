<?php use App\Extensions\StudentInfo as StudentInfo; ?>
<div class="row">
    <div class="col-md-12">

        <div id="show_job">
            <h4>7.求职意向</h4>
            <div class="item_details">
                @if(!isset($resume->job))
                    <h4 class="edit_button">
                        <small>告诉我你的愿望，我会帮你美梦成真</small>
                        <a href="/student/resume_job_edit/{{ $resume->id }}/create/-1" class="hide">
                            <button class="btn btn-success btn-xs">
                            新建
                            </button>
                        </a>
                    </h4>
                @else
                    


                    <div class="jumbotron">

                    <a href="/student/resume_job_edit/{{ $resume->id }}/update/{{ $resume->job->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>
                    
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                    <i class="icon icon-sitemap"></i>
                                    公司类型： {{ StudentInfo::getProperty($resume->job->property) }}
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4>
                                    <i class="icon icon-home"></i>
                                    偏爱城市：{{ $resume->job->city }}
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4>
                                    <i class="icon icon-money"></i>
                                    薪资（月薪）：{{ $resume->job->salary }}
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                    <i class=""></i>
                                    目前状况：{{ StudentInfo::getState($resume->job->state) }}
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4>
                                    <i class=""></i>
                                    入职时间：{{ $resume->job->arrival }}
                                </h4>
                            </div>
                        </div>


                    </div>
                @endif
            </div>
        </div>

    </div>
</div>