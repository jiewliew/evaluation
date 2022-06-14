<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentslist', function (Blueprint $table) {
            $table->string('student_id')->after('stu_id');
            $table->string('prefix_thai')->after('teacher_id');
            $table->string('prefix_en')->after('prefix_thai');
            $table->string('stu_name_en')->after('stu_last');
            $table->string('stu_lastname_en')->after('stu_name_en');
            $table->string('card_id')->after('stu_lastname_en');
            $table->string('birthday')->after('card_id');
            $table->string('country')->after('birthday')->comment('เชื้อชาติ');
            $table->string('country_1')->after('country')->comment('สัญชาติ');
            $table->string('country_2')->after('country_1')->comment('ศาสนา');
            $table->string('country_3')->after('country_2')->comment('ชนเผ่า');
            $table->string('stu_year')->after('country_3')->comment('ปีการศึกษา');
            $table->string('stu_chun')->after('stu_year')->comment('ชั้นเข้าเรียน');
            $table->string('stu_room')->after('stu_chun')->comment('ห้องที่เข้าเรียน');
            $table->string('stu_chun_1')->after('stu_room')->comment('ชั้นปัจจุบัน');
            $table->string('stu_room_1')->after('stu_chun_1')->comment('ห้อง');
            $table->string('address_number')->after('stu_room_1')->comment('รหัสทะเบียนบ้าน');
            $table->string('address_number_1')->after('address_number')->comment('เลขที่บ้าน');
            $table->string('moo')->after('address_number_1')->comment('หมู่');
            $table->string('road')->after('moo')->comment('ถนน');
            $table->string('city')->after('road')->comment('จังหวัด');
            $table->string('amphure')->after('city')->comment('อำเภอ');
            $table->string('tumbun')->after('amphure')->comment('ตำบล');
            $table->string('postcode')->after('tumbun')->comment('รหัสไปรษณีย์');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studentslist', function (Blueprint $table) {
            //
        });
    }
}
