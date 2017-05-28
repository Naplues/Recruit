<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemContactsTable extends Migration
{
    /**
     * Run the migrations.
     * 联系放式
     * @return void
     */
    public function up()
    {
        Schema::create('item_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid');              //外键
            $table->string('phone', 20);         //电话
            $table->string('emergency', 20);     //紧急联系人
            $table->string('email', 60);         //电子邮件
            $table->string('address', 200);      //通信地址
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
        Schema::dropIfExists('item_contacts');
    }
}
