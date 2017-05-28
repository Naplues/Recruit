@extends('layouts.company')

@section('content')
<link href="/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="/css/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery-1.7.0.min.js"></script>
<script src="/js/jquery.filer.min.js"></script>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
        @if (Auth::guest())
            <li><a href="/">首页</a></li>
        @else
            <li><a href="/company/index">主页</a></li>
        @endif
            <li>上传头像</li>
            
        </ol>
    </div>
  </div>
  <div class="row">
      <div class="col-md-12 col-md-offset-0">
          <div class="panel panel-success">
              <div class="panel-heading">上传头像</div>

              <div class="panel-body">
                  <img src="/uploads/{{ $auth->avatar or 'images/company.jpg' }} " alt="..." width="200" height="200" class="img-rounded">
                  <form action="/company/profile_avatar_post" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      <div class="form-group">
                          <label for="basic_photo">照片</label>
                          <input type="file" class="form-control" id="basic_photo" name="avatar" required >
                      </div>
                      <button type="submit" class="btn btn-success">提交</button>
                  </form>
              </div>

          </div>
      </div>
  </div><!-- .row -->
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#basic_photo').filer({
      limit:1,
      maxSize: 5,
      
      changeInput: true,
      showThumbs: true
  });
  });
</script>
@endsection
