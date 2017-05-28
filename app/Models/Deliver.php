<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{

    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }

    public function position()  //本表中的属性， 其它表的属性
    {
        return $this->belongsTo('App\Models\Position', 'pid', 'id');
    }
    

    //简历投递关系表
    public static function checkDeliver()
    {
    	$company = Auth::user()->company;   //获取公司
        if(null == $company)
            $positions = array();
        else
    	   $positions = $company->positions;

    	$deliver = array();   //数组
    	foreach ($positions as $position)
    	{
    		$temp = Deliver::where('pid',$position->id)->where('is_read', 0)->get();
    		$deliver[] = $temp;
    	}
    	return $deliver;
    }


    //存储
    public static function store($pid, $rid)
    {
        $deliver = new Deliver;
        $deliver->pid = $pid;
        $deliver->rid = $rid;
        $deliver->is_read = 0;
        $deliver->save();
    }

    //标记为已读,待修改空的问题
    public static function markRead($pid, $rid)
    {
        $deliver = Deliver::where('pid', $pid)->where('rid', $rid)->get()[0];
        $deliver->is_read = 1;
        $deliver->save();
    }
}
