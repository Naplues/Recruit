<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');             //外键
            $table->integer('property');             //期望性质
            $table->string('city');                 //偏爱城市
            $table->integer('state');                //目前状况
            $table->integer('salary');               //期望薪资
            $table->string('arrival', 100);          //到岗时间

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
        Schema::dropIfExists('item_jobs');
    }
}
