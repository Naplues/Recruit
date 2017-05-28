<?php

use App\User as User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test',function(){
	return view('test.index');
});


//聊天室相关路由

Route::get('chat_admin',function(){

	return view('chat.index_admin');
});
Route::get('chat_student',function(){

	return view('chat.index_student');
});
Route::get('chat_company',function(){

	return view('chat.index_company');
});



//欢迎界面
Route::get('/', 'IndexController@index');





//宣讲会/招聘会/全职/兼职/实习
Route::get('career_talk_list', 'Student\JobController@career_talk_list');


Route::get('position_search', 'Student\JobController@position_search');
Route::get('position_list', 'Student\JobController@position_list');
Route::get('student/position_other_list/{pid}', 'Student\JobController@position_other_list');

Route::get('position_full_job', 'Student\JobController@position_full_job');
Route::get('position_part_job', 'Student\JobController@position_part_job');
Route::get('position_study_job', 'Student\JobController@position_study_job');


/*
|--------------------------------------------------------------------------
| 游客相关路由
|--------------------------------------------------------------------------
|
| 游客的权限，查看公司，职位，招聘会，宣讲会列表和详情
|
*/
Route::group(['prefix' => 'guest'], function () {

	//列表路由
	Route::get('get_companies_list', 'Guest\ListController@get_companies_list');
	Route::get('get_positions_list', 'Guest\ListController@get_positions_list');
	Route::get('get_job_fairs_list', 'Guest\ListController@get_job_fairs_list');
	Route::get('get_career_talks_list', 'Guest\ListController@get_career_talks_list');
	
	//详情路由
	Route::get('goto_company_info/{cid}', 'Guest\InfoController@goto_company_info');
	Route::get('goto_position_info/{pid}', 'Guest\InfoController@goto_position_info');
	Route::get('goto_job_fair_info/{jid}', 'Guest\InfoController@goto_job_fair_info');
	Route::get('goto_career_talk_info/{cid}', 'Guest\InfoController@goto_career_talk_info');

});


/*
|--------------------------------------------------------------------------
| 学生用户相关路由
|--------------------------------------------------------------------------
|
| 学生的权限，查看公司，职位，招聘会，宣讲会列表和详情
| 简历填写，投递，关注公司，收藏职位
|
*/

