<div class="row">
    <div class="col-md-8">

        <div id="show_attach">
            <h4>
                10.附件信息

            </h4>
            <div class="item_details">
                
                @if(count($resume->attachs) == 0)

                @else
                    <br>
                    @foreach( $resume->attachs as $attach )
                        附件名称: {{ $attach->name }} <br>
                        附件地址： {{ $attach->address }} <br>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>