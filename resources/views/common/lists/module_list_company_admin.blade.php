
<!-- 公司列表模块：管理员端 -->

<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>


<div class="row">
    <div class="col-md-12">
        <div class="list-group">
            @foreach( $companies as $company )

                <div class="list-group-item">

                    <a href="/admin/company_info_show/{{ $company->id }}">{{ $company->name }}</a>
                    @if( $company->auth == 1 )
                        
                        <span class="badge"> {{ CompanyInfo::getAuth($company->auth) }} </span>

                    @else

                        <a href="/admin/company_info_show/{{ $company->id }}">
                            <button class="btn btn-info btn-xs">进入认证</button>
                        </a>

                    @endif

                     
                    
                </div>
            
            @endforeach
        </div>
        
        {{ $companies->links() }}

    </div><!-- .col-md -->
</div><!-- .row -->