<div class="row">
    <div class="col-md-12 col-md-offset-0">
        @if(isset($companies))
        <div class="panel panel-success">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <div class="list-group">

                  @foreach($companies as $company)

                    @foreach($company->talks as $talk)

                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="icon icon-building"></i>
                                    学校：{{ $talk->college }}
                                </div>
                                <div class="col-md-3">
                                    <i class="icon icon-home"></i>
                                    公司：<a href="/guest/goto_comany_info/{{ $talk->company->id }}">{{ $talk->company->name }}</a>
                                </div>
                                <div class="col-md-2">
                                    <i class="icon icon-time"></i>
                                    时间： {{ $talk->day }}
                                </div>
                                <div class="col-md-3">
                                    发布时间:{{ $talk->created_at }}
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-success btn-xs details_btn">查看明细</button>
                                </div>
                            </div>
                            <div class="row details hide jumbotron h4">
                                <div class="col-md-4">
                                    城市：{{ $talk->city }}
                                </div>
                                <div class="col-md-8">
                                    详细地址: {{ $talk->address }}
                                </div>
                                <hr>
                                <div class="col-md-12 part-content">
                                    宣讲说明：{{ $talk->details }}
                                </div>
                                <div class="col-md-12">
                                    <a href="/guest/goto_career_talk_info/{{ $talk->id }}">查看更多</a>
                                </div>
                            </div>
                        </div>


                    @endforeach

                  @endforeach  
                </div>
                {{ $companies->links() }}
            </div>
        </div>
        @endif
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.details_btn').click(function(){

            var de = $(this).parent().parent().parent().children('.details');
            if(de.hasClass('hide'))
                de.removeClass('hide');
            else
                de.addClass('hide');
        });
    });
</script>