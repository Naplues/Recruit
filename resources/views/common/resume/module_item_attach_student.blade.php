<div class="row">
    <div class="col-md-12">

        <div id="show_attach">
            <h4>
                10.附件信息
                <a href="/student/resume_attach_edit/{{ $resume->id }}/create/-1" class="hide"><button class="btn btn-success">新增</button></a>
            </h4>
            <div class="item_details">
                
                @if(count($resume->attachs) == 0)
                    <h4 class="edit_button">
                        <small>还有什么要展示</small>
                        
                    </h4>
                @else
                    
                    <div class="jumbotron">

                        @foreach( $resume->attachs as $attach )
                        <a href="/student/resume_attach_edit/{{ $resume->id }}/update/{{ $attach->id }}" class="hide"><button class="btn btn-primary" >编辑</button></a>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>
                                        <i class="icon icon-file"></i>
                                        <a href="/student/downloads_attach/{{ $attach->id }}">附件名称: {{ $attach->name }}</a>
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