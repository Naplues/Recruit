<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemEducation extends Model
{
    public static function store($rid, $startdate, $enddate, $school, $degree, $qualification, $type, $campus, $major, $class, $rank)
    {
        $item = Resume::find($rid)->educations;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度

    	$education = new  ItemEducation;
    	$education->rid           = $rid;
    	$education->startdate     = $startdate;
    	$education->enddate       = $enddate;
    	$education->school        = $school;
    	$education->degree        = $degree;
    	$education->qualification = $qualification;
    	$education->type          = $type;
    	$education->campus        = $campus;
    	$education->major         = $major;
    	$education->class         = $class;
    	$education->rank          = $rank;

    	$education->save();
    }

    //新加一条记录
    public static function newRecord(Request $request)
    {
        ItemEducation::store(
            $request->rid,
            $request->startdate,
            $request->enddate,
            $request->school,
            $request->degree,
            $request->qualification,
            $request->type,
            $request->campus,
            $request->major,
            $request->class,
            $request->rank
            );
    }
    //更细一条记录,属性：10
    public static function updateRecord(Request $request)
    {
        $education = ItemEducation::find($request->id);

        $education->startdate     = $request->startdate;
        $education->enddate       = $request->enddate;
        $education->school        = $request->school;
        $education->degree        = $request->degree;
        $education->qualification = $request->qualification;
        $education->type          = $request->type;
        $education->campus        = $request->campus;
        $education->major         = $request->major;
        $education->class         = $request->class;
        $education->rank          = $request->rank;

        $education->save();
    }
}
