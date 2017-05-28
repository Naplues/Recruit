<?php

namespace App\Models;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;



class Resume extends Model
{
    //

    /**
     * foreign_key, local_key
     * 获取关联到简历的联系放式
     */
    public function basic()       //一份基本信息
    {
    	return $this->hasOne('App\Models\ItemBasic', 'rid', 'id');
    }
    public function educations()   //多份教育经历
    {
    	return $this->hasMany('App\Models\ItemEducation', 'rid', 'id');
    }
     public function contact()    //一份联系方式
    {
        return $this->hasOne('App\Models\ItemContact', 'rid', 'id');
    }
    public function projects()     //多个项目经历
    {
    	return $this->hasMany('App\Models\ItemProject', 'rid', 'id');
    }
    public function works()        //多个工作经验
    {
        return $this->hasMany('App\Models\ItemWork', 'rid', 'id');
    }
    public function awards()       //多个获奖经历
    {
        return $this->hasMany('App\Models\ItemAward', 'rid', 'id');
    }
    public function job()         //一个求职意向
    {
        return $this->hasOne('App\Models\ItemJob', 'rid', 'id');
    }
	public function skills()       //多个技能
    {
        return $this->hasMany('App\Models\ItemSkill', 'rid', 'id');
    }
    public function comment()     //一个评论
    {
        return $this->hasOne('App\Models\ItemComment', 'rid', 'id');
    }
    public function attachs()      //多个附件
    {
        return $this->hasMany('App\Models\ItemAttach', 'rid', 'id');
    }
    //简历持有者
    public function owner()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    //创建简历信息
    public static function store(Request $request)
    {
        $resume = new Resume;
        $resume->uid = Auth::user()->id;
        $resume->name = $request->name;
        $resume->complete = 0;      //完整度为0 
        $resume->is_post = 0; 

        $resume->save();
        return $resume;
    }

    //增加简历完整度
    public static function completeUp($rid)
    {
        $resume = Resume::find($rid);
        $resume->complete += 10;
        $resume->save();
    }

    //
    public static function completeDown($rid)
    {
        $resume = Resume::find($rid);
        $resume->complete -= 10;
        $resume->save();
    }
}
