
<!-- 模块：公司信息详情 -->

<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>

<div>
    <h1>单位名称： {{ $company_info->name }}</h1>
    规模： {{ CompanyInfo::getScale($company_info->scale) }}<br>
    公司地址： {{ $company_info->address }}<br>
    公司性质： {{ CompanyInfo::getCompanyProperty($company_info->property) }}<br>
    公司行业： {{ $company_info->industry }}<br>
    邮箱：{{ $company_info->email }}<br>
    电话：{{ $company_info->phone }}<br>
    公司简介： {{ $company_info->abstract }}<br>
    是否认证： {{ CompanyInfo::getAuth( $company_info->auth ) }}<br>
    关注人数： {{ $company_info->focus }}<br>
    发布职位数量： {{ $company_info->job_number }}<br>
</div>

@if(null == $company_info->auth_file_path )
<a href="#">
    <button class="btn btn-danger disabled">
        <i class="icon icon-download-alt"></i> 下载认证材料</button>
        <span>认证资料未上传</span>

        
</a>
@else
<a href="/admin/downloads_auth/{{ $company_info->id }}"><button class="btn btn-danger">下载认证材料</button></a>
    @if($company_info->auth == 0)

            <div class="text-right">
                <a href="/admin/auth_pass/{{ $company_info->id }}">
                    <button class="btn btn-success">确认通过</button>
                </a>
            </div>
    @else
            <div class="text-right">
                
                    <button class="btn btn-success">已通过认证</button>
               
            </div>
    @endif

@endif


