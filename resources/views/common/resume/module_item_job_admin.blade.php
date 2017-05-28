
<div class="row">
    <div class="col-md-8">

<div id="show_job">
    <h4>7.求职意向</h4>
    <div class="item_details">
        @if(!isset($resume->job))

        @else
            期望职位类型： {{ $resume->job->property }}<br>
            偏爱城市：{{ $resume->job->city }}<br>
            目前状况：{{ $resume->job->state }}<br>
            薪资：{{ $resume->job->salary }}<br>
            入职时间：{{ $resume->job->arrival }}<br>
        @endif
    </div>
</div>

    </div>
</div>