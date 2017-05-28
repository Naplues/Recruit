<div class="row">
	<div class="col-md-8">
		招聘会名称：{{ $job_fair->name }}<br>
		招聘会地点：{{ $job_fair->host_address }}<br>
		时间：{{ $job_fair->time }}<br>
		席位：{{ $job_fair->total_number }}<br>
		已用席位：{{ $job_fair->used_number }}<br>

		<div class="jumbotron">
			<i class="icon icon-dashboard"></i> 详细说明：{{ $job_fair->details }}
		</div>

	</div>

	<div class="col-md-4">
		@if( count( $job_fair->joins ) != 0)
		<span>参展公司</span>
		<div class="list-group">
		    @foreach( $job_fair->joins as $join )
		        <div class="list-group-item">
		            <a href="/admin/company_info_show/{{ $join->company->id }}">
		                {{ $join->company->name }}
		            </a>
		        </div>
		        
		    @endforeach
		</div>
		@endif
	</div>
</div>

