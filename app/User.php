<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','usertype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * 获取关联到用户的简历
     */
    public function resumes()
    {
        return $this->hasMany('App\Models\Resume', 'uid', 'id');
    }
    //公司用户拥有的公司信息
    public function company()
    {
        return $this->hasOne('App\Models\Company', 'uid', 'id');
    }

    //一个用户可以收藏多个职位
    public function collect()
    {
        return $this->hasMany('App\Models\Collection', 'uid', 'id');
    }

    
}
