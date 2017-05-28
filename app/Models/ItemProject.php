<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemProject extends Model
{
    //存储
    public static function store($rid, $name, $startdate, $enddate, $content, $harvest)
    {
        $item = Resume::find($rid)->projects;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度

    	$project = new ItemProject;
    	$project->rid = $rid;
    	$project->name = $name;
    	$project->startdate = $startdate;
    	$project->enddate = $enddate;
    	$project->content = $content;
    	$project->harvest = $harvest;

    	$project->save();
    }

    //新加一条记录
    public static function newRecord(Request $request)
    {
        ItemProject::store(
            $request->rid,
            $request->name,
            $request->startdate,
            $request->enddate,
            $request->content,
            $request->harvest
            );
    }
    //更新一条记录，属性：5
    public static function updateRecord(Request $request)
    {
        $project = ItemProject::find($request->id);

        $project->name      = $request->name;
        $project->startdate = $request->startdate;
        $project->enddate   = $request->enddate;
        $project->content   = $request->content;
        $project->harvest   = $request->harvest;

        $project->save();
    }
}