Auth::routes();
Route::group(['prefix' => 'student'], function () {

	/*
	|--------------------------------------------------------------------------
	| 个人信息相关路由
	|--------------------------------------------------------------------------
	|
	| 
	*/
	Route::get('validate_type', function(Request $request){
		$users = User::where('email', $request->email)->get();
		if(count($users) == 0)
			$data = array('type' => 'unknown');
		else
        	$data = array('type' => $users[0]->usertype);
        return $data;
	});

	Route::get('index', 'Student\IndexController@index');        //主页

	Route::get('profile_avatar', 'HomeController@profile_avatar');
	Route::post('profile_avatar_post', 'HomeController@profile_avatar_post');
	Route::get('profile_avatar_post', 'HomeController@profile_avatar_post');

	Route::get('profile_details', 'Student\InfoController@profile_details');   //账户资料

	Route::get('check_pwd', 'Student\AjaxController@check_pwd');               //检测密码是否正确
	Route::get('reset_password', 'Student\AjaxController@reset_password');     //修改密码

	/*
	|--------------------------------------------------------------------------
	| 公司职位/宣讲会/招聘会相关路由设置
	|--------------------------------------------------------------------------
	|
	| 公司相关路由设置
	|
	*/
	Route::get('company_search', 'HomeController@company_search');                    //检索公司
	Route::get('company_search_details', 'HomeController@company_search_details');
	Route::get('position_search_details', 'Student\JobController@position_search_details');  //详细检索职位信息
	Route::get('position_search_type/{id}', 'Student\JobController@position_search_type');   //分类检索职位信息

	Route::get('follow/{cid}', 'HomeController@follow');                         //关注该公司
	Route::get('unfollow/{cid}', 'HomeController@unfollow');
	Route::get('collection/{pid}', 'HomeController@collection');                 //收藏该职位
	Route::get('uncollection/{pid}', 'HomeController@uncollection');

	Route::get('job_fair_list', 'HomeController@job_fair_list');             //进入招聘会公告页面
//	Route::get('job_fair_join', 'HomeController@job_fair_join');              //参加招聘会

	Route::get('career_talk', 'HomeController@career_talk');                  //进入宣讲页面
	Route::get('career_talk_search', 'HomeController@career_talk_list');        //进入宣讲会列表
	Route::get('career_talk_search_details', 'HomeController@career_talk_search_details');
	Route::get('career_talk_show', 'HomeController@career_talk_show');        //查看宣讲详情

	Route::get('get_one_info/{id}', 'Student\IndexController@get_one_info');   //获取一条未读消息
	
	Route::get('get_unread_info_list', 'Student\IndexController@get_unread_info_list');   //获取未读信息消息列表
	
	Route::get('get_dynamics_list/{cid}', 'Student\IndexController@get_dynamics_list');     //获取公司动态信息
	/*
	|--------------------------------------------------------------------------
	| 简历相关路由设置
	|--------------------------------------------------------------------------
	|
	| 简历相关路由设置
	|
	*/

	//进入编辑完善简历页面
	Route::get('resume_basic_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_basic_edit');
	Route::get('resume_education_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_education_edit');
	Route::get('resume_contact_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_contact_edit');
	Route::get('resume_project_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_project_edit');
	Route::get('resume_work_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_work_edit');
	Route::get('resume_award_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_award_edit');
	Route::get('resume_job_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_job_edit');	
	Route::get('resume_skill_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_skill_edit');
	Route::get('resume_comment_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_comment_edit');
	Route::get('resume_attach_edit/{rid}/{method}/{id}', 'Student\ResumeController@resume_attach_edit');
	
	//提交编辑完善结果结果
	Route::post('post_resume_basic', 'Student\ResumeController@post_resume_edit_basic');         //编辑
	Route::post('post_resume_education', 'Student\ResumeController@post_resume_edit_education'); //编辑
	Route::post('post_resume_contact', 'Student\ResumeController@post_resume_edit_contact');     //编辑
	Route::post('post_resume_project', 'Student\ResumeController@post_resume_edit_project');     //编辑
	Route::post('post_resume_work', 'Student\ResumeController@post_resume_edit_work');           //编辑
	Route::post('post_resume_award', 'Student\ResumeController@post_resume_edit_award');         //编辑
	Route::post('post_resume_job', 'Student\ResumeController@post_resume_edit_job');             //编辑
	Route::post('post_resume_skill', 'Student\ResumeController@post_resume_edit_skill');         //编辑
	Route::post('post_resume_comment', 'Student\ResumeController@post_resume_edit_comment');     //编辑
	Route::post('post_resume_attach', 'Student\ResumeController@post_resume_edit_attach');       //编辑	

	Route::get('resume_edit/{rid}', 'Student\ResumeController@resume_edit');
	Route::get('resume_list/{uid}', 'Student\ResumeController@resume_list');
	Route::get('resume_show/{rid}', 'Student\ResumeController@resume_show');
	Route::get('resume_delete/{rid}', 'Student\ResumeController@resume_delete');  //删除指定的简历
	Route::get('resume_delete_selected', 'Student\ResumeController@resume_delete_selected'); //删除多个简历

	/*
	|--------------------------------------------------------------------------
	| 消息相关路由,投递，关注，收藏
	|--------------------------------------------------------------------------
	|
	| 简历相关路由设置
	|
	*/

	Route::get('resume_create', 'Student\ResumeController@resume_create');   //创建一份简历
	Route::post('resume_store', 'HomeController@resume_store');
	Route::get('resume_deliver/{pid}/{rid}', 'Student\ResumeController@resume_deliver');    //投递简历
	Route::get('resume_post/{rid}', 'Student\ResumeController@resume_post');                //投放人才库

	Route::get('deliver_list', 'Student\InfoController@deliver_list');
	Route::get('follow_list', 'Student\InfoController@follow_list');
	Route::get('collect_list', 'Student\InfoController@collect_list');

	Route::get('downloads_attach/{id}', 'HomeController@downloads_attach');

	//Ajax请求
	Route::get('mark_info_read/{id}', 'Student\AjaxController@mark_info_read');  //标记信息已读
	Route::get('get_new_infos/{uid}', 'Student\AjaxController@get_new_infos');     //获取新消息
	Route::get('load_infos/{mark}', 'Student\AjaxController@load_infos');               //加载消息
});




