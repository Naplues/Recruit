<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');           //外键
            $table->string('name');           //奖项名称
            $table->integer('level');         //等级
            $table->date('time');             //获奖时间
            $table->string('details', 1000);        //详细   

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
        Schema::dropIfExists('item_awards');
    }
}
