<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //消息模型表

	//生成新消息，发送者，接受者，消息内容
    public static function newInfo($sender, $receiver, $content)
    {
    	$info = new Information;
    	$info->sender = $sender;
    	$info->receiver = $receiver;
    	$info->content = $content;
        $info->is_read = 0;   //未读
    	$info->save();
    }

    //用户检测新消息，未读的消息
    public static function checkNew($number = 5)
    {
        $rid = Auth::user()->id;    //获取接收者id
        $infos = Information::where('receiver', $rid)->where('is_read', 0)->orderBy('created_at', 'DESC')->take($number)->get();    
        return $infos;
    }

    public static function get_unread_info_list()
    {
        $rid = Auth::user()->id;    //获取接收者id
        $infos = Information::where('receiver', $rid)->where('is_read', 0)->orderBy('created_at', 'DESC')->paginate(15);    
        return $infos;
    }
}
