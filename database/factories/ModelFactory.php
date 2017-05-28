<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'usertype' => 1,     //招聘单位
        'avatar' => 'null',
        'remember_token' => str_random(10),
    ];
});



//公司数据生成器，同时生成用户
$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {

    return [
    	'uid' => function(){
    		return factory(App\User::class)->create()->id;
    	},
        'name' => $faker->randomElement($array = array ('江苏','浙江','安徽', '河南', '广东', '北京', '湖北', '重庆', '四川', '福建', '陕西', '河北', '湖南', '江西', '海南')) . 
                    $faker->randomElement($array = array ('计算机','化工','机械', '材料', '生物', '环境', '旅游', '自动化', '造船', '冶铁', '休闲', '电子', '电器', '农林', '花卉', '通信', '采矿')) . 
                    $faker->randomElement($array = array ('科技','信息','制造', '批发', '管理', '处理', '研究', '技术')) . 
                    $faker->randomElement($array = array ('股份有限公司','有限责任公司', '生产中心', '研发中心', '科研所', '销售部', '开发岗', '技术中心'))  
                    ,
        'scale' => $faker->numberBetween(0, 6),
        'property' => $faker->numberBetween(0, 9),
        'industry' => $faker->randomElement($array = array ('计算机','化工','机械', '材料', '生物')),
        'website' => $faker->url,
        'city' => $faker->randomElement($array = array ('南京市', '北京市', '上海市', '广州市', '深圳市', '厦门市', '郑州市', '天津市', '武汉市', '成都市', '重庆市', '沈阳市', '合肥市', '杭州市', '苏州市', '太原市' ,'西安市', '济南市','长沙市')),
        'address' => $faker->address,
        'abstract' => $faker->text(1000),
        'focus' => $faker->numberBetween(0, 5000),
        'job_number' => $faker->numberBetween(0, 500),
        'auth' => $faker->numberBetween(0, 1) ,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});


//职位数据生成器，同时生成公司
$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {

    return [
        'cid' => function(){
            return factory(App\Models\Company::class)->create()->id;
        },
        'name' => $faker->randomElement($array = array ('JAVA','C++','硬件', '嵌入式', '视觉', '前端', 'WEB', 'PHP', 'C语言')) .
                    $faker->randomElement($array = array ('研发','开发','设计', '生产', '测试', '检测')) .
                    $faker->randomElement($array = array ('工程师','开发人员','经理', '管培生', '实习生')),
        'salary' => $faker->randomElement($array = array ('3000','4000', '5000', '6000','8000','10000', '12000', '15000', '20000')),
        'type' => $faker->randomElement($array = array(0,1,2)),
        'abstract' => $faker->text(1000),
        'recruit_number' => $faker->numberBetween(0, 100),
        'post_number' => $faker->numberBetween(0, 100),
        'collection_number' => $faker->numberBetween(0, 200),
    ];
});




//简历数据生成器,
$factory->define(App\Models\Resume::class, function (Faker\Generator $faker) {

    return [
        'uid' => function(){
            return factory(App\User::class)->create()->id;
        },
        'name' => $faker->randomElement($array = array ('Java开发','C++开发','PHP开发', 'WEB开发', '嵌入式开发')),
        'complete' => 100,
        'is_post' => $faker->numberBetween(0, 1),
    ];
});
//1.basic
$factory->define(App\Models\ItemBasic::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'name' => $faker->name,
        'gender' => $faker->numberBetween(1, 2),
        'height' => $faker->numberBetween(160, 190),
        'weight' => $faker->numberBetween(50, 80),
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'idnumber' => '123584698576521354',
        'nation' => $faker->numberBetween(1, 55),
        'health' => $faker->numberBetween(1, 3),
        'status' => $faker->numberBetween(1, 5),
        'marriage' => $faker->numberBetween(1, 3),
        'origin' => $faker->address,
        'permanen' => $faker->address,
        'photo' => 'caskbksbvkjdvjsdbvjfdbvjhdf',
    ];
});
//2.education
$factory->define(App\Models\ItemEducation::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'startdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'enddate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'school' => $faker->randomElement($array = array ('南京大学','南京理工大学', '江苏大学', '东南大学','南京农业大学','南京工业大学')),
        'degree' => $faker->numberBetween(1, 5),
        'qualification' => $faker->numberBetween(1, 6),
        'type' => $faker->numberBetween(1, 3),
        'campus' => $faker->randomElement($array = array ('计算机学院','机械学院', '化工学院', '材料学院','能动学院','经管学院')),
        'major' => $faker->randomElement($array = array ('软技工程','经济管理', '材料力学', '化学工程','能源动力','机械制造')),
        'class' => '大学英语，高等数学',
        'rank' => $faker->numberBetween(1, 100),
    ];
});
//3.contact
$factory->define(App\Models\ItemContact::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'phone' => $faker->tollFreePhoneNumber,
        'emergency' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});
