@extends('layouts.student')

@section('content')
<link href="/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="/css/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery-1.7.0.min.js"></script>
<script src="/js/jquery.filer.min.js"></script>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <div class="panel panel-default" id="panel_attach">
        
        <div class="panel-heading">条目编辑：附件</div>

        <div class="panel-body">
          
          <form id="form_attach" name="form_attach" action="/student/post_resume_attach" method="POST" enctype="multipart/form-data">
          
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" name="rid" value="{{ $rid }}">
            <input type="hidden" name="method" value="{{ $method }}">
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="name">
            <input type="hidden" name="address">
            <div class="form-group">
              <label for="attach">附件</label>
             <input type="file" class="form-control" id="attach" name="attach" required >
            </div>       
          
            <button type="submit" class="btn btn-primary" id="submit_attach" name="submit_attach">确认</button>

          </form>
        
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#attach').filer({
      limit:1,
      maxSize: 5,
      
      changeInput: true,
      showThumbs: true
  });
  });
</script>
@endsection
