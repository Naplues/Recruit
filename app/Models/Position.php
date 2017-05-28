<?php

namespace App\Models;


use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class Position extends Model
{
    //
	//一个职位可以被多个用户收藏
	public function collected()
	{
		return $this->hasMany('App\Models\Collection', 'pid', 'id');
	}

	//一个职位属于一个公司
	public function company()
	{
		return $this->belongsTo('App\Models\Company', 'cid', 'id');
	}
    public function deliver()
    {
        return $this->hasMany('App\Models\Deliver', 'pid', 'id');
    }

    //增加计数收藏
    public static function collectionUp($pid)
    {
        $position = Position::find($pid);
        $position->collection_number += 1;
        $position->save();
        return $position->collection_number;
    }
    //减少计数收藏
    public static function collectionDown($pid)
    {
        $position = Position::find($pid);
        $position->collection_number -= 1;
        $position->save();
        return $position->collection_number;
    }   

    //增加投递次数
    public static function deliverUp($pid)
    {
        $position = Position::find($pid);
        $position->post_number += 1;
        $position->save();
    }

    //储存职位信息
    public static function store(Request $request)
    {
        $position = new Position;
        $position->cid = Auth::user()->company->id;
        $position->name = $request->name;
        $position->type= $request->type;
        $position->salary = $request->salary;
        $position->abstract = $request->abstract;
        $position->recruit_number = $request->recruit_number;
        $position->post_number = 0;     //简历投递人数
        $position->collection_number = 0;

        $position->save();

        return $position;
    }

    //详细检索职位
    public static function search_details(Request $request)
    {
        $order = $request->order;
        $time = $request->time;
        $type = $request->type;
        $salary = $request->salary;

        if( $order == 0 )
            $order = 'ASC';
        else
            $order = 'DESC';

        if($time == null)
        {
            $now = time();
            $time = date("Y-m-d h:i:s", $now);
        }
        else
            $time .= ' 00:00:00';

        if($salary == null )
            $salary = 0;


        $positions = Position::where('created_at', '<', $time)
                ->where('type', $type)
                //->where('city', 'like', '%' . $city . '%')
                ->where('salary', '>=', $salary)
                ->orderBy('recruit_number', $order)->paginate(10);

        //分页链接参数设置
        $positions->appends([
            'order' => $order,
            'time'  => $time,
            'type'  => $type,
            'salary'=> $salary
            ]);
        return $positions;
    }
}
