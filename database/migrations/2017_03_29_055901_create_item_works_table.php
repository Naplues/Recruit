<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');           //外键
            $table->date('startdate');        //开始
            $table->date('enddate');          //结束
            $table->string('company');        //单位
            $table->string('position');       //岗位
            $table->string('content', 1000);        //内容
            $table->string('harvest', 1000);        //收获

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
        Schema::dropIfExists('item_works');
    }
}
