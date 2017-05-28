@extends('layouts.company')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/style2.css">
<style type="text/css">
  .wapper {
    
    height: auto;
    min-height: 100%;
  }
</style>

<div class="wapper">
  

        <ul class="pages">
          <li class="chat page">
            <div class="chatArea">
            <div style="padding-bottom: 50px;"></div>
              <ul class="messages"></ul>
            </div>
            <input class="inputMessage" placeholder="输入聊天内容..."/>
          </li>
          <li class="login page">
            <div class="form">
              <h3 class="title">What's your nickname?</h3>
              <input class="usernameInput navbar-fixed-bottom" value="{{ $auth->name or '' }}" type="text" maxlength="14" />
            </div>
          </li>
        </ul>

</div>


  <script src="/js/jquery.min.js"></script>
  <script src="/js/socket.io-client/socket.io.js"></script>
  <script src="/js/main.js"></script>

<script type="text/javascript">
  window.onbeforeunload = function()
  { 
　　return confirm("离开页面将退出聊天室，确定离开？");
  }
</script>

@endsection

