<?php

namespace App\Http\Controllers\Student;

use App\Models\Company as Company;
use App\Models\Position as Position;
use App\Models\JobFair as JobFair;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//宣讲，职位控制器
class JobController extends Controller
{


	//宣讲会首页
    public function career_talk()
    {
    	return view('student.career_talk');
    }
    //宣讲会列表
    public function career_talk_list()
    {
    	return view('student.career_talk_list');
    }


    //职位列表,返回学生搜索职位页面
    public function position_search(Request $request)
    {
        $position_name = $request->position_name;
        $name = '%' . $position_name . '%';
        $positions = Position::where('name', 'like', $name)->paginate(10);
        //分页链接参数设置
        $positions->appends(['position_name' => $position_name]);
    	return view('student.position_list')->with('positions', $positions);
    }
    //详细检索职位
    public function position_search_details(Request $request)
    {
        $positions = Position::search_details($request);
        return view('student.position_list')
                ->with('positions', $positions);
    }

    //分类检索职位
    public function position_search_type($type)
    {
        if($type == 0)
        {
            $positions = Position::where('type', 0)->paginate();
            $positions->appends([ 'type' => 0 ]);
            return view('student.position_full_job')->with('positions', $positions);
        }
        if($type == 1)
        {
            $positions = Position::where('type', 1)->paginate();
            $positions->appends([ 'type' => 1 ]);
            return view('student.position_part_job')->with('positions', $positions);
        }
        if($type == 2)
        {
            $positions = Position::where('type', 2)->paginate();
            $positions->appends([ 'type' => 2 ]);
            return view('student.position_study_job')->with('positions', $positions);
        }
    }
    //职位列表
    public function position_list()
    {
    	return view('student.position_list');
    }
    //查看该公司的其它职位
    public function position_other_list($pid)
    {
        $cid = Position::find($pid)->cid;
        $positions = Position::where('cid', $cid)->where('id', '!=', $pid)->get();
        return view('student.position_list')->with('positions', $positions);
    }

    //全职
    public function position_full_job()
    {
    	return view('student.position_full_job');
    }
    //兼职
    public function position_part_job()
    {
    	return view('student.position_part_job');
    }
    //实习
    public function position_study_job()
    {
    	return view('student.position_study_job');
    }
}
