<div class="row">
    <div class="col-md-12">

		<div id="show_comment">
            <h4>9.自我评价</h4>
            <div class="item_details">
                @if(!isset($resume->comment))
                    <h4 class="edit_button">
                        <small>没人比我更了解自己</small>
                        <a href="/student/resume_comment_edit/{{ $resume->id }}/create/-1" class="hide">
                            <button class="btn btn-success">
                                新建
                            </button>
                        </a>
                    </h4>
                @else

                    <div class="jumbotron">

                        <a href="/student/resume_comment_edit/{{ $resume->id }}/update/{{ $resume->comment->id }}" class="hide"><button class="btn btn-primary">编辑</button></a>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                	<i class="icon icon-dashboard"></i>
                                	自我评价内容：{{ $resume->comment->details }}
								</h4>
							</div>
						</div>
					</div>

                @endif
            </div>
        </div>

	</div>
</div>