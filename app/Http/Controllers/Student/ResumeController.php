<?php

namespace App\Http\Controllers\Student;

use Auth;

use App\Models\ItemBasic as ItemBasic;
use App\Models\ItemEducation as ItemEducation;
use App\Models\ItemContact as ItemContact;
use App\Models\ItemProject as ItemProject;
use App\Models\ItemWork as ItemWork;
use App\Models\ItemAward as ItemAward;
use App\Models\ItemJob as ItemJob;
use App\Models\ItemSkill as ItemSkill;
use App\Models\Itemcomment as Itemcomment;
use App\Models\ItemAttach as ItemAttach;

use App\Models\Deliver as Deliver;
use App\Models\Resume as Resume;
use App\Models\Position as Position;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResumeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //创建一份简历
    public function resume_create(Request $request)
    {
        $resume = Resume::store($request);
        return redirect()->intended('student/resume_list/' . Auth::user()->id);   //转向简历列表
        
    }
    //获取简历列表
    public function resume_list($uid)
    {
        $lists = Resume::where('uid', $uid)->orderBy('created_at', 'DESC')->get();
        return view('student.resume.resume_list')->with('lists', $lists);
    }
    
    //查看简历页面
    public function resume_show($rid)
    {
        $resume = Resume::find($rid);
        return view('student.resume.resume_show')->with('resume', $resume);
    }

    //投递简历
    public function resume_deliver($pid, $rid)
    {
    	Deliver::store($pid, $rid);
    	Position::deliverUp($pid);
    	return redirect()->intended('/guest/goto_position_info/'. $pid);
    }

    //简历投放人才库
    public function resume_post($rid)
    {
        $resume = Resume::find($rid);
        $resume->is_post = 1;
        $resume->save();

        return redirect()->intended('/student/resume_list/'. Auth::user()->id);
    }

    //删除简历
    public function resume_delete($rid)
    {
        $resume = Resume::find($rid);
        $resume->delete();
        return redirect()->intended('/student/resume_list/' . Auth::user()->id);
    }
    //删除多份简历
    public function resume_delete_selected(Request $request)
    {
        $rids = $request->rids;
        foreach( $rids as $rid )
        {
            $resume = Resume::find($rid);
            $resume->delete();
        }
        return redirect()->intended('/student/resume_list/' . Auth::user()->id);
    }



    //进入编辑简历页面
    public function resume_basic_edit($rid, $method, $id)
    {
        $basic = ItemBasic::find($id);
        return view('student.resume.basic_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('basic', $basic);
    }

    public function resume_education_edit($rid, $method, $id)
    {
        $education = ItemEducation::find($id);
        return view('student.resume.education_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('education', $education);
    }

    public function resume_contact_edit($rid, $method, $id)
    {
        $contact = ItemContact::find($id);
        return view('student.resume.contact_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('contact', $contact);
    }

    public function resume_project_edit($rid, $method, $id)
    {
        $project = ItemProject::find($id);
        return view('student.resume.project_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('project', $project);
    }

    public function resume_work_edit($rid, $method, $id)
    {
        $work = ItemWork::find($id);
        return view('student.resume.work_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('work', $work);
    }

    public function resume_award_edit($rid, $method, $id)
    {
        $award = ItemAward::find($id);
        return view('student.resume.award_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('award', $award);
    }

    public function resume_job_edit($rid, $method, $id)
    {
        $job = ItemJob::find($id);
        return view('student.resume.job_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('job', $job);
    }  

    public function resume_skill_edit($rid, $method, $id)
    {
        $skill = ItemSkill::find($id);
        return view('student.resume.skill_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('skill', $skill);
    }

    public function resume_comment_edit($rid, $method, $id)
    {
        $comment = Itemcomment::find($id);
        return view('student.resume.comment_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('comment', $comment);
    }

    public function resume_attach_edit($rid, $method, $id)
    {
        $attach = ItemAttach::find($id);
        return view('student.resume.attach_edit')
                    ->with('rid', $rid)
                    ->with('method', $method)
                    ->with('id', $id)
                    ->with('attach', $attach);
    }


    //简历编辑提交方法
    public function post_resume_edit_basic(Request $request)
    {
        $path = $request->file('photo')->store('/images');
        $request->photo = $path;

        /*
        $path = realpath(base_path('public/images')).'\\I1HMF8zoXBf2vanQbfZS5sU5Zy1ldgWMsfulUEyC.jpeg';
        return response()->download(realpath(base_path('public/images')).'\\I1HMF8zoXBf2vanQbfZS5sU5Zy1ldgWMsfulUEyC.jpeg', 'Laravel学院.jpg');*/
        
        if($request->method == 'create')
            ItemBasic::newRecord($request);         //新加一条记录
        else
            ItemBasic::updateRecord($request);     //更新一条记录
        return redirect()->intended('student/resume_show/' . $request->rid);        
    }
    //教育经历
    public function post_resume_edit_education(Request $request)
    {
        if($request->method == 'create')
            ItemEducation::newRecord($request);         //新加一条记录
        else
            ItemEducation::updateRecord($request);     //更新一条记录
        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //联系方式
    public function post_resume_edit_contact(Request $request)
    {

        if($request->method == 'create')
            ItemContact::newRecord($request);         //新加一条记录
        else
            ItemContact::updateRecord($request);     //更新一条记录
        return redirect()->intended('student/resume_show/' . $request->rid);

    }
    //项目经验
    public function post_resume_edit_project(Request $request)
    {
        if($request->method == 'create')
            ItemProject::newRecord($request);         //新加一条记录
        else
            ItemProject::updateRecord($request);     //更新一条记录

        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //工作经验
    public function post_resume_edit_work(Request $request)
    {
        if($request->method == 'create')
            ItemWork::newRecord($request);         //新加一条记录
        else
            ItemWork::updateRecord($request);     //更新一条记录

        return redirect()->intended('student/resume_show/' . $request->rid);
        
    }
    //所获奖励
    public function post_resume_edit_award(Request $request)
    {
        if($request->method == 'create')
            ItemAward::newRecord($request);         //新加一条记录
        else
            ItemAward::updateRecord($request);     //更新一条记录

        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //求职意向
    public function post_resume_edit_job(Request $request)
    {
        if($request->method == 'create')
            ItemJob::newRecord($request);
        else
            ItemJob::updateRecord($request);
        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //技能
    public function post_resume_edit_skill(Request $request)
    {
        if($request->method == 'create')
            ItemSkill::newRecord($request);
        else
            ItemSkill::updateRecord($request);
        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //自我评价
    public function post_resume_edit_comment(Request $request)
    {   
        if($request->method == 'create')
            ItemComment::newRecord($request);
        else
            ItemComment::updateRecord($request);
        return redirect()->intended('student/resume_show/' . $request->rid);
    }
    //附件
    public function post_resume_edit_attach(Request $request)
    {

        $path = $request->file('attach')->store('/attaches');  //保存头像
        $request->name="附件";
        $request->address = $path;

        if($request->method == 'create')
            ItemAttach::newRecord($request);
        else
        {
            $path = ItemAttach::find($request->id)->address;
            Storage::delete($path);   //删除旧文件  
            ItemAttach::updateRecord($request);
        }
        return redirect()->intended('student/resume_show/' . $request->rid);
    }
}
