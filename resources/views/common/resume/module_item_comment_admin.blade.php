<div class="row">
    <div class="col-md-8">

		<div id="show_comment">
		    <h4>9.自我评价</h4>
		    <div class="item_details">
		        @if(!isset($resume->comment))

		        @else
		            自我评价内容：{{ $resume->comment->details }}<br>
		        @endif
		    </div>
		</div>

	</div>
</div>