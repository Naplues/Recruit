
<div class="row">
    <div class="col-md-8">
        <div id="show_project">
            <h4>
                4.项目经验

            </h4>
            <div class="item_details">
                
                @if(count($resume->projects) == 0)
                    <h4 class="edit_button">
                        您还没有完善该部分信息
                    </h4>
                @else
                <br>
                    @foreach( $resume->projects as $project )
                        项目名称：{{ $project->name }}<br>
                        开始时间：{{ $project->startdate }}<br>
                        结束时间：{{ $project->enddate }}<br>
                        项目内容：{{ $project->content }}<br>
                        项目收获：{{ $project->harvest }}<br>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>