<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemSkill extends Model
{
    public static function store($rid, $type, $level)
    {
        $item = Resume::find($rid)->skills;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度

    	$skill = new ItemSkill;
    	$skill->rid = $rid;
    	$skill->type = $type;
    	$skill->level = $level;

    	$skill->save();
    }

    //插入一条记录
    public static function newRecord(Request $request)
    {
    	ItemSkill::store(
    		$request->rid,
    		$request->type,
    		$request->level
    		);
    }

    //更新一条记录，属性：2
    public static function updateRecord(Request $request)
    {
    	$skill = ItemSkill::find($request->id);

        $skill->type  = $request->type;
        $skill->level = $request->level;

        $skill->save();
    }
}
