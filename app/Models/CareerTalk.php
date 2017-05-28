<?php

namespace App\Models;

use DB;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| 宣讲会信息表
|--------------------------------------------------------------------------
|
| 本表描述宣讲会的相关信息
|
*/
class CareerTalk extends Model
{
    
    public function company()
    {
    	return $this->belongsTo('App\Models\Company', 'cid', 'id');
    }
    
    //生成新的宣讲会信息
    public static function newRecord(Request $request)
    {
    	$talk = new CareerTalk;

    	$talk->cid = Auth::user()->company->id;
    	$talk->day = $request->day;             //举办日期
    	$talk->city = $request->city;           //城市
    	$talk->college = $request->college;     //大学
    	$talk->address = $request->address;     //详细地址
    	$talk->details = $request->details;     //详细

    	$talk->save();
        return $talk;
    }

    
    //获取选择的
    public static function getSelected(Request $request)
    {
        $city = $request->city;
        $day = $request->day;
        if($day == null)
        {
            $now = time();
            $day = date("Y-m-d", $now);
        }
        $college = $request->college;

        $talks = CareerTalk::where('day', '<=', $day)
            ->where('city', 'like', '%' . $city . '%')
            ->where('college', 'like', '%' . $college . '%')
            ->orderBy('day', 'DESC')
            ->paginate(10);

        return $talks;
    }
}
