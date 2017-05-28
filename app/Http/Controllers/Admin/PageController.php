<?php

namespace App\Http\Controllers\Admin;


use App\Models\JobFair as JobFair;
use App\Models\Company as Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //

	//进入招聘会公告页面
    public function job_fair_list()
    {
    	$job_fair_list = JobFair::all();
    	return view('admin.job_fair_list')->with('lists', $job_fair_list);
    }

    //进入招聘会详情页面
    public function job_fair_show($jid)
    {
    	$job_fair = JobFair::find($jid);
    	return view('admin.job_fair_show')->with('job_fair', $job_fair);
    }
    //进入发布招聘会页面
    public function job_fair_post()
    {
    	return view('admin.job_fair_post');
    }



    //进入校招单位列表页面
    public function company_list()
    {
        $companies = Company::paginate(10);
        return view('admin.company_list')->with('companies', $companies);
    }
    //显示未认证校招单位列表
    public function auth_company()
    {
        $companies = Company::where('auth', 0)->paginate(10);
        return view('admin.company_list')->with('companies', $companies);
    }
    //显示已经认证的公司列表
    public function authed_company()
    {
        $companies = Company::where('auth', 1)->paginate(10);
        return view('admin.company_list')->with('companies', $companies);
    }

    public function company_info_show($cid)
    {
        $company = Company::find($cid);
        return view('admin.company_info_show')->with('company_info', $company);
    }
    //通过认证
    public function auth_pass($cid)
    {
        Company::auth_pass($cid);    //通过认证
        return redirect()->intended('admin/company_info_show/' . $cid);
    }
}
