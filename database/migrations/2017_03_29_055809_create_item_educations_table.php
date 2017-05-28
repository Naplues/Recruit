<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');            //外键
            $table->date('startdate');         //开始时间
            $table->date('enddate');           //结束时间
            $table->string('school');          //学校
            $table->integer('degree');         //学位
            $table->integer('qualification');       //学历
            $table->integer('type');           //教育类型
            $table->string('campus');          //院系
            $table->string('major');           //专业
            $table->string('class');           //课程
            $table->integer('rank');           //排名

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
        Schema::dropIfExists('item_educations');
    }
}
