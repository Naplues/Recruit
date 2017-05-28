

<div class="row">
    <div class="col-md-12">

        <div id="show_work">
            <h4>
                5.实习/工作经历
                <a href="/student/resume_work_edit/{{ $resume->id }}/create/-1" class="hide"><button class="btn btn-success">新增</button></a>
            </h4>
            <div class="item_details">
                
                @if(count($resume->works) == 0)
                    <h4 class="edit_button">
                        <small>经历过风浪，终于见彩虹</small>
                        
                    </h4>
                @else
                
                    <div class="jumbotron">

                        @foreach( $resume->works as $work )
                        <a href="/student/resume_work_edit/{{ $resume->id }}/update/{{ $work->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>

                            <div class="row">
                                <div class="col-md-3">
                                    <h4>
                                        <i class="icon icon-building"></i>
                                        实习/工作单位： {{ $work->company }}
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>
                                    <i class="icon icon-star-empty"></i>
                                        工作岗位：{{ $work->position }}
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>
                                    <i class="icon icon-time"></i>
                                        开始时间： {{ $work->startdate }}
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>
                                    <i class="icon icon-time"></i>
                                        结束时间：{{ $work->enddate }}
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>
                                        <i class="icon icon-dashboard"></i>
                                        工作内容：{{ $work->content }}
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>
                                        <i class="icon icon-gift"></i>
                                        工作收获：{{ $work->harvest }}
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
</div>