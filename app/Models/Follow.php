<?php

namespace App\Models;

use Auth;

use Illuminate\Database\Eloquent\Model;

use App\Models\Position as Position;


class Follow extends Model
{
	public function company()
	{
		return $this->belongsTo('App\Models\Company', 'cid', 'id');
	}
	public function user()
	{
		return $this->belongsTo('App\User', 'uid', 'id');
	}

    //
	public static function isExist($uid, $cid)
	{
		$record = Follow::where('uid', $uid)->where('cid', $cid)->get();
		if(count($record) == 0)
			return false;
		return true;
	}

	//存储一条关注信息
    public static function store($uid, $cid)
    {
        $record = new Follow;
        $record->uid = $uid;
        $record->cid = $cid;
        $record->is_read = 0;
        $record->save();

    }

    //移除一条关注信息,uid和cid是键
    public static function remove($uid, $cid)
    {
		$record = Follow::where('uid', Auth::user()->id)
			->where('cid', $cid)->get()[0];
		$record->delete();   //删除
    }
}
