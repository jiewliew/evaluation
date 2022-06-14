<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id')->comment('มาจากstudentlists');
            $table->unsignedBigInteger('evalution_id')->comment('มาจาก evalution');
            $table->string('status')->comment('สถานะ');
            $table->timestamps();
        });

        Schema::create('register_order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_order_id');
            $table->foreign('register_order_id')->references('id')->on('register_order')->onDelete('cascade');
            $table->unsignedBigInteger('evalution_id')->comment('มาจาก evalution');
            $table->unsignedBigInteger('question_id')->comment('มาจากตาราง question');
            $table->string('action')->comment('ผ่านหรือไม่ผ่าน');
            $table->string('status')->comment('สถานะ');
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
        Schema::dropIfExists('register_order');
    }
}
