@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <ol class="breadcrumb">
          @if (Auth::guest())
              <li><a href="/">首页</a></li>
          @else
              <li><a href="/company/index">主页</a></li>
          @endif
              <li>人才列表</li>
          </ol>
      </div>
    </div>
    <div class="row success hide">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>发送成功</strong> 查看我发送的消息
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="panel panel-success">
                <div class="panel-heading">人才库查询</div>
                <div class="panel-body">
                    <form action="/company/resume_search" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="input-group input-group-lg">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="resume_search_toggle" type="button">精确查找</button>
                            </span>
                            <input type="text" class="form-control" id="resume_name" name="name" placeholder="输入简历名称：填写相关职位">
                            <span class="input-group-btn">
                                <button class="btn btn-success" id="submit" type="submit">
                                <i class="icon icon-search"></i>一键搜索简历</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>

                    @include('common.search.module_search_resumes_company')

                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    共有 <b>{{ $resumes->total() }}</b> 份简历&nbsp;&nbsp;&nbsp;第<b>{{ $resumes->currentPage() }}</b> 页
                    <a href="{{ $resumes->url(1) }}">首页</a>
                    <a href="{{ $resumes->previousPageUrl() }}">上一页</a>
                    <a href="{{ $resumes->nextPageUrl() }}">下一页</a>
                    <a href="{{ $resumes->url( $resumes->lastPage() ) }}">尾页</a>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info btn-sm ">
                            <input type="checkbox" autocomplete="off" id="select_all"> 全选
                        </label>
                        <label class="btn btn-default btn-sm">
                            <input type="checkbox" autocomplete="off" id="cancel_all"> 取消全选
                        </label>
                        <label class="btn btn-primary btn-sm">
                            <input type="checkbox" autocomplete="off" id="inverse_all"> 反选
                        </label>
                    </div>
                    <button class="btn btn-danger btn-sm" id="open" 
                        data-toggle="modal" data-backdrop="static" data-target="#dialog">发送通知</button>
                </div>
                <!-- 简历列表展示 -->
                <div class="panel-body">
                    <div class="text-center">
                        {{ $resumes->links() }}
                    </div>
                    <div class="list-group">
                        @foreach( $resumes as $resume )
                            <div class="list-group-item">
                                <input type="checkbox" class="checkboxes" name="resume_item" value="{{ $resume->owner->id }}"
                                data-name="{{ $resume->owner->name }}" aria-label="...">
                                <a href="/company/resume_show_in_lib/{{$resume->id}}" >
                                {{ $resume->name }}  --{{ $resume->owner->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>     

                    <div class="text-center">
                        {{ $resumes->links() }}
                    </div>
                    
                </div>

            </div>
        </div>
    </div><!-- .row -->
</div>

<div class="modal fade" id="dialog"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">发送面试通知</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label for="day">收信人</label>
                            <div class="well" id="dialog_name" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details">通知内容</label>
                            <textarea class="form-control" id="details" name="details" rows="8" placeholder="请输入笔试，面试时间地点等相关事宜"></textarea>
                        </div>

                    </div>
                </div>
                <button class="btn btn-success" type="button" id="send">发送</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        //$('#module_search_companies').hide();
        //$('#module_search_positions').hide();
        
        $('#resume_search_toggle').click(function(){
            var input = $('#resume_input');
            var submit_btn = $('#submit');
            if( $('#module_search_resumes').hasClass('hide') )    //如果有hide，则去掉，否则加上
            {
                $('#module_search_resumes').removeClass('hide');
                input.prop('disabled', 'disabled');
                submit_btn.prop('disabled', 'disabled');
            }
            else
            {
                $('#module_search_resumes').addClass('hide');
                input.prop('disabled', false);
                submit_btn.prop('disabled', false);
            }
        });

        //选择全部
        $('#select_all').change(function(){
            $('.checkboxes').each(function() {
                $(this).prop('checked', 'checked');
            });
        });
        //取消全部
        $('#cancel_all').change(function(){
            $('.checkboxes').each(function() {
                $(this).prop('checked', false);
            });
        });
        //反选
        $('#inverse_all').change(function(){
            $('.checkboxes').each(function() {
                if($(this).prop('checked') == true)
                    $(this).prop('checked', false);
                else
                   $(this).prop('checked', 'checked'); 
            });
        });
        //模态框显示前的操作
        $('#dialog').on('show.bs.modal', function (e) {
            var str = '';
            var nameStr = '';
            $('.checkboxes').each(function() {
                if($(this).prop('checked') == true)
                {
                    nameStr += '<button class="btn btn-info btn-xs" style="margin:3px;">' + $(this).data('name') +
                     '</button> ';
                }
            });
            
            $('#dialog_name').html(nameStr);
        });
        //点击发送通知
        $('#send').click(function(){
            var id = new Array();
            $('.checkboxes').each(function() {
                if($(this).prop('checked') == true)
                {
                    id.push($(this).val());
                }
            });
            $.get('/company/accept_selected_resume',
                {
                    uids : id,
                    details : $('#details').val()
                },
                function(){
                    $('#dialog').modal('hide');  //关闭模态框
                    $('.checkboxes').each(function() {  //取消选项
                        $(this).prop('checked', false);
                    });
                    $('.success').removeClass('hide');
                    $(".success").delay(3000).hide('fade');
                });
        });
    });
</script>
@endsection