//4.project
$factory->define(App\Models\ItemProject::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'name' => $faker->name,
        'startdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'enddate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'content' => $faker->text(1000),
        'harvest' => $faker->text(1000),

    ];
});
//5.work
$factory->define(App\Models\ItemWork::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'startdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'enddate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'company' => $faker->randomElement($array = array ('江苏','浙江','安徽', '河南', '广东', '北京', '湖北', '重庆', '四川', '福建', '陕西', '河北', '湖南', '江西', '海南')) . 
                    $faker->randomElement($array = array ('计算机','化工','机械', '材料', '生物', '环境', '旅游', '自动化', '造船', '冶铁', '休闲', '电子', '电器', '农林', '花卉', '通信', '采矿')) . 
                    $faker->randomElement($array = array ('科技','信息','制造', '批发', '管理', '处理', '研究', '技术')) . 
                    $faker->randomElement($array = array ('股份有限公司','有限责任公司', '生产中心', '研发中心', '科研所', '销售部', '开发岗', '技术中心'))  
                    ,
        'position' => $faker->randomElement($array = array ('南京市', '北京市', '上海市', '广州市', '深圳市', '厦门市', '郑州市', '天津市', '武汉市', '成都市', '重庆市', '沈阳市', '合肥市', '杭州市', '苏州市', '太原市' ,'西安市', '济南市','长沙市')),
        'content' => $faker->text(1000),
        'harvest' => $faker->text(1000),
    ];
});
//6.award
$factory->define(App\Models\ItemAward::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'name' => $faker->randomElement($array = array ('奖学金','程序设计大赛', 'C++编程大赛', 'Java开发大赛','三等奖学金')),
        'level' => $faker->numberBetween(1, 3),
        'time' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'details' => $faker->text(1000),
    ];
});
//7.job
$factory->define(App\Models\ItemJob::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'property' => $faker->numberBetween(1, 9),
        'city' => $faker->randomElement($array = array ('南京市', '北京市', '上海市', '广州市', '深圳市', '厦门市', '郑州市', '天津市', '武汉市', '成都市', '重庆市', '沈阳市', '合肥市', '杭州市', '苏州市', '太原市' ,'西安市', '济南市','长沙市')),
        'state' => $faker->numberBetween(1, 2),
        'salary' => $faker->randomElement($array = array ('3000','4000', '5000', '6000','8000','10000', '12000', '15000', '20000')),
        'arrival' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
//8.skill
$factory->define(App\Models\ItemSkill::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'type' => $faker->numberBetween(1, 5),
        'level' => $faker->numberBetween(400, 600),

    ];
});
//9.comment
$factory->define(App\Models\ItemComment::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'details' => $faker->text(1000),
    ];
});
//10.attach
$factory->define(App\Models\ItemAttach::class, function (Faker\Generator $faker) {

    return [
        'rid' => $faker->numberBetween(0, 100),
        'name' => $faker->name,
        'address' => $faker->address,
    ];
});


//宣讲会数据生成器,
$factory->define(App\Models\CareerTalk::class, function (Faker\Generator $faker) {

    return [
        'cid' => 1,
        'day' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $faker->randomElement($array = array ('南京市', '北京市', '上海市', '广州市', '深圳市', '厦门市', '郑州市', '天津市', '武汉市', '成都市', '重庆市', '沈阳市', '合肥市', '杭州市', '苏州市', '太原市' ,'西安市', '济南市','长沙市')),
        'college' => $faker->randomElement($array = array ('南京大学','南京理工大学', '江苏大学', '东南大学','南京农业大学','南京工业大学')),
        'address' => $faker->address,
        'details' => $faker->text(1000),
    ];
});

//招聘会数据生成器
$factory->define(App\Models\JobFair::class, function (Faker\Generator $faker) {

    return [
        'aid' => 2003,
        'name' => $faker->numberBetween(2014, 2017) . $faker->randomElement($array = array ('春季', '秋季')) . '招聘会',
        'time' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'host_address' => 1,     //招聘单位
        'total_number' => 500,
        'used_number' => $faker->numberBetween(10, 300),
        'details' => $faker->text(1000),
    ];
});
