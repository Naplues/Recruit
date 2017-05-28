<!-- 模块：职位信息列表 -->

<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>

<div class="list-group">
    <!-- 分页链接 -->
    <div class="text-center">
        {{ $positions->links() }}
    </div>
    @foreach( $positions as $position )
        <div class="list-group-item" >
            <div class="row">
                <div class="col-md-4">
                    <h4>
                    	<a href="/guest/goto_position_info/{{$position->id}}" >
                    		{{ $position->name }}
                		</a>
                		<small>
                        &nbsp;&nbsp;
                			<a href="/guest/goto_company_info/{{ $position->company->id or '' }}">
                				<i class="icon icon-building"></i> {{ $position->company->name  or ''}}
                			</a>
                		</small>
            		</h4>
                     <span class="glyphicon glyphicon-yen"></span>{{ $position->salary }} &nbsp;&nbsp;
                    <span class="glyphicon glyphicon-map-marker"></span> {{ $position->company->city or ''}}
                </div>
            
                <div class="col-md-4">
                    <h4>&nbsp;</h4>
                    类型:<span class="badge">{{ CompanyInfo::getPositionType( $position->type ) }}</span>
                </div>
            
                <div class="col-md-4">
                    <h4>&nbsp;</h4>
                    <div class="text-right"><i class="icon icon-time"></i> {{ $position->created_at }}</div>
                </div>
            
            </div>
        
        </div>        
    @endforeach
    <div class="text-center">
        {{ $positions->links() }}
    </div>
</div>