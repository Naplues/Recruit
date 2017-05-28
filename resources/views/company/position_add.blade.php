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
                <li><a href="/company/position_list">职位列表</a></li>
                <li>发布新职位</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">发布新职位</div>

                <div class="panel-body">
                
                    <form action="/company/position_store" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                        <div class="form-group">
                            <label for="name">职位名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="请填写职位名称">
                        </div>
                        
                        <div class="form-group">
                            <label for="type">职位名称</label>
                            <select class="form-control" id="type" name="type">
                                <option value="0">全职</option>
                                <option value="1">兼职</option>
                                <option value="2">实习</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="salary">月薪</label>
                            <input type="text" class="form-control" id="salary" name="salary" placeholder="请填写数字，如果面谈请勿填写">
                        </div>

                        <div class="form-group">
                            <label for="recruit_number">招聘人数</label>
                            <input type="text" class="form-control" id="recruit_number" name="recruit_number" placeholder="输入需求人数">
                        </div>              

                        <div class="form-group">
                            <label for="abstract">职位描述</label>
                            <textarea id="abstract" class="form-control" name="abstract" rows="8" placeholder="填写职位相关信息：要求，职责等。" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">确认发布</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
