@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            @if (Auth::guest())
                <li><a href="/">首页</a></li>
            @else
                <li><a href="/student/index">主页</a></li>
            @endif
                <li>简历列表</li>
                
            </ol>
        </div>
    </div>
    <div class="row success hide">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <strong>成功删除选中的简历</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <span> 简历列表 </span> 
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
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-danger btn-sm" id="delete_selected_checkbox" data-toggle="modal" data-target="#delete_resume_selected" data-backdrop="static" data-whatever="" disabled>删除选中</button>
                                <!-- <button type="button" class="btn btn-info btn-sm">投放人才库</button> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <form action="/student/resume_create" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" id="name" name="name" placeholder="输入职位名称">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" type="submit">新建简历</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div><!--  .panel-heading -->

                <div class="panel-body">
                    
                    @if(count($lists) == 0)
                        <h1>您还没有生成任何简历</h1>
                        <form action="/student/resume_create" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="输入简历名称">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" type="submit">新建简历</button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    @else
                        <table class="table">
                            <tr>
                                <td></td>
                                <td>简历名称</td>
                                <td>创建时间</td>
                                <td>完整度</td>
                                <td>操作</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($lists as $list)
                                <tr class="resume_{{ $list->id }}" >
                                    <td>
                                        <input type="checkbox" class="checkboxes" name="" value="{{ $list->id }}" data-name="" aria-label="...">
                                    </td>
                                    <td><a href="/student/resume_show/{{ $list->id }}">{{ $list->name }}</a></td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>{{ $list->complete }}% </td>
                                    <td>
                                        @if( $list->is_post == 0 )
                                            <a href="/student/resume_show/{{ $list->id }}">
                                                <button class="btn btn-xs btn-success">查看并编辑</button>
                                            </a>
                                        @else
                                            <a href="/student/resume_show/{{ $list->id }}">
                                                <button class="btn btn-xs btn-success disabled" data-toggle="tooltip" data-placement="top" title="简历已经投放人才库，不可编辑">查看并编辑</button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-xs btn-danger delete" data-toggle="modal" data-target="#delete_resume" data-backdrop="static" data-whatever="{{ $list->name }}" data-id="{{ $list->id }}">删除</button>
                                    </td>
                                    <td>
                                    @if( $list->complete == 100 )
                                        @if( $list->is_post == 0 )
                                            <a href="/student/resume_post/{{ $list->id }}">
                                                <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="该简历可以投放人才库中供用人单位检索查看，增大求职机会,投放之前确保简历内容已经无需修改">投放人才库</button>
                                            </a>
                                        @endif
                                    @else
                                        <a href="#">
                                            <button class="btn btn-info btn-xs disabled" data-toggle="tooltip" data-placement="top" title="请先完善简历,完整度为100%的简历才可进行此项操作">投放人才库</button>
                                        </a>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 删除一份简历 -->
<div class="modal fade bs-example-modal-sm" id="delete_resume" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">确认框</h4>
            </div>
            <div class="modal-body">
                <span id="resume_name"></span>
                <a href="#"><button class="btn btn-success" id="delete">确认删除简历</button></a>
                <button class="btn btn-danger" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>
<!-- 删除多份简历 -->
<div class="modal fade bs-example-modal-sm" id="delete_resume_selected" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">确认框</h4>
            </div>
            <div class="modal-body">
                <span id="resume_name"></span>
                <button class="btn btn-success" id="delete_selected">删除所选简历</button>
                <button class="btn btn-danger" data-dismiss="modal">取消</button>
            </div>
        </div>
  </div>
</div>
<script type="text/javascript" >
    $(document).ready(function() {
        //显示提示信息
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        //打开模态框
        $('#delete_resume').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // 触发模态框的按钮
    
            var resume_name = button.data('whatever'); // 从data-*属性中解析信息
            var id = button.data('id');
            // 如果必要的话, 你应该在这里初始化一个Ajax请求 (然后在一个回调函数中进行更新).
            // 更新模态框的文本内容. 我们在这里使用jQuery, 但是你也可以使用一个data绑定库或者别的方法。
            var modal = $(this);
            $('#resume_name').html('<h4>' + resume_name + '</h4>');  //显示简历名称
            $('#delete').parent('a').prop('href', '/student/resume_delete/' + id);  //设置删除路由
        });


        //选择全部
        $('#select_all').change(function(){
            $('.checkboxes').each(function() {
                $(this).prop('checked', 'checked');
            });
            enable_delete_btn();
        });
        //取消全部
        $('#cancel_all').change(function(){
            $('.checkboxes').each(function() {
                $(this).prop('checked', false);
            });
            enable_delete_btn();
        });
        //反选
        $('#inverse_all').change(function(){
            $('.checkboxes').each(function() {
                if($(this).prop('checked') == true)
                    $(this).prop('checked', false);
                else
                   $(this).prop('checked', 'checked'); 
            });
            enable_delete_btn();
        });
        //单机复选框
        $('.checkboxes').change(enable_delete_btn);

        //删除选中的简历
        $('#delete_selected').click(function(){
            var id = new Array();
            $('.checkboxes').each(function() {
                if($(this).prop('checked') == true)
                {
                    id.push($(this).val());
                }
            });
            $.get(
                '/student/resume_delete_selected',
                {
                    rids: id
                },
                function(){
                    $('.checkboxes:checked').each(function(){
                        $(this).parent().parent().addClass('hide');
                    });
                    $('#delete_resume_selected').modal('hide');  //关闭模态框
                    $('.checkboxes').each(function() {  //取消选项
                        $(this).prop('checked', false);
                    });
                    $('.success').removeClass('hide');
                    $(".success").delay(3000).hide('fade');
                });
        });
        //激活删除按钮
        function enable_delete_btn()
        {
            if($('.checkboxes:checked').length > 0)
                $('#delete_selected_checkbox').prop('disabled', false);
            else
                $('#delete_selected_checkbox').prop('disabled', 'disabled');
        }
    });
</script>

@endsection
