@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span>公司列表</span>

                    <!-- Split button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger ">显示选项</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/company_list">全部显示</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/auth_company">仅显示未认证</a></li>
                            <li><a href="/admin/authed_company">仅显示已认证</a></li>
                        </ul>
                    </div>

                </div>

                <div class="panel-body">
                    
                    @if( count( $companies) == 0 )
                        <h4>没有公司注册</h4>
                    @else
                        @include('common.lists.module_list_company_admin')          
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
