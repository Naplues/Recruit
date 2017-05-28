<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    //新公司动态，公司ID，动态内容
    public static function newDynamic($cid, $content)
    {
    	$dynamic = new Dynamic;
    	$dynamic->cid = $cid;
    	$dynamic->content = $content;
    	$dynamic->save();
    }
}
