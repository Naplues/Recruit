<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemAward extends Model
{

    //多个奖励信息属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }






    public static function store($rid, $name, $level, $time, $details)
    {
        $item = Resume::find($rid)->awards;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度

    	$award = new ItemAward;

    	$award->rid     = $rid;
    	$award->name    = $name;
    	$award->level   = $level;
    	$award->time    = $time;
    	$award->details = $details;

    	$award->save();
    	
    }


    //新加一条记录
    public static function newRecord(Request $request)
    {
        ItemAward::store(
            $request->rid,
            $request->name,
            $request->level,
            $request->time,
            $request->details
            );
    }

    //更新一条记录，属性：4
    public static function updateRecord(Request $request)
    {
        $award = ItemAward::find($request->id);

        $award->name    = $request->name;
        $award->level   = $request->level;
        $award->time    = $request->time;
        $award->details = $request->details;

        $award->save();
    }
}