/*
|--------------------------------------------------------------------------
| 招聘公司相关路由
|--------------------------------------------------------------------------
|
| 公司的权限，查看简历，职位，招聘会，宣讲会列表和详情
| 接收简历，
|
*/
Route::group(['prefix' => 'company'], function () {

	Route::get('validate_type', function(Request $request){
		$users = User::where('email', $request->email)->get();
		if(count($users) == 0)
			$data = array('type' => 'unknown');
		else
        	$data = array('type' => $users[0]->usertype);
        return $data;
	});

	Route::get('profile_avatar', 'Company\PageController@profile_avatar');
	Route::post('profile_avatar_post', 'Company\IndexController@profile_avatar_post');

	Route::get('profile_details', 'Company\PageController@profile_details');   //账户资料
	Route::get('check_pwd', 'Company\AjaxController@check_pwd');    //检测密码是否正确
	Route::get('reset_password', 'Company\AjaxController@reset_password');     //修改密码
	//注册，登录，主页
	Route::get('register', 'Company\IndexController@register');
	Route::post('register', 'Company\RegisterController@register');

	Route::get('login', 'Company\IndexController@login');
    Route::post('login', 'Company\LoginController@login');

    Route::get('index', 'Company\IndexController@index');    //主页

	Route::get('get_one_info/{id}', 'Company\IndexController@get_one_info');   //获取一条未读消息
	Route::get('get_unread_info_list', 'Company\IndexController@get_unread_info_list');   //获取未读信息消息列表

    //页面路由
    Route::get('position_add', 'Company\PageController@position_add');                //添加职位页面
    Route::get('position_edit', 'Company\PageController@position_edit');
    Route::get('position_show/{pid}', 'Company\PageController@position_show');
    Route::get('position_list', 'Company\PageController@position_list');

    Route::get('info_show', 'Company\PageController@info_show');                      //公司信息页面   
    Route::get('info_edit', 'Company\PageController@info_edit');

    Route::get('follow_list/{cid}' ,'Company\PageController@follow_list');              //查看关注列表
    Route::get('collect_list/{cid}' ,'Company\PageController@collect_list');            //查看收藏列表

    Route::get('deliver_list', 'Company\PageController@deliver_list');                 //查看投递列表
    Route::get('deliver_show/{cid}/{rid}', 'Company\PageController@deliver_show');     //查看投递简历

    Route::get('new_messages', 'Company\PageController@new_messages');                  //查看新消息

    
    Route::get('job_fair_list', 'Company\PageController@job_fair_list');                 //查看招聘会列表
    Route::get('job_fair_show/{id}', 'Company\PageController@job_fair_show');            //进入招聘会详情页面

    Route::get('join_job_fair/{jid}', 'Company\PageController@join_job_fair');           //入驻宣讲会

    Route::get('get_dynamics_list/{cid}', 'Company\PageController@get_dynamics_list');   //进入公司动态列表
    //事件路由
    Route::post('info_store', 'Company\IndexController@info_store');           //保存公司信息
    Route::post('position_store', 'Company\IndexController@position_store');   //保存职位信息

    Route::get('resume_show/{pid}/{rid}', 'Company\PageController@resume_show');           //查看应聘者简历
    Route::get('resume_show_in_lib/{rid}', 'Company\PageController@resume_show_in_lib');   //查看应聘者简历
    Route::get('resume_search', 'Company\PageController@resume_search');                   //进入简历搜索页面
    Route::post('resume_search', 'Company\IndexController@resume_search');                 //简历搜索结果
    
    Route::get('resume_deliver', 'Company\PageController@resume_deliver');                 //简历接收页面
    Route::post('accept_resume', 'Company\IndexController@accept_resume');                     //接收简历
    Route::get('accept_selected_resume', 'Company\IndexController@accept_selected_resume');    //接收选中的简历

    Route::get('career_talk', 'Company\PageController@career_talk');                  //进入宣讲会页面
    Route::get('career_talk_show/{id}', 'Company\PageController@career_talk_show');   //宣讲会详情
    Route::post('career_talk_post', 'Company\IndexController@career_talk_post');

    //Ajax请求
    Route::get('mark_info_read/{id}', 'Company\AjaxController@mark_info_read');         //标记信息已读
    Route::get('get_new_infos/{cid}', 'Company\AjaxController@get_new_infos');          //获取新消息
    Route::get('load_infos/{mark}', 'Company\AjaxController@load_infos');               //加载消息
});



/*
|--------------------------------------------------------------------------
| 管理员相关路由
|--------------------------------------------------------------------------
|
| 管理员的权限，查看公司，职位，招聘会，宣讲会列表和详情
|
*/
Route::group(['prefix' => 'admin'], function () {

	Route::get('validate_type', function(Request $request){
		$users = User::where('email', $request->email)->get();
		if(count($users) == 0)
			$data = array('type' => 'unknown');
		else
        	$data = array('type' => $users[0]->usertype);
        return $data;
	});

	//注册，登录，主页
	Route::get('register', 'Admin\IndexController@register');
	Route::post('register', 'Admin\RegisterController@register');

	Route::get('login', 'Admin\IndexController@login');
	Route::post('login', 'Admin\LoginController@login');

    Route::get('index', 'Admin\IndexController@index');

    Route::get('/', 'Admin\IndexController@index');

    //页面路由
	Route::get('job_fair_list', 'Admin\PageController@job_fair_list');             //进入招聘会公告页面
	Route::get('job_fair_show/{jid}', 'Admin\PageController@job_fair_show');       //进入招聘会详情页面
	Route::get('job_fair_post', 'Admin\PageController@job_fair_post');             //进入发布招聘会页面
	Route::get('company_list', 'Admin\PageController@company_list');
	Route::get('company_info_show/{id}', 'Admin\PageController@company_info_show');    //进入公司信息显示页面
	Route::get('auth_company', 'Admin\PageController@auth_company');                   //显示未认证的公司
	Route::get('authed_company', 'Admin\PageController@authed_company');               //显示已认证的公司
	Route::get('auth_pass/{cid}', 'Admin\PageController@auth_pass');              //通过认证

	//事件路由
	Route::post('job_fair_post', 'Admin\IndexController@job_fair_post');          //存储招聘会信息
	Route::get('downloads_auth/{cid}', 'Admin\IndexController@downloads_auth');      //下载认证信息

});
