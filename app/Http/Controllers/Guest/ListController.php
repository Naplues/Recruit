<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company as Company;
use App\Models\Position as Position;
use App\Models\JobFair as JobFair;
use App\Models\CareerTalk as CareerTalk;

/*
|--------------------------------------------------------------------------
| 游客访问控制器 : 列表控制器
|--------------------------------------------------------------------------
|
| 本控制器是游客访问控制器，供游客是使用
|
*/
class ListController extends Controller
{
    //获取公司列表
    public function get_companies_list()
    {
        //从Company表中获取所有记录并且进行分页，每页显示10条数据
    	$companies = Company::where('auth', 1)->paginate(10); 
        //返回列表视图，并且将获取的参数传递到前端 
        return view('student.company_info_list')->with('companies', $companies);
    }

    //获取职位列表
    public function get_positions_list()
    {
        $positions = Position::paginate(10);
    	return view('student.position_list')->with('positions', $positions);
    }

    //获取招聘会列表
    public function get_job_fairs_list()
    {
		$lists = JobFair::paginate(10);
    	return view('student.job_fair_list')->with('lists', $lists);
    }

    //获取宣讲会列表
    public function get_career_talks_list()
    {
    	$talks = CareerTalk::paginate(10);
    	return view('student.career_talk')->with('talks', $talks);
    }

    //获取公司动态列表
    public function get_dynamics_list()
    {
        
    }
}
