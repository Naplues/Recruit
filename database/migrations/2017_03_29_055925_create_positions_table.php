<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');                  //外键，公司id
            $table->string('name', 100);             //职位名称
            $table->integer('type');                 //职位类型
            $table->integer('salary');               //薪资待遇/月薪
            $table->string('abstract', 5000);              //职位描述/职责
            $table->integer('recruit_number');       //招聘人数
            $table->integer('post_number');          //简历投递人数
            $table->integer('collection_number');    //职位收藏人数
            //职位类型
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
        Schema::dropIfExists('positions');
    }
}
