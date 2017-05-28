

<div class="row">
    <div class="col-md-8">
        <div id="show_work">
            <h4>
                5.实习/工作经历

            </h4>
            <div class="item_details">
                
                @if(count($resume->works) == 0)

                @else
                <br>

                    @foreach( $resume->works as $work )
                        实习/工作单位： {{ $work->company }}<br>
                        开始时间： {{ $work->startdate }}<br>
                        结束时间：{{ $work->enddate }}<br>
                        工作岗位：{{ $work->position }}<br>
                        工作内容：{{ $work->content }}<br>
                        工作收获：{{ $work->harvest }}<br>
                        <hr>
                    @endforeach

                @endif
            </div>
        </div>

    </div>
</div>