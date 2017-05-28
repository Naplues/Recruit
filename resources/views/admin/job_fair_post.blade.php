@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">发布招聘会</div>

                <div class="panel-body">
                    
                    <form id="job_fair_post" name="job_fair_post" action="/admin/job_fair_post" method="POST">
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label for="name">招聘会名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="请输入招聘会名称" required>
                        </div>

                        <div class="form-group">
                            <label for="host_address">举办地点</label>
                            <input type="text" class="form-control" id="host_address" name="host_address" placeholder="请输入举办地点" required>
                        </div>

                        <div class="form-group">
                            <label for="time">举办时间</label>
                            <input type="date" class="form-control" id="time" name="time" required >
                        </div>

                        <div class="form-group">
                            <label for="number">展位数目</label>
                            <input type="text" class="form-control" id="total_number" name="total_number" placeholder="输入展位数目" required >
                        </div>

                        <div class="form-group">
                            <label for="details">招聘会说明</label>
                            <textarea class="form-control" id="details" name="details" rows=8 required placeholder="说明招聘会需要注意的详情"></textarea>
                        </div>


                        <button type="submit" class="btn btn-success" id="submit" name="submit">发布</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
