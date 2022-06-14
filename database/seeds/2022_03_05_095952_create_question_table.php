<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->string('type_student')->nullable()->comment('ชื่อแบบประเมิน');
            $table->string('question_name')->nullable()->comment('ชื่อแบบประเมิน');
            $table->string('question_title')->nullable()->comment('title');
            $table->string('question_status')->nullable()->comment('ไม่โชว์');
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
        Schema::dropIfExists('question');
    }
}
