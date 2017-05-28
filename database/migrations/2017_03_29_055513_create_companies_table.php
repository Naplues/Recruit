<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');                   //外键
            $table->string('name', 100);              //公司名称
            $table->integer('scale');                 //公司规模
            $table->integer('property');              //公司类型
            $table->string('industry', 200);          //公司行业
            $table->string('website', 200);           //官网网址
            $table->string('city');                   //城市
            $table->string('address', 200);           //公司地址
            $table->string('abstract', 20000);        //公司简介
            $table->integer('focus');                 //关注人数
            $table->integer('job_number');            //职位数目
            $table->integer('auth');                  //认证信息
            $table->string('phone', 20);              //联系电话
            $table->string('email', 50);              //邮箱
            $table->string('auth_file_path');         //认证文件
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
