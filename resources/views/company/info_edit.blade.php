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
                <li>编辑公司信息</li>
                
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">编辑公司信息 </div>

                <div class="panel-body">

                    @if( isset($error) )

                        <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <p class="text-center"><strong>温馨提示!</strong>{{ $error }}</p>
                        </div>
                    @endif
                <form action="/company/info_store" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>


                    <div class="row">

                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="name">公司名称</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $company_info->name or '' }}" placeholder="公司全称" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="form-group">
                                <label for="scale">公司规模</label>
                                <select class="form-control" id="scale" name="scale">
                                    <option value="0">请选择</option>
                                    <option value="1">50人以下</option>
                                    <option value="2">50~200人</option>
                                    <option value="3">200~500人</option>
                                    <option value="4">500~2000人</option>
                                    <option value="5">2000~5000人</option>
                                    <option value="6">5000人以上</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="property">公司类型</label>
                                <select class="form-control" id="property" name="property">
                                    <option value="0">请选择</option>
                                    <option value="1">国有企业</option>
                                    <option value="2">股份合作企业</option>
                                    <option value="3">联营企业</option>
                                    <option value="4">有限责任公司</option>
                                    <option value="5">股份有限公司</option>
                                    <option value="6">私营企业</option>
                                    <option value="7">中外合资企业</option>
                                    <option value="8">外商独资企业</option>
                                    <option value="9">其他企业</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="industry">所属行业</label>
                                <textarea id="industry" class="form-control" name="industry" rows="4" placeholder="可以填写多个行业" required>{{ $company_info->industry or '' }}</textarea>
                            </div> 
                            <div class="form-group">
                                <label for="website">官网</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ $company_info->website or '' }}" placeholder="请填写官方网址" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="form-group">
                                <label for="address">所属城市</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ $company_info->city or '' }}" placeholder="城市" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">公司地址</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $company_info->address or '' }}" placeholder="公司详细地址" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $company_info->email or '' }}" placeholder="请输入邮箱" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">电话</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $company_info->phone or '' }}" placeholder="输入联系电话" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="abstract">公司详情</label>
                                <textarea id="abstract" class="form-control" name="abstract" rows="8" placeholder="公司介绍，请最少填写至少200字，便于求职者了解贵公司。" required>{{ $company_info->abstract or '' }}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="auth">公司附件</label>
                                <input type="file"  id="auth" name="auth" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">确认填写</button>
                            <span>每次填写提交后需待管理员审核</span>
                        </div>
                    </div>
                    
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#auth').filer({
        limit:1,
        maxSize: 5,
      
        changeInput: true,
        showThumbs: true
    });
});
</script>
@endsection
