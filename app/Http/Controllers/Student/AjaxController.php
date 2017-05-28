<?php

namespace App\Http\Controllers\Student;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\Information as Information;

//处理Ajax请求
class AjaxController extends Controller
{
	//将信息标记为已读
    public function mark_info_read($id)
    {
    	$info = Information::find($id);
    	$info->is_read = 1;
    	$info->save();
    	return;
    }
    //获取新消息
    public function get_new_infos($cid)
    {
    	$infos = Information::checkNew();     //检测新消息
    	return $infos;
    }
    //加载消息
    public function load_infos($mark)
    {
        //$mark = $request->mark;
        if($mark == 'all')
            $infos = Information::where('receiver', Auth::user()->id)
                ->orderBy('created_at', 'DESC')->paginate(15);
        else if($mark == 'is_read')
            $infos = Information::where('receiver', Auth::user()->id)
                ->where('is_read', 1)->orderBy('created_at', 'DESC')->paginate(15);
        else
            $infos = Information::where('receiver', Auth::user()->id)
                ->where('is_read', 0)->orderBy('created_at', 'DESC')->paginate(15); 

        return view('student.infos.infos_list')->with('infos', $infos);
    }

    //检测密码正误
    public function check_pwd(Request $request)
    {
        $email = Auth::user()->email;
        $pwd = $request->pwd;

        if( Auth::attempt( [ 'email' => $email, 'password' => $pwd ] ) )
            $message = 'right';
        else
            $message = 'wrong';
        return $message;
    }
    //修改密码
    public function reset_password(Request $request)
    {
        $password = $request->pwd;
        $user = Auth::user();
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
        return;
    }
}
