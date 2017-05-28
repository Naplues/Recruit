<div class="row">
    <div class="col-md-12">

        <div id="show_contact">
            <h4>3.联系方式</h4>
            <div class="item_details">
                @if(!isset($resume->contact))
                    <h4 class="edit_button">
                        <small>HR第一时间对你的问候</small>
                        <a href="/student/resume_contact_edit/{{ $resume->id }}/create/-1" class="hide">
                            <button class="btn btn-success">新建</button></a>
                    </h4>
                @else
                    
                    <div class="jumbotron">

                        <a href="/student/resume_contact_edit/{{ $resume->id }}/update/{{ $resume->contact->id }}" class="hide"><button class="btn btn-primary ">编辑</button></a>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                <i class="icon icon-phone"></i>
                                    电话：{{ $resume->contact->phone }}
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <h4>
                                <i class="icon icon-phone"></i>
                                    紧急联系人电话：{{ $resume->contact->emergency }}
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <h4>
                                <i class="icon icon-envelope-alt"></i>
                                    邮箱： {{ $resume->contact->email }}
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <h4>
                                <i class="icon icon-home"></i>
                                    通讯地址: {{ $resume->contact->address }}
                                </h4>
                            </div>
                        </div>

                    </div>

                @endif
            </div>
        </div>

    </div>
</div>


