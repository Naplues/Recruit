<?php use App\Extensions\StudentInfo as StudentInfo; ?>

<div class="row">
    <div class="col-md-12">
        
        <div id="show_award">
            <h4>
                6.所获奖励
                <a href="/student/resume_award_edit/{{ $resume->id }}/create/-1" class="hide">
                <button class="btn btn-success">新增</button></a>
            </h4>
            <div class="item_details">
                
                @if(count($resume->awards) == 0)

                    <h4 class="edit_button">
                        <small>这是你自豪的底气</small>
                    </h4>
                @else

                    <div class="jumbotron">

                        @foreach( $resume->awards as $award )
                        <a href="/student/resume_award_edit/{{ $resume->id }}/update/{{ $award->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>

                        <div class="row">
                            <div class="col-md-4">
                                <h4>
                                    <i class="icon icon-trophy"></i>
                                    奖项名称: {{ $award->name }}
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <h4>
                                    <i class="icon icon-signal"></i>
                                    奖项等级： {{ StudentInfo::getLevel( $award->level) }}
                                </h4>
                            </div>
                            <div class="col-md-4">
                                <h4>
                                    <i class="icon icon-time"></i>
                                    获奖时间： {{ $award->time }}
                                </h4>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                <i class="icon icon-dashboard"></i>
                                    获奖描述： {{ $award->details }}
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