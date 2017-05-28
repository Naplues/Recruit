<div class="row">
    <div class="col-md-8">

        <div id="show_education">
            <h4>
                2.教育经历

            </h4>
            <div class="itemdetails">
            
                @if(count($resume->educations) == 0)

                @else
                <br>
                    @foreach( $resume->educations as $education )
                        开始时间：{{ $education->startdate }}<br>
                        结束时间：{{ $education->enddate }}<br>
                        学校：{{ $education->school }}<br>
                        学历：{{ $education->degree }}<br>
                        学位：{{ $education->qualification }}<br>
                        类型：{{ $education->type }}<br>
                        学院：{{ $education->campus }}<br>
                        专业：{{ $education->major }}<br>
                        课程：{{ $education->class }}<br>
                        排名：{{ $education->rank }}<br>
                        <hr>
                    @endforeach   

                @endif
            </div>
        </div>

    </div>
</div>
