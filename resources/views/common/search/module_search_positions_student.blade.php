

<div id="module_search_positions" class="hide">
<br>
    <form action="/student/position_search_details" method="GET">

        <div class="row">
            <div class="col-md-3"> 
                    <h4>筛选条件</h4>
            </div>
        </div>

        <!-- Ajax 筛选条件 -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="city">职位类型</label>
                    <select class="form-control" id="type" name="type">
                        <option value="0">全职</option>
                        <option value="1">兼职</option>
                        <option value="2">实习</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="scale">选定时间之后发布</label>
                    <input type="text" class="form-control" id="time" name="time">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="property">招聘人数</label>
                    <select id="order" name="order" class="form-control" >
                        <option value="0">升序</option>
                        <option value="1">降序</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-1">
                <div class="form-group">
                    <label for="scale">最低薪资</label>
                    <input type="text" class="form-control" id="salary" name="salary">
                </div>
            </div>
            
            <div class="col-md-2 col-md-offset-0" >
                <button class="btn btn-danger btn-lg" type="submit" id="search">查找职位</button>
            </div>

        </div>

    </form>
</div>
    
    <link rel="stylesheet" type="text/css" href="/css/SG_area_select.css">
    <script type="text/javascript" src='/js/iscroll.js'></script>
    <script type="text/javascript" src='/js/SG_area_select.js'></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#position_city').on('click',function(){
                $.areaSelect(); 
            })  

        })
    </script>