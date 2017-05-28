<?php

namespace App\Http\Controllers\Company;

use Auth;

use App\Models\Resume as Resume;
use App\Models\Deliver as Deliver;
use App\Models\Company as Company;
use App\Models\Position as Position; 

use App\Models\Follow as Follow;

use App\Models\Collection as Collection;
use App\Models\Information as Information;

use App\Models\JobFair as JobFair;
use App\Models\CareerTalk as CareerTalk;
use App\Models\Join as Join;

use App\Models\Dynamic as Dynamic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//页面跳转控制器
class PageController extends Controller
{
    
    //////////////////////////职位信息页面路由/////////////////////////////////////
    //添加职位信息页面
    public function position_add()
    {
    	return view('company.position_add');
    }
    //查看职位信息页面
    public function position_show($pid)
    {
        $position = Position::where('id', $pid)->get()[0];
    	return view('company.position_show')->with('position', $position);
    }
    //编辑职位信息页面
    public function position_edit()
    {
    	return view('company.position_edit');
    }
    //显示职位列表
    public function position_list()
    {
        //公司未完成信息填写
        if(null == Auth::user()->company)
            return view('company.position_list')->with('not_complete', 'not_complete');

        $positions = Position::where('cid', Auth::user()->company->id )->get();
    	return view('company.position_list')->with('positions', $positions);
    }


    /////////////////////////公司信息页面路由////////////////////////////////////////
    //编辑公司信息页面
    public function info_edit()
    {
        $company_info = Company::where('uid', Auth::user()->id)->get();
        if( count($company_info) == 0)
            return view('company.info_edit');
        else
            return view('company.info_edit')
                ->with('company_info', $company_info[0]);
    }
    //查看公司信息页面
    public function info_show()
    {
        $company_info = Company::where('uid', Auth::user()->id)->get();
        if( count($company_info) == 0)
            return view('company.info_show');
        else
            return view('company.info_show')
                ->with('company_info', $company_info[0]);
    }
    //查看新消息
    public function new_messages()
    {
        $infos = Information::checkNew();     //检测新消息

        return view('company.new_messages')->with('infos', $infos);
    }

    //进入简历接收页面
    public function resume_deliver()
    {
        $delivers = Deliver::checkDeliver();              //检测新的简历投递
        return view('company.deliver_list')->with('delivers', $delivers);
    }


    ///////////////////////职位收藏页面路由 /////////////////////////////
    //查看收藏列表
    public function collect_list($cid)
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
    }

    //查看关注列表
    public function follow_list($cid)
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
    }
    //查看投递列表
    public function deliver_list()
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
        $positions = Auth::user()->company->positions;
        $deliver = array();
        foreach( $positions as $p )
        {
            $deliver[] = Deliver::where('pid', $p->id)->get();
        }
        
        return view('company.deliver_list')->with('delivers', $deliver);
    }
    //查看投递内容
    public function deliver_show($cid, $rid)
    {

    }

    //查看应聘者的简历
    public function resume_show($pid, $rid)
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
        $resume = Resume::find($rid);
        Deliver::markRead($pid, $rid);    //标记为已读
        $position = Position::where('id', $pid)->get()[0];
        $company = $position->company;
        $content = $company->name . '已经查看了你的简历' . $resume->name;

        Information::newInfo($company->id, $resume->owner->id, $content);              //生成一条消息
        
        return view('company.resume_show')->with('resume', $resume);
    }
    //
    //人才库中查看
    public function resume_show_in_lib($rid)
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
        $resume = Resume::find($rid);
        return view('company.resume_show')->with('resume', $resume);
    }

    //进入搜索简历页面
    public function resume_search()
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
        $resumes = Resume::where('is_post', 1)->paginate(10);
        return view('company.resume_search')
            ->with('resumes', $resumes);
    }

    //宣讲页面
    public function career_talk()
    {
        if(null == Auth::user()->company)
            return view('company/info_edit')->with('error', '请先完善公司信息，然后开始使用平台');
        $talks = CareerTalk::where('cid', Auth::user()->company->id )->get();
        return view('company.career_talk')->with('talks', $talks);
    }
    //宣讲会详情
    public function career_talk_show($id)
    {
        $talk = CareerTalk::find($id);
        return view('company.career_talk_show')->with('talk', $talk);
    }

    //进入保存头像页面
    public function profile_avatar()
    {
        return view('company.profile_show');
    }

    //进入招聘会列表
    public function job_fair_list()
    {
        $job_fairs = JobFair::paginate(15);
        return view('company.job_fair_list')->with('job_fairs', $job_fairs);
    }
    //进入招聘会详情页面
    public function job_fair_show($id)
    {
        $job_fair = JobFair::find($id);
        return view('company.job_fair_show')->with('job_fair', $job_fair);
    }
    //入驻宣讲会
    public function join_job_fair($jid)
    {
        $cid = Auth::user()->company->id;
        if(!Join::isExist($jid, $cid))
        {
            JobFair::usedNumberUp($jid);      //展位使用数目增加    
            Join::newRecord($jid, $cid);     //加入一条入驻信息
        }
        $job_fair = JobFair::find($jid);

        return view('company.job_fair_show')->with('job_fair', $job_fair)->with('joined','已参加');
    }

    //进入资料页面
    public function profile_details()
    {
        $company = Auth::user()->company;     //公司
        $cid = $company->id;                  //公司ID
        $uid = $cid;    //用户

        //收藏职位信息
        foreach( $company->positions as $position )
            $collects[] = Collection::where('pid', $position->id)->get();
        //关注信息
        $follows = Follow::where('cid', $cid)->get();
        //投递记录
        foreach( $company->positions as $position )
            $delivers[] = Deliver::where('pid', $position->id)->get();


        return view('company.infos.collect_list')
            ->with('collects', $collects)
            ->with('follows', $follows)
            ->with('delivers', $delivers);
    }

    //进入公司动态列表
    public function get_dynamics_list($cid)
    {
        $dynamics = Dynamic::where('cid', $cid )->paginate();
        $dynamics->appends([ 'cid' => $cid ]);
        return view('company.dynamics_list')->with('dynamics', $dynamics);
    }
}
