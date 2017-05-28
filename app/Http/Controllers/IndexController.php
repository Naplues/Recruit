<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dynamic as Dynamic;
use App\Models\Company as Company;
use App\Models\Position as Position;
use App\Models\JobFair as JobFair;
use App\Models\CareerTalk as CareerTalk;

//首页控制器,仅负责进入首页之后的查询工作
class IndexController extends Controller
{
	//默认方法
    public function index()
    {

    	$companies = Company::orderBy('focus', 'DESC')->take(10)->get();
    	$positions = Position::orderBy('post_number', 'DESC')->take(10)->get();
    	$job_fairs = JobFair::orderBy('time', 'DESC')->take(10)->get();
    	$career_talks = CareerTalk::orderBy('day', 'DESC')->take(10)->get();
        $dynamics = Dynamic::orderBy('created_at', 'DESC')->take(20)->get();

    	return view('welcome')
    		->with('companies', $companies)
    		->with('positions', $positions)
    		->with('job_fairs', $job_fairs)
    		->with('career_talks', $career_talks)
            ->with('dynamics', $dynamics);
    }
}
