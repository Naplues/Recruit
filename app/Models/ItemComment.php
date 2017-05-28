<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemComment extends Model
{
	//查找指定数据


    //每个评论属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }

	//存储数据记录之后检查完整度
    public static function store($rid, $details)
    {

    	$comment = new ItemComment;
    
    	$comment->rid = $rid;
    	$comment->details = $details;

    	$comment->save();

        Resume::completeUp($rid);
    }

    //插入一条记录
    public static function newRecord(Request $request)
    {
        ItemComment::store(
            $request->rid,
            $request->details
            );
    }
    //更新一条记录
    public static function updateRecord(Request $request)
    {
        $comment = ItemComment::find($request->id);

        $comment->details = $request->details;

        $comment->save();
    }
}
