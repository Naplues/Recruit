<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');           //外键
            $table->string('name');           //项目名称
            $table->date('startdate');        //开始时间
            $table->date('enddate');          //结束时间
            $table->string('content', 1000);        //内容
            $table->string('harvest', 10000);        //收获
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
        Schema::dropIfExists('item_projects');
    }
}
