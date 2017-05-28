<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemBasic extends Model
{
    //

    //每个基本信息属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }


    public static function store($rid, $name, $gender, $height, $weight, $birthday, $idnumber, $nation, $health, $status, $marriage, $origin, $permanen, $photo)
    {

    	$basic = new ItemBasic;

    	$basic->rid      = $rid;
    	$basic->name     = $name;
    	$basic->gender   = $gender;
    	$basic->height   = $height;
    	$basic->weight   = $weight;
    	$basic->birthday = $birthday;
    	$basic->idnumber = $idnumber;
    	$basic->nation   = $nation;
    	$basic->health   = $health;
    	$basic->status   = $status;
    	$basic->marriage = $marriage;
    	$basic->origin   = $origin;
    	$basic->permanen = $permanen;
    	$basic->photo    = $photo;

    	$basic->save();

        Resume::completeUp($rid);
        return $basic;
    }

    //添加一条记录
    public static function newRecord(Request $request)
    {
        ItemBasic::store(
            $request->rid, 
            $request->name, 
            $request->gender, 
            $request->height, 
            $request->weight, 
            $request->birthday, 
            $request->idnumber, 
            $request->nation, 
            $request->health, 
            $request->status, 
            $request->marriage, 
            $request->origin, 
            $request->permanen, 
            $request->photo
            );    //存储并返回
    }

    //更新一条记录，属性：13
    public static function updateRecord(Request $request)
    {
        $basic = ItemBasic::find($request->id);

        $basic->name     = $request->name;
        $basic->gender   = $request->gender;
        $basic->height   = $request->height;
        $basic->weight   = $request->weight;
        $basic->birthday = $request->birthday;
        $basic->idnumber = $request->idnumber;
        $basic->nation   = $request->nation;
        $basic->health   = $request->health;
        $basic->status   = $request->status;
        $basic->marriage = $request->marriage;
        $basic->origin   = $request->origin;
        $basic->permanen = $request->permanen;
        $basic->photo    = $request->photo;

        $basic->save();
    }
}
