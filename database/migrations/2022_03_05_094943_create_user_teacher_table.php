<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('teacher_name')->comment('ชื่อครู');
            $table->string('teacher_lname')->comment('นามสกุล');
            $table->string('teacher_birthday')->comment('วันเกิดครู');
            $table->string('teacher_email')->comment('อีเมล์ครู');
            $table->string('teacher_tel')->comment('เบอร์โทรศัพท์');
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
        Schema::dropIfExists('user_teacher');
    }
}
