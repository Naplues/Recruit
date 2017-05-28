@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="panel panel-success" id="panel_contact">
                <div class="panel-heading">联系方式</div>

                <div class="panel-body">
		          	<form id="form_contact" name="form_contact" action="/student/post_resume_contact" method="POST">

			            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			            <input type="hidden" name="rid" value="{{ $rid }}">
			            <input type="hidden" name="method" value="{{ $method }}">
			            <input type="hidden" name="id" value="{{ $id }}">


                      	<div class="row">
                          <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                              <label for="phone">电话</label>
                              <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone or '' }}" placeholder="电话" required>
                            </div>

                            <div class="form-group">
                              <label for="emergency">紧急联系人电话</label>
                              <input type="text" class="form-control" id="emergency" name="emergency" value="{{ $contact->emergency or '' }}" placeholder="紧急联系人电话" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="email">邮箱</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email or '' }}" placeholder="邮箱" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="address">通讯地址</label>
                              <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address or '' }}" placeholder="通讯地址" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit_contact" >确认</button>

                          </div>
                        </div>
                  	</form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
