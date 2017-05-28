<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender');            //发起人
            $table->integer('receiver');          //接收人
            $table->string('content', 500);       //消息内容
            $table->integer('is_read');           //已读
            $table->integer('source_type')->nullable();              //消息类型
            $table->integer('source_id')->nullable();                //消息ID
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
        Schema::dropIfExists('information');
    }
}
