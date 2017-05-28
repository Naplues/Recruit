

$(document).ready(function() {

	$('#collect').click(collect);

});


function collect()
{
	if( $('#collect').val() == 'uncollect' )
		followUp();
	else
		followDown();
}

//关注
function followUp()
{
	$.get('/student/follow/' + $('#cid').val(),
		{},
		function(data)
		{
			$('#follow_number').text(data.follow_number);  //关注数目
			$('#isFollow').text('已关注');    //关注信息
			$('#follow').removeClass('btn-success');
			$('#follow').addClass('btn-default');
			$('#follow').val('follow');
			$('#f_value').text('取消关注');
		}
	);
}

//取消
function followDown()
{
	$.get('/student/unfollow/' + $('#cid').val(),
		{},
		function(data)
		{
			$('#follow_number').text(data.follow_number);  //关注数目
			$('#isFollow').text('未关注');    //关注信息
			$('#follow').removeClass('btn-default');
			$('#follow').addClass('btn-success');
			$('#follow').val('unfollow');
			$('#f_value').text('关注该公司');
		}
	);
}