<?php

namespace App\Http\Controllers\Company;

use Auth;

use App\Models\Dynamic as Dynamic;
use App\Models\Resume as Resume;
use App\Models\Company as Company;
use App\Models\Position as Position;

use App\Models\Information as Information;
use App\Models\Deliver as Deliver;

use App\Models\CareerTalk as CareerTalk;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function login()
    {
        return view('company.login');
    }
    public function register()
    {
        return view('company.register');
    }

    //公司主页，有一些信息检测
    public function index()
    {
        //公司未完成信息填写
        if(null == Auth::user()->company)
        {
            $cid = Company::init(Auth::user()->id);
        }
        else
            $cid = Auth::user()->company->id;
        $dynamics = Dynamic::where('cid', $cid)->orderBy('created_at', 'DESC')->take(5)->get();

        $infos = Information::checkNew();     //检测新消息
        $info_number = count($infos);         //多少条消息 

        $delivers = Deliver::checkDeliver();  //检查新的投递
        $deliver_number = 0;
        foreach ($delivers as $deliver)
        {
            $deliver_number += count($deliver);
        }
    	return view('company.index')
                ->with('infos', $infos)
                ->with('info_number', $info_number)
                ->with('deliver_number', $deliver_number)
                ->with('delivers', $delivers)
                ->with('dynamics', $dynamics);
    }


    /////////////////////////事件响应控制器//////////////////////////////////////
    //储存公司信息,并添加动态
    public function info_store(Request $request)
    {
        $path = $request->file('auth')->store('/auth_files');  //保存头像
        $request->auth_file_path = $path;

        Company::store($request);

        $company = Auth::user()->company;

        $content = '公司';
        $content .= '<b><a href="/guest/goto_company_info/' . $company->id . ' ">' . $company->name . '</a></b>';
        $content .= '更新了公司信息';
        Dynamic::newDynamic($company->id, $content);                 //添加新动态

        return redirect()->intended('company/info_show');            //重定向
    }

    //储存职位信息,并添加动态
    public function position_store(Request $request)
    {
        $position = Position::store($request);
        Company::positionUp(Auth::user()->company->id);     //发布职位数+1

        $company = Auth::user()->company;

        $content = '公司';
        $content .= '<b><a href="/guest/goto_company_info/' . $company->id . '">' . $company->name . '</a></b>';
        $content .= '发布新职位';
        $content .= '<b><a href="/guest/goto_position_info/' . $position->id . '">' . $position->name . '</a></b>';
        Dynamic::newDynamic($company->id, $content);                 //添加新动态

        return redirect()->intended('company/position_show/' . $position->id);   //重定向
    }

    //存储宣讲会信息，并添加动态
    public function career_talk_post(Request $request)
    {
        $talk = CareerTalk::newRecord($request);

        $company = Auth::user()->company;

        $content = '公司';
        $content .= '<b><a href="/guest/goto_company_info/' . $company->id . '">' . $company->name . '</a></b>';
        $content .= '有新的宣讲行程';
        $content .= '<b><a href="/guest/goto_career_talk_info/' . $talk->id . '">' . $talk->college . '</a></b>';
        Dynamic::newDynamic($company->id, $content);     

        return redirect()->intended('/company/career_talk');
    }

    //上传头像
    public function profile_avatar_post(Request $request)
    {
        $path = Auth::user()->avatar;
        Storage::delete($path);   //删除旧文件
        $path = $request->file('avatar')->store('/images');  //保存头像

        $user = Auth::user();
        $user->avatar = $path;
        $user->save();
        return redirect()->intended('/company/index');
    }
    //简历搜索
    public function resume_search(Request $request)
    {
        $resumes = Resume::where('name', 'like', '%' . $request->name . '%')
            ->where('is_post', 1)->paginate(10);
        return view('company.resume_search')->with('resumes', $resumes);
    }

    //发送接收简历通知
    public function accept_resume(Request $request)
    {
        $rid = $request->rid;
        $receiver = $request->uid;
        $sender = Auth::user()->id;

        $content = '<img src="/uploads/' . Auth::user()->avatar . ' " alt="..." width="25" height="25" class="img-rounded"> ';

        $content .= $request->details;
        Information::newInfo($sender, $receiver, $content);           //生成消息

        $resume = Resume::find($rid);
        return view('company.resume_show')->with('resume', $resume);
    }
    //发送接收选中简历通知
    public function accept_selected_resume(Request $request)
    {
        
        $uids = $request->uids;
        $dids = $request->dids;
        $details = $request->details;
        $sender = Auth::user()->id;
        foreach( $uids as $uid )
        {
            $receiver = $uid;
            $content = '<img src="/uploads/' . Auth::user()->avatar . 
                ' " alt="..." width="25" height="25" class="img-rounded"> ';
            $content .= $details;
            Information::newInfo($sender, $receiver, $content);    //生成消息
        }
        //标记投递记录为已读
        foreach($dids as $did)
        {
            $deliver = Deliver::find($did);
            $deliver->is_read = 1;
            $deliver->save();
        }
    }

    //读取某一未读消息
    public function get_one_info($id)
    {
        $infos = Information::where('id', $id)->get();
        return view('company.infos.infos_list')
            ->with('infos', $infos)
            ->with('one_record', 'one_record');
    }

    //获取未读消息
    public function get_unread_info_list()
    {
        $infos = Information::get_unread_info_list();
        return view('company.infos.infos_list')->with('infos', $infos);
    }
}
