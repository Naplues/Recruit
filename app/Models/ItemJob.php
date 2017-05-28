<?php

namespace App\Models;

use App\Models\Resume as Resume;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemJob extends Model
{

    
    //每个求职意愿属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }


    //存储完成之后检查完整度
    public static function store($rid, $property, $city, $state, $salary, $arrival)
    {
    	$job = new ItemJob;
    	$job->rid = $rid;
    	$job->property = $property;
    	$job->city = $city;
    	$job->state = $state;
    	$job->salary = $salary;
    	$job->arrival = $arrival;

    	$job->save();

        Resume::completeUp($rid);   //提高完整度
    }

    //插入一条记录
    public static function newRecord(Request $request)
    {
        ItemJob::store(
            $request->rid,
            $request->property,
            $request->city,
            $request->state,
            $request->salary,
            $request->arrival
            );
    }

    //更新一条记录,属性：5
    public static function updateRecord(Request $request)
    {
        $job = ItemJob::find($request->id);
        $job->property = $request->property;
        $job->city     = $request->city;
        $job->state    = $request->state;
        $job->salary   = $request->salary;
        $job->arrival  = $request->arrival;

        $job->save();
    }
}
