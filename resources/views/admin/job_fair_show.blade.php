@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-success">
                <div class="panel-heading">招聘会详情</div>

                <div class="panel-body">
                    @if( !isset($job_fair) )
                        <h4>数据出错</h4>
                    @else
                        @include('common.details.module_detail_job_fair_admin')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
