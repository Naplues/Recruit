<div id="module_search_companies" class="hide">
<br>
    <form action="/student/company_search_details" method="GET">

        <div class="row">
            <div class="col-md-3"> 
                    <h4>筛选条件</h4>
            </div>
        </div>

        <!-- Ajax 筛选条件 -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="address">所属城市</label>
                    <input type="text" class="form-control sg-area-result" id="city" name="city" value="{{ $company_info->city or '' }}" placeholder="城市" >
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="scale">公司规模</label>
                    <select class="form-control" id="scale" name="scale">
                        <option value="0">--请选择</option>
                        <option value="1">50人以下</option>
                        <option value="2">50~200人</option>
                        <option value="3">200~500人</option>
                        <option value="4">500~2000人</option>
                        <option value="5">2000~5000人</option>
                        <option value="6">5000人以上</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="property">公司类型</label>
                    <select class="form-control" id="property" name="property">
                        <option value="0">--请选择</option>
                        <option value="1">国有企业</option>
                        <option value="2">股份合作企业</option>
                        <option value="3">联营企业</option>
                        <option value="4">有限责任公司</option>
                        <option value="5">股份有限公司</option>
                        <option value="6">私营企业</option>
                        <option value="7">中外合资企业</option>
                        <option value="8">外商独资企业</option>
                        <option value="9">其他企业</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-0" >
                <button class="btn btn-danger btn-lg" type="submit" id="search">查找公司</button>
            </div>

        </div>


    </form>
</div>
    
    <link rel="stylesheet" type="text/css" href="/css/SG_area_select.css">
    <script type="text/javascript" src='/js/iscroll.js'></script>
    <script type="text/javascript" src='/js/SG_area_select.js'></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#city').on('click',function(){
                $.areaSelect(); 
                
            })  

        })
    </script>