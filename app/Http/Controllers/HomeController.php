<?php

namespace App\Http\Controllers;

use Auth;
use App\User as User;

use App\Models\Resume as Resume;

use App\Models\ItemAttach as ItemAttach;

use App\Models\Position as Position;
use App\Models\Company as Company;

use App\Models\Follow as Follow;
use App\Models\Collection as Collection;

use App\Models\Information as Information;

use App\Models\CareerTalk as CareerTalk;
use App\Models\JobFair as JobFair;
use App\Models\Deliver as Deliver;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    //Ajax
    public function validate_type(Request $request)
    {
        $user = User::where('email', $request->email)->get()[0];
        $data = array('type' => $user->usertype);
        return $data;
    }

    public function profile_avatar()
    {
        return view('student.profile_show');
    }
    //上传头像
    public function profile_avatar_post(Request $request)
    {
        
        $path = Auth::user()->avatar;
        Storage::delete($path);                             //删除旧文件
         //保存头像，存放地址为/uploads/images/目录下
        $path = $request->file('avatar')->store('/images'); 

        $user = Auth::user();          //更新数据库信息
        $user->avatar = $path;
        $user->save();
        return redirect()->intended('home');   //返回用户主页
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    //查看职位信息页面
    public function position_show($pid)
    {
        $position = Position::where('id', $pid)->get()[0];
        $resumes = Resume::where('uid', Auth::user()->id)->get();
        
        $isCollect = Collection::isExist($pid);

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

    //检索公司
    public function company_search(Request $request)
    {
        $companies = Company::where('name', 'like', '%' . $request->name . '%')->where('auth', 1)->paginate(15);
        //分页链接参数设置
        $companies->appends([
            'name' => $request->name,
            'auth' => 1
            ]);
        return view('student.company_info_list')
                ->with('companies', $companies);
    }
    //详细检索公司
    public function company_search_details(Request $request)
    {
        $companies = Company::search_details($request);
        return view('student.company_info_list')
                ->with('companies', $companies);
    }

    //关注该公司  ,公司ID ,AJAX
    public function follow($cid)  //参数为公司的ID
    {
        $senderId = Auth::user()->id;                   //发送者ID
        $receiverId = Company::find($cid)->owner->id;   //接收者ID

        $content = '<img src="/uploads/' . Auth::user()->avatar . ' " alt="..." width="25" height="25" class="img-rounded"> ';
        $content .= Auth::user()->name . '关注了贵公司';

        if(Follow::isExist($senderId, $cid))
            return 'not add';
        Follow::store($senderId, $cid);                        //存储一条关注信息
        $follow_number = Company::followUp($cid);   //计数+1

        Information::newInfo($senderId, $receiverId, $content);           //生成新消息

        $data = array('follow_number' => $follow_number);
        return $data;    //将数据打包发送给前端
    }


    //收藏该职位， 职位ID，AJAX
    public function collection($pid)
    {
        $senderId = Auth::user()->id;                                     //发送者ID
        $receiverId = Position::find($pid)->company->owner->id;           //接收者ID

        $position = Position::find($pid);
        $cid = $position->company->id;

        $content = '<img src="/uploads/' . Auth::user()->avatar . ' " alt="..." width="25" height="25" class="img-rounded"> ';
        $content .= Auth::user()->name . '收藏了贵公司' . $position->name . '的职位';
        
        if(Collection::isExist($senderId, $pid))
            return 'not add';
        Collection::store($senderId, $pid);                   //存储一条收藏信息
        $collection_number = Position::collectionUp($pid);    //计数+1

        Information::newInfo($senderId, $receiverId, $content);           //生成新消息

        $data = array('collection_number' => $collection_number);

        return $data;
    }

    //学生用户取消关注
    public function unfollow($cid)
    {
        $senderId = Auth::user()->id;
        $receiverId = Company::find($cid)->owner->id;   //接收者ID

        $content = '<img src="/uploads/' . Auth::user()->avatar . ' " alt="..." width="25" height="25" class="img-rounded"> ';
        $content .= Auth::user()->name . '取消了关注';

        if(Follow::isExist($senderId, $cid))
        {
            Follow::remove($senderId,$cid);               //移除关注,删除一条关注信息
            $follow_number = Company::followDown($cid);   //计数-1

            Information::newInfo($senderId, $receiverId, $content);           //生成新消息
            
            $data = array('follow_number' => $follow_number);
            return $data;
        }
    }    
    //取消收藏
    public function uncollection($pid)
    {

        $senderId = Auth::user()->id;                                     //发送者ID
        $receiverId = Position::find($pid)->company->owner->id;           //接收者ID

        $position = Position::find($pid);
        $cid = $position->company->id;

        $content = '<img src="/uploads/' . Auth::user()->avatar . ' " alt="..." width="25" height="25" class="img-rounded"> ';
        $content .= Auth::user()->name . '取消了对贵公司' . $position->name . '的职位的收藏';

        if(Collection::isExist($senderId, $pid))
        {
            Collection::remove($senderId,$pid);                    //移除收藏,删除一条收藏信息
            $collection_number = Position::CollectionDown($pid);   //计数-1

            Information::newInfo($senderId, $receiverId, $content);           //生成新消息

            $data = array('collection_number' => $collection_number);
            return $data;
        }
    }



    //进入招聘会列表页面
    public function job_fair_list()
    {
        $lists = JobFair::all();
        return view('student.job_fair_list')
                ->with('lists', $lists);
    }




    ///////////////////////////////////////////////////////////////////////////////////////////////
    //进入宣讲会页面，时间排序
    public function career_talk()
    {
        $talks = CareerTalk::orderBy('day', 'DESC')->paginate(15);
        return view('student.career_talk')
            ->with('talks', $talks);
    }

    //进入宣讲会列表
    public function career_talk_list(Request $request)
    {
        $companies = Company::where('name', 'like', '%' . $request->company . '%')->paginate(10);
        
        return view('student.career_talk')->with('companies', $companies);
    }

    //显示某一宣讲会信息
    public function career_talk_show($id)
    {
        $talk = CareerTalk::find($id);
        return view('student.career_talk_show')->with('talk', $talk);
    }
    //宣讲会详细查询
    public function career_talk_search_details(Request $request)
    {
        //$companies = Company::getCompanies($request);

        //return view('student.career_talk_list')->with('companies', $companies);
        $talks = CareerTalk::getSelected($request);
        return view('student.career_talk_list')->with('talks', $talks);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function downloads_attach($id)
    {
        $path = ItemAttach::find($id)->address;
        $path = realpath(base_path('public/uploads')). '\\' . $path;
        return response()->download($path);
    }

}
