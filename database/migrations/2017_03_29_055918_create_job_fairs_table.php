<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobFairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_fairs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aid');                     //发布人
            $table->string('name');                     //招聘会名称
            $table->date('time');                       //招聘会时间
            $table->string('host_address');             //举办地点
            $table->integer('total_number');            //席位数目
            $table->integer('used_number');             //已用数目
            $table->string('details', 2000);            //展位描述
            //规则描述
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
        Schema::dropIfExists('job_fairs');
    }
}
