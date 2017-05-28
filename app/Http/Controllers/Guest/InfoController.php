<?php

namespace App\Http\Controllers\Guest;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company as Company;
use App\Models\Position as Position;
use App\Models\JobFair as JobFair;
use App\Models\CareerTalk as CareerTalk;
use App\Models\Follow as Follow;
use App\Models\Resume as Resume;
use App\Models\Collection as Collection;
use App\Models\Deliver as Deliver;


/*
|--------------------------------------------------------------------------
| 游客访问控制器 ：页面控制器
|--------------------------------------------------------------------------
|
| 本控制器是游客访问控制器，供游客是使用
|
*/
class InfoController extends Controller
{
    //进入公司信息页面
    public function goto_company_info($cid)
    {
		if( is_null( Auth::user() ) )
			$uid = 0;   //uid不存在
		else
			$uid = Auth::user()->id;
		
		$company_info = Company::find($cid);
        $cid = $company_info->owner->id;
        $isFollow = Follow::isExist($uid, $cid);

        return view('student.company_info_show')
            ->with('company_info', $company_info)
            ->with('isFollow', $isFollow);
    }

    //进入职位信息页面
    public function goto_position_info($pid)
    {
		if( is_null( Auth::user() ) )
			$uid = 0;   //uid不存在
		else
			$uid = Auth::user()->id;

		$position = Position::find($pid);
        $resumes = Resume::where('uid', $uid)->get();
        
        $isCollect = Collection::isExist($uid, $pid);

        $has_deliver = 0;
        foreach($resumes as $resume)
        {
            $number = Deliver::where('pid', $pid)->where('rid', $resume->id)->get();
            if(count( $number) != 0)
                $has_deliver = 1;
        }
        
        return view('student.position_show')
            ->with('position', $position)
            ->with('resumes', $resumes)
            ->with('has_deliver', $has_deliver)
            ->with('isCollect', $isCollect);
    }

    //进入招聘会信息页
    public function goto_job_fair_info($jid)
    {
		$job_fair = JobFair::find($jid);
        return view('student.job_fair_show')->with('job_fair', $job_fair);
    }

    //进入宣讲会信息页面
    public function goto_career_talk_info($tid)
    {
    	$talk = CareerTalk::find($tid);
        return view('student.career_talk_show')->with('talk', $talk);
    }
}
