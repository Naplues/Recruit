
<div class="row">
    <div class="col-md-8">
        <div id="show_award">
            <h4>
                6.所获奖励

            </h4>
            <div class="item_details">
                
                @if(count($resume->awards) == 0)

                @else
                <br>
                    @foreach( $resume->awards as $award )
                        奖项名称: {{ $award->name }} <br>
                        奖项等级： {{ $award->level }} <br>
                        获奖时间： {{ $award->time }} <br>
                        获奖描述： {{ $award->details }} <br>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>