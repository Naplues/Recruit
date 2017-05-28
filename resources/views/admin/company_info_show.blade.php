@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    校招单位详情

                </div>

                <div class="panel-body">

                    @if(!isset($company_info))
                        <h1>该公司还未填写相关信息</h1>
                        
                    @else
                        @include('common.details.module_detail_company_admin')
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
