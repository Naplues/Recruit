<!-- 模块:招聘会列表 -->

<div class="row">
	<div class="col-md-12">
		<div class="list-group">
		    @foreach( $lists as $list )
		        <div class="list-group-item">

		            <a href="/guest/goto_job_fair_info/{{ $list->id }}">
		                {{ $list->name }}
		            </a>
		            <span class="badge"> {{ $list->total_number }} 席位</span>
		        </div>
		    @endforeach
		</div>
	</div>
</div>

