<?php

namespace App\Http\Controllers\Admin;

use App\User as User;

use App\Models\Company as Company;
use App\Models\Position as Position;
use App\Models\JobFair as JobFair;
use App\Models\CareerTalk as CareerTalk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //进入主页
    public function index()
    {

        $unauth = Company::where('auth', 0)->get();   //未认证公司

        $company_number = Company::count();
        $position_number = Position::count();
        $user_number = User::where('usertype', 1)->count();
        $career_talk_number = CareerTalk::count();
        $job_fair_number = JobFair::count();

    	return view('admin.index')->with('unauth', $unauth)
            ->with('company_number', $company_number)
            ->with('position_number', $position_number)
            ->with('user_number', $user_number)
            ->with('career_talk_number', $career_talk_number)
            ->with('job_fair_number', $job_fair_number);
    }


    public function login()
    {
    	return view('admin.login');
    }
    public function register()
    {
    	return view('admin.register');
    }

    //存储招聘会信息
    public function job_fair_post(Request $request)
    {
        $jid = JobFair::store($request);
        return redirect()->intended('admin/job_fair_show/' . $jid);
    }


    public function downloads_auth($cid)
    {
        $auth_file_path = Company::find($cid)->auth_file_path;    //文件存储路径
        $path = realpath(base_path('public/uploads')). '\\' . $auth_file_path;
        return response()->download($path);
    }
}
