<div class="row">
    <div class="col-md-8">

        <div id="show_contact">
            <h4>3.联系方式</h4>
            <div class="item_details">
                @if(!isset($resume->contact))

                @else
                    电话：{{ $resume->contact->phone }}<br>
                    紧急联系人电话 {{ $resume->contact->emergency }}<br>
                    邮箱： {{ $resume->contact->email }}<br>
                    通讯地址: {{ $resume->contact->address }}<br>
                @endif
            </div>
        </div>

    </div>
</div>