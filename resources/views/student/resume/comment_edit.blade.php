@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                    
            <div class="panel panel-default" id="panel_comment">
                <div class="panel-heading">自我评价</div>

                <div class="panel-body">

		          	<form id="form_comment" name="form_comment" action="/student/post_resume_comment" method="POST">

			            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			            <input type="hidden" name="rid" value="{{ $rid }}">
			            <input type="hidden" name="method" value="{{ $method }}">
			            <input type="hidden" name="id" value="{{ $id }}">

                      	<div class="form-group">
                        	<label for="comment_name">自我评价</label>
                        	<textarea class="form-control" id="comment_details" name="details" rows="5" required placeholder="最多不超过500字"> {{ $comment->details or '' }} </textarea><br>
                  		</div>

                  		<button type="submit" class="btn btn-primary" id="submit_comment" name="submit_comment">确认</button>  
                  	
                  	</form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
