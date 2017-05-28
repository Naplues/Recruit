
<!-- 公司列表模块：管理员端 -->

<?php use App\Extensions\CompanyInfo as CompanyInfo; ?>

<div class="row">
    <div class="col-md-12">
        <div class="list-group"> 
            <!-- 分页链接 -->
            <div class="text-center">
                {{ $companies->links() }}
            </div>
            @foreach( $companies as $company ) <!-- 循环遍历整个数组，逐条显示每一个对象 -->

                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="list-group-item-heading">
                               <a href="/guest/goto_company_info/{{ $company->id }}">{{ $company->name }}</a>
                            </h4>
                            @if( $company->auth == 1 )     
                                <span class="badge"> {{ CompanyInfo::getAuth($company->auth) }} </span>
                            @endif

                        </div>
                        <div class="col-md-5">
                            
                            <h4>
                            <i class="icon icon-map-marker"></i>
                                {{ $company->city }}
                            </h4>
                        </div>
                        <div class="col-md-2">
                            <h4><span class=" badge">{{ $company->focus }}</span>人</h4>关注

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <p class="list-group-item-text">
                                规模： {{ CompanyInfo::getScale($company->scale) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- 分页链接 -->
            <div class="text-center">
                {{ $companies->links() }}
            </div>
        </div>


    </div><!-- .col-md -->
</div><!-- .row -->