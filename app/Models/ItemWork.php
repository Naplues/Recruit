<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemWork extends Model
{
    public static function store($rid, $startdate, $enddate, $company, $position, $content, $harvest)
    {
        $item = Resume::find($rid)->works;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度

    	$work = new ItemWork;
    	$work->rid = $rid;
    	$work->startdate = $startdate;
    	$work->enddate = $enddate;
    	$work->company = $company;
    	$work->position = $position;
    	$work->content = $content;
    	$work->harvest = $harvest;

    	$work->save();
    }

    //新加一条记录
    public static function newRecord(Request $request)
    {
        ItemWork::store(
            $request->rid,
            $request->startdate,
            $request->enddate,
            $request->company,
            $request->position,
            $request->content,
            $request->harvest
            );
    }

    //更新一条记录,属性：6
    public static function updateRecord(Request $request)
    {
        $work = ItemWork::find($request->id);

        $work->startdate = $request->startdate;
        $work->enddate   = $request->enddate;
        $work->company   = $request->company;
        $work->position  = $request->position;
        $work->content   = $request->content;
        $work->harvest   = $request->harvest;

        $work->save();
    }

}
