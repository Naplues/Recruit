<div class="row">
	
	<div class="col-md-8">
		招聘会名称：{{ $job_fair->name }}<br>
		招聘会地点：{{ $job_fair->host_address }}<br>
		时间：{{ $job_fair->time }}<br>
		席位：{{ $job_fair->total_number }}<br>
		已用席位：{{ $job_fair->used_number }}<br>
		详细说明：{{ $job_fair->details }}<br>
	</div>

	<div class="col-md-4">
		@if( count( $job_fair->joins ) != 0)
		<div class="input-group">
			<input class="form-control" type="text" id="search_name" name="name" placeholder="看看你心仪的公司是否参展" >
			<span class="input-group-btn">
	            <button class="btn btn-primary" id="search" type="submit">检索</button>
	        </span>
		</div>
		
        <span>参展公司</span>
        <div class="list-group company_list">
            @foreach( $job_fair->joins as $join )
                <div class="list-group-item show">
                    <a href="/student/company_info_show/{{ $join->company->id }}">
                        <span class="company_list_item">{{ $join->company->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
        @endif
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#search').click(search);
	});
	function search()
	{
		$('.list-group-item').addClass('show');
		var name = $('#search_name').val();
		$('.company_list_item').each(function(){

			var val = $(this).text();

			if(val.indexOf(name) < 0)   //不包含
			{

				$(this).parent().parent().removeClass('show');
				$(this).parent().parent().addClass('hide');
			}

		});
		

	}
</script>