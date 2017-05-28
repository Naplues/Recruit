<div class="row">
    <div class="col-md-8">

        <div id="show_skill">
            <h4>
                8.专业技能

            </h4>
            <div class="item_details">
            
                @if(count($resume->skills) == 0)

                @else
                    <br>
                    @foreach( $resume->skills as $skill )
                        技能名称: {{ $skill->type }} <br>
                        技能水平： {{ $skill->level }} <br>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>