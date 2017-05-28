<div class="modal fade" id="resume_deliver"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">选择简历</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>简历名称</td>
                                    <td>操作</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $resumes as $resume )
                                    <tr>
                                        <td>{{ $resume->name }}</td>
                                        <td>
                                            @if( $resume->complete == 100 )
                                                <a href="/student/resume_deliver/{{$position->id}}/{{$resume->id}}">
                                                    <button class="btn btn-success btn-sm deliver">选择</button>
                                                </a>
                                            @else
                                                <a href="/student/resume_deliver/{{$position->id}}/{{$resume->id}}">
                                                    <button class="btn btn-success btn-sm deliver disabled" data-toggle="tooltip" data-placement="top" title="请先完善简历,完整度为100%的简历才可进行此项操作">选择</button>
                                                </a>
                                                <a href="/student/resume_show/{{ $resume->id }}">
                                                    <button class="btn btn-primary btn-sm deliver">编辑</button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" >
    $(document).ready(function() {
        
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    });
</script>

