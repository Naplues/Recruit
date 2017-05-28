<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ItemAttach extends Model
{

    //多个附件信息属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }
   
	//存储附件，逐个属性添加
    public static function store($rid, $name, $address)
    {
        $item = Resume::find($rid)->attachs;
        if(count($item) == 0)
            Resume::completeUp($rid);   //提高完整度
    	
        $attach = new ItemAttach;

    	$attach->rid     = $rid;
    	$attach->name    = $name;
    	$attach->address = $address;
    	
    	$attach->save();
    }

    //新加一条记录，通过表单添加
    public static function newRecord(Request $request)
    {
        ItemAttach::store(
            $request->rid,
            $request->name,
            $request->address
            );  
    }
    //更新一条记录,属性：2
    public static function updateRecord(Request $request)
    {
        $attach = ItemAttach::find($request->id);
        
        $attach->name    = $request->name;
        $attach->address = $request->address;

        $attach->save();
    }
}
