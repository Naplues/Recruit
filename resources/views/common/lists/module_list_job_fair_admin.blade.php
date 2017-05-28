<!-- 模块:招聘会列表 -->

<div class="row">
	<div class="col-md-12">
		<div class="list-group">
		    @foreach( $lists as $list )
		        <div class="list-group-item">
		        <div class="row">
		        	<div class="col-md-4">
			        	<a href="/admin/job_fair_show/{{ $list->id }}">
			                {{ $list->name }}
			            </a>
		        		<span class="badge"> {{ $list->total_number }} 席位</span>
		        	</div>
		        	<div class="col-md-4">
		        		<i class="icon icon-time"></i> 举办时间 {{ $list->time }}
		        	</div>

		        </div>
		            
		            
		        </div>
		    @endforeach
		</div>
	</div>
</div>

