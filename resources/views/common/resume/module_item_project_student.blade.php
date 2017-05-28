
<div class="row">
    <div class="col-md-12">
        
        <div id="show_project">
            <h4>
                4.项目经验
                <a href="/student/resume_project_edit/{{ $resume->id }}/create/-1" class="hide"><button class="btn btn-success ">新增</button></a>
            </h4>
            <div class="item_details">
                
                @if(count($resume->projects) == 0)
                    <h4 class="edit_button">
                        <small>我的项目我做主</small>
                    </h4>
                @else
                
                <div class="jumbotron">
                    @foreach( $resume->projects as $project )
                    <a href="/student/resume_project_edit/{{ $resume->id }}/update/{{ $project->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>

                    
                        <div class="row">
                            <div class="col-md-6">
                                <h4>
                                <i class="icon icon-bookmark"></i>
                                    项目名称：{{ $project->name }}
                                </h4>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                <i class="icon icon-time"></i>
                                    开始时间：{{ $project->startdate }}
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <h4>
                                <i class="icon icon-time"></i>
                                    结束时间：{{ $project->enddate }}
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                <i class="icon icon-dashboard"></i>
                                    项目内容：{{ $project->content }}
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                <i class="icon icon-gift"></i>
                                    项目收获：{{ $project->harvest }}
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