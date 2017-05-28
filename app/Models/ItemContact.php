<?php

namespace App\Models;

use App\Models\Resume as Resume;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/*
联系放式条目
*/
class ItemContact extends Model
{
	/**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'item_contacts';

	//$primaryKey = 'id';
	//$incrementing = false;
	/**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    //public $timestamps = false;

	/**
     * 模型日期列的存储格式
     *
     * @var string
     */
    //protected $dateFormat = 'U';

    //每个联系方式信息属于一个简历
    public function resume()
    {
        return $this->belongsTo('App\Models\Resume', 'rid', 'id');
    }

    //存储完成之后检查完整度
    public static function store($rid, $phone, $emergency, $email, $address)
    {

        $contact = new ItemContact;

        $contact->rid       = $rid;
        $contact->phone     = $phone;
        $contact->emergency = $emergency;
        $contact->email     = $email;
        $contact->address   = $address;

        $contact->save();

        Resume::completeUp($rid);
        
        return $contact;
    }

    //插入一条记录
    public static function newRecord(Request $request)
    {
        ItemContact::store(
            $request->rid, 
            $request->phone, 
            $request->emergency, 
            $request->email, 
            $request->address
            );
    }

    //更新一条记录,属性：4
    public static function updateRecord(Request $request)
    {
        $contact = ItemContact::find($request->id);

        $contact->phone     = $request->phone;
        $contact->emergency = $request->emergency;
        $contact->email     = $request->email;
        $contact->address   = $request->address;

        $contact->save();
    }

}
