<?php

namespace App\Http\Controllers\Student;

use Auth;

use App\Models\Resume as Resume;
use App\Models\Deliver as Deliver;
use App\Models\Follow as Follow;
use App\Models\Collection as Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//消息相关控制器
class InfoController extends Controller
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
    
    //返回消息列表页面
    //获取投递列表
    public function deliver_list()
    {
    	$uid = Auth::user()->id;
    	$resumes = Resume::where('uid', $uid)->get();

    	$delivers= array();
    	foreach( $resumes as $resume )
    		$delivers[] = Deliver::where('rid', $resume->id)->get();

    	return view('student.infos.deliver_list')
    		->with('delivers', $delivers);
    }
    //获取关注列表
    public function follow_list()
    {
    	$uid = Auth::user()->id;
    	$follows = Follow::where('uid', $uid)->get();
    	return view('student.infos.follow_list')
    		->with('follows', $follows);
    }
    //获取收藏列表
    public function collect_list()
	{
    	$uid = Auth::user()->id;
    	$collects = Collection::where('uid', $uid)->get();
    	return view('student.infos.collect_list')
    		->with('collects', $collects);
	}
    //获取账户资料
    public function profile_details()
    {
        $uid = Auth::user()->id;
        $collects = Collection::where('uid', $uid)->get();
        $follows = Follow::where('uid', $uid)->get();

        $resumes = Resume::where('uid', $uid)->get();

        $delivers= array();
        foreach( $resumes as $resume )
            $delivers[] = Deliver::where('rid', $resume->id)->get();
        return view('student.infos.collect_list')
            ->with('collects', $collects)
            ->with('follows', $follows)
            ->with('delivers', $delivers);
    }
}
