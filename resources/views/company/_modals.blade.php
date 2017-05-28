<div class="modal fade" id="talk"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">添加宣讲</h4>
            </div>
            <div class="modal-body">

                <form action="/company/career_talk_post" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label for="day">日期</label>
                                <input type="text" class="form-control" id="day" name="day" required>
                            </div>

                            <div class="form-group">
                                <label for="city">城市</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="请输入城市" required>
                            </div>

                            <div class="form-group">
                                <label for="college">学校</label>
                                <input type="text" class="form-control" id="college" name="college" placeholder="请输入学校" required>
                            </div>

                            <div class="form-group">
                                <label for="address">详细地址</label>
                                <input type="text" class="form-control" id="address" name="address"  placeholder="请输入详细地址" required>
                            </div>

                            <div class="form-group">
                                <label for="details">说明</label>
                                <textarea class="form-control" id="details" name="details" rows="5" placeholder="请输入说明信息"></textarea>
                            </div>

                        </div>
                    </div>
                    <button class="btn btn-success">提交</button>
                </form>
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

        //打开模态框
        $('#post').click(function(){
            $('#talk').modal({backdrop: 'static', keyboard: false});
        });

        $('.details_btn').click(function(){
            $('.details_btn').popover('toggle');
        });
    });
</script>