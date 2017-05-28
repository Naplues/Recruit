<?php

namespace App\Http\Controllers\Student;

use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Company as Company;
use App\Models\Dynamic as Dynamic;
use App\Models\Join as Join;
use App\Models\Follow as Follow;
use App\Models\Deliver as Deliver;
use App\Models\Collection as Collection;
use App\Models\Information as Information;
use App\Models\Resume as Resume;



class IndexController extends Controller
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

    //进入学生主页,显示相关信息
    public function index()
    {
        $user = Auth::user();

        //消息查询
        $infos = Information::checkNew();     //检测新消息
        $info_number = count($infos);         //多少条消息

        //动态查询
        $follows = Follow::where('uid', $user->id)->get();
        $dynamics = array();   //空集
        foreach( $follows as $follow )
            $dynamics[] = Dynamic::where('cid', $follow->company->id)->get();
        
        //简历查询
        $resumes = Resume::where('complete', '<', 100)->where('uid', $user->id)->take(3)->get();

        return view('home')
            ->with('infos', $infos)
            ->with('info_number', $info_number)
            ->with('dynamics', $dynamics)
            ->with('resumes', $resumes);
    }

    //获取未读消息
    public function get_unread_info_list()
    {
        $infos = Information::get_unread_info_list();
        //$infos = Information::orderBy('created_at', 'DESC')->paginate(15);
        return view('student.infos.infos_list')->with('infos', $infos);
    }
    //读取某一未读消息
    public function get_one_info($id)
    {
        $infos = Information::where('id', $id)->get();
        return view('student.infos.infos_list')
            ->with('infos', $infos)
            ->with('one_record', 'one_record');
    }
    //获取公司动态
    public function get_dynamics_list($cid)
    {
        if( $cid == 'all' )
            $dynamics = Dynamic::orderBy('created_at', 'DESC')->paginate(15);
        else
            $dynamics = Dynamic::where('cid', $cid)->orderBy('created_at', 'DESC')->paginate(15);
        return view('student.dynamics_list')->with('dynamics', $dynamics);
    }
}
