<?php

namespace App\Models;

use DB;
use Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

ini_set('memory_limit','1024M');

class Company extends Model
{
    // foreign_key, local_key
	//公司信息的持有者
    public function owner()
    {
    	return $this->belongsTo('App\User', 'uid', 'id');
    }
    //一家公司可以发布多个职位
    public function positions()
    {
    	return $this->hasMany('App\Models\Position', 'cid', 'id');
    }
    //一家公司有多场宣讲会    
    public function talks()
    {
        return $this->hasMany('App\Models\CareerTalk', 'cid', 'id');
    }
    //一家公司可参加多场招聘会
    public function join()
    {
        return $this->hasMany('App\Models\Join', 'cid', 'id');
    }
    //一家公司可有多条动态
    public function dynamics()
    {
        return $this->hasMany('App\Models\Dynamic', 'cid', 'id');
    }

    //初始化一个公司信息
    public static function init($uid)
    {
        $new_info = new Company;
        $new_info->focus = 0;           //关注人数
        $new_info->job_number = 0;      //职位数目
        $new_info->auth = 0;           //未认证
        $new_info->uid = $uid;
        $new_info->name = '';
        $new_info->scale = 0;
        $new_info->property = 0;
        $new_info->industry = '';
        $new_info->website = '';
        $new_info->city = '';
        $new_info->address = '';
        $new_info->abstract = '';
        $new_info->phone = '';
        $new_info->email = '';
        $new_info->auth_file_path = '';
        $new_info->save();
        return $new_info->id;
    }

    //增加计数关注
    public static function followUp($cid)
    {
        $company = Company::find($cid);
        $company->focus += 1;
        $company->save();
        return $company->focus;
    }
    //减少计数关注
    public static function followDown($cid)
    {
        $company = Company::find($cid);
        $company->focus -= 1;
        $company->save();
        return $company->focus;
    }

    //储存公司信息
    public static function store(Request $request)
    {
        $company_info = Company::where('uid', Auth::user()->id )->get();   //查找指定用户的公司信息记录是否存在
        if(count($company_info) == 0)
        {
            $new_info = new Company;

            $new_info->focus = 0;           //关注人数
            $new_info->job_number = 0;      //职位数目
            $new_info->auth = 0;           //未认证
        }
        else
        {

            $new_info = $company_info[0];

            //$new_info->focus = 0;           //关注人数
            //$new_info->job_number = 0;      //职位数目
            $new_info->auth = 0;           //未认证

            $path = $new_info->auth_file_path;
            Storage::delete($path);   //删除旧文件  
        }
        //可修改的值
        $new_info->uid = Auth::user()->id;
        $new_info->name = $request->name;
        $new_info->scale = $request->scale;
        $new_info->property = $request->property;
        $new_info->industry = $request->industry;
        $new_info->website = $request->website;
        $new_info->city = $request->city;
        $new_info->address = $request->address;
        $new_info->abstract = $request->abstract;
        $new_info->phone = $request->phone;
        $new_info->email = $request->email;
        $new_info->auth_file_path = $request->auth_file_path;

        $new_info->save();

        //return view('company.info_show')
          //  ->with('company_info', $new_info);
        //return redirect()->intended('company/info_show');   //重定向
    }

    //发布职位数+1
    public static function positionUp($cid)
    {
        $company = Company::find($cid);
        $company->job_number +=1;

        $company->save();
    }
    //发布职位数-1
    public static function positionDown($cid)
    {
        $company = Company::find($cid);
        $company->job_number -=1;
        
        $company->save();
    }

    //条件筛选查询公司
    public static function getCompanies(Request $request)
    {
        DB::connection()->disableQueryLog();
        $scale = $request->scale;
        $city = $request->city;
        $property = $request->property;
        
        $companies = Company::paginate(15);
        /*
        if( $scale != 0 )
            $companies = $companies::where('scale', $scale)->get();
        if( $property != 0 )
            $companies = $companies::where('property', $property)->get();
        if( isset($city) )
            $companies = $companies::where('city', $city)->get();
        */
        return $companies;
    }

    //详细检索
    public static function search_details(Request $request)
    {
        $scale = $request->scale;
        $city = $request->city;
        $property = $request->property;

        $handle = DB::table('companies');

        if( $scale != 0 )
            $handle->where('scale', $scale);
        if( $property != 0 )
            $handle->where('property', $property);

        if( $city != '' )
            $handle->where('city' , $city);

        $companies = $handle->where('auth', 1)->paginate(10);

        return $companies;
    }

    //公司通过认证
    public static function auth_pass($cid)
    {
        $company = Company::find($cid);

        $company->auth = 1;

        $company->save();
    }

}
