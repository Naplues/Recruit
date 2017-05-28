<?php

namespace App\Models;

use Auth;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class JobFair extends Model
{
    //一场招聘会会有多个入驻信息
    public function joins()
    {
        return $this->hasMany('App\Models\Join', 'jid', 'id');
    }

    public static function store(Request $request)
    {
    	$record = new JobFair;
    	$record->aid = Auth::user()->id;
    	$record->name = $request->name;
    	$record->time = $request->time;
    	$record->host_address = $request->host_address;
    	$record->total_number = $request->total_number;
    	$record->used_number = 0;
    	$record->details = $request->details;

    	$record->save();
    	return $record->id;
    }

    public static function usedNumberUp($jid)
    {
        $job_fair = JobFair::find($jid);
        $job_fair->used_number += 1;
        $job_fair->save();
    }
}
