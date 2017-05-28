<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_basics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');              //外键
            $table->string('name');          //姓名
            $table->char('gender', 1);           //性别
            $table->float('height');           //身高
            $table->float('weight');           //体重
            $table->date('birthday');         //出生日期
            $table->string('idnumber', 50);   //证件号码
            $table->integer('nation');        //民族
            $table->integer('health');        //健康
            $table->integer('status');        //政治面貌
            $table->integer('marriage');      //婚姻状况
            $table->string('origin', 200);        //籍贯
            $table->string('permanen', 200);      //户口所在地
            $table->string('photo', 200);       //照片
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
        Schema::dropIfExists('item_basics');
    }
}
