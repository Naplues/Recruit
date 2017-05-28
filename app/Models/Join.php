<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    //
	//一条入驻信息属于一个招聘会
    public function job_fair()
    {
    	return $this->belongsTo('App\Models\JobFair', 'jid', 'id');
    }
    //一条入驻信息属于一家公司
    public function company()
    {
    	return $this->belongsTo('App\Models\Company', 'cid', 'id');
    }

    //添加一条记录
    public static function newRecord($jid, $cid)
    {
        $join = new Join;

        $join->jid = $jid;
        $join->cid = $cid;
        $join->is_read = 0;

        $join->save();
    }

    public static function isExist($jid, $cid)
    {
        $join = Join::where('jid', $jid)->where('cid', $cid)->get();
        echo $jid . $cid;
        printf($join);
        if( count($join) != 0 )
            return true;
        return false;
    }
}
