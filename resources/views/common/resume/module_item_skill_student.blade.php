<?php use App\Extensions\StudentInfo as StudentInfo; ?>
<div class="row">
    <div class="col-md-12">

        <div id="show_skill">
            <h4>
                8.专业技能
                <a href="/student/resume_skill_edit/{{ $resume->id }}/create/-1" class="hide"><button class="btn btn-success" class="hide">新增</button></a>
            </h4>
            <div class="item_details">
            
                @if(count($resume->skills) == 0)
                    <h4 class="edit_button">
                        <small>技多不压身呀</small>
                        
                    </h4>
                @else
                    
                    <div class="jumbotron">

                        @foreach( $resume->skills as $skill )

                        <a href="/student/resume_skill_edit/{{ $resume->id }}/update/{{ $skill->id }}" class="hide">
                            <button class="btn btn-primary">编辑</button></a>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <i class="icon icon-thumbs-up"></i>
                                        技能名称: {{ StudentInfo::getSkill($skill->type) }}
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h4>
                                        <i class="icon icon-signal"></i>
                                        技能水平： {{ $skill->level }}
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