<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id')->comment('มาจากstudentlists');
            $table->unsignedBigInteger('evalution_id')->comment('มาจาก evalution');
            $table->string('year')->comment('ปีการศึกษา');
            $table->string('status')->comment('สถานะ');
            $table->timestamps();
        });

        Schema::create('insurance_order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_id');
            $table->foreign('insurance_id')->references('id')->on('insurance_order')->onDelete('cascade');
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
        Schema::dropIfExists('insurance_order');
    }
}
