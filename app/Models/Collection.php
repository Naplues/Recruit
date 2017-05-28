<?php

namespace App\Models;

use Auth;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| 收藏公司信息表
|--------------------------------------------------------------------------
|
| 本表描述宣讲会的相关信息
|
*/
class Collection extends Model
{

	public function position()
	{
		return $this->belongsTo('App\Models\Position', 'pid', 'id');
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'uid', 'id');
	}
    //职位收藏情况

	public static function isExist($uid, $pid)
	{
		
		$record = Collection::where('uid', $uid)->where('pid', $pid)->get();
		if(count($record) == 0)
			return false;
		return true;
	}

	//存储一条收藏信息
    public static function store($uid, $pid)
    {
        $record = new Collection;
        $record->uid = $uid;
        $record->pid = $pid;
        $record->is_read = 0;
        $record->save();
    }

    //移除一条收藏信息,uid和pid是键
    public static function remove($uid, $pid)
    {
		$record = Collection::where('uid', Auth::user()->id)
			->where('pid', $pid)->get()[0];
		$record->delete();   //删除
    }
}
