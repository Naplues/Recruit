
<div class="row">
    <div class="col-md-8">

        <div id="show_basic">
            <h4>1.基本信息</h4>
            <div class="item_details">
                @if(!isset($resume->basic))

                @else
                    姓名：{{ $resume->basic->name }}<br>
                    性别： {{ $resume->basic->gender }}<br>
                    身高：{{ $resume->basic->height }}<br>
                    体重：{{ $resume->basic->weight }}<br>
                    出生日期 ：{{ $resume->basic->birthday }}<br>
                    证件号码：{{ $resume->basic->idnumber }}<br>
                    民族：{{ $resume->basic->idnumber }}<br>
                    健康状况： {{ $resume->basic->health }}<br>
                    政治面貌： {{ $resume->basic->status }}<br>
                    婚姻状况： {{ $resume->basic->marriage }}<br>
                    籍贯： {{ $resume->basic->origin }}<br>
                    户口所在地： {{ $resume->basic->permanen }}<br>
                @endif
            </div>
        </div>

    </div>
</div>

