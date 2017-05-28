<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//宣讲会
class CreateCareerTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_talks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');   //公司的ID
            $table->date('day');        //宣讲日期
            $table->string('city');      //城市
            $table->string('college');   //学校
            $table->string('address');    //详细地址
            $table->string('details', 1000);   //说明
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
        Schema::dropIfExists('career_talks');
    }
}
