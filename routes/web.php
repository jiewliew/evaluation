<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// การกำหนดทิศทาง

Route::get('/', 'UserController@login'); //หน้าLogin
Route::get('/a', 'UserController@a'); //ไว้test
Route::post('login', 'UserController@submitlogin')->name('login')->middleware('checkadmin');  //บันทึกการlogin




Route::group(['middleware' => ['auth.user']], function () { //ใช้สำหรับการLogin
    Route::get('/student', 'StudentController@index')->name('student'); //หน้า student
    Route::get('/logout','StudentController@logout')->name('logout'); //ออกจากระบบ
    Route::get('/getteacher','StudentController@getteacher')->name('getteacher'); //ดึงข้อมูล อาจารย์ทั้งหมด-
    Route::get('/register', 'StudentController@register')->name('register'); //สมัครสมาชิก
    Route::get('/datastudent', 'StudentController@datastudent')->name('datastudent'); //ข้อมูลนักเรียนทั้งหมด
    Route::get('/teacher','TeacherController@teacher')->name('teacher');  //หน้า form ตาราง อาจารย์
    Route::get('/datateacher','TeacherController@datateacher')->name('datateacher');  //ข้อมูล อาจารย์
    Route::post('/submiteditteacher','TeacherController@submiteditteacher')->name('submiteditteacher'); //บันทึกแก้ไขอาจารย์
    Route::post('/submitcreateteacher','TeacherController@submitcreateteacher')->name('submitcreateteacher'); //บันทึกเพิ่มอาจารย์
    Route::post('/submitcreatestudent','StudentController@submitcreatestudent'); //เพิ่มนักเรียน
    Route::post('/submiteditstudent','StudentController@submiteditstudent')->name('submiteditstudent'); //แก้ไขนักเรียน
    Route::post('/submitregister','StudentController@submitregister'); //บันทึกการเพิ่ม ผู้สมัครใหม่
    Route::get('/listregister','StudentController@listregister')->name('listregister'); //โชว์ผู้สมัครทั้งหมด
    Route::get('/dataquestion','QuestionController@dataquestion')->name('dataquestion'); //ข้อมูล คำถามทั้งหมใด
    Route::get('/dataevalution', 'QuestionController@dataevalution')->name('dataevalution'); //ข้อมูลหัวข้อ
    Route::post('/submiteditevalution/{id}','QuestionController@submiteditevalution')->name('submiteditevalution'); //บันทึกการแก้ไข หัวข้อ
    Route::get('/datatype','QuestionController@datatype')->name('datatype'); //หน้า form ประเภท
    Route::get('/ajaxdatatype','QuestionController@ajaxdatatype')->name('ajaxdatatype'); //ข้อมูลประเภท
    Route::get('/dataassessment','QuestionController@dataassessment')->name('dataassessment'); //ข้อมูลคำถาม
    Route::get('/ajaxdataassessment','QuestionController@ajaxdataassessment')->name('ajaxdataassessment'); //รวมหน้าคำถาม
    Route::get('/insurance','InsuranceController@insurance')->name('insurance'); //หน้า ประเมิน
    Route::get('/getstudent/{name}','StudentController@getstudent')->name('getstudent');//filter ข้อมูลนักเรีย ยกตัวอย่าง เพิ่มใหม่
    Route::get('dataregister', 'StudentController@dataregister')->name('dataregister'); //ข้อมูลสมัครสมาชิก
    Route::post('/saveinsurance','InsuranceController@saveinsurance')->name('saveinsurance');  //บันทึกการประเมิน
    Route::post('/saveregisterorder','RegisteroOrderController@saveregisterorder')->name('saveregisterorder'); //บันทึกประเมินผู้สมัครใหม่
    Route::post('/getorder','RegisteroOrderController@getorder')->name('getorder'); //ดึงข้อมูลประเมิน
    Route::post('/getdataquestion','InsuranceController@getdataquestion')->name('getdataquestion');  //ดึงข้อมูลคำถาม
    Route::post('/updatestudent','StudentController@updatestudent')->name('updatestudent');  //แก้ไขนักเรียน
    Route::get('/datainsurance','InsuranceController@datainsurance')->name('datainsurance'); //ดึงข้อมูลหัวข้อ ตัว อายุ 0-9เดือน
    Route::post('/getdataorder','InsuranceController@getdataorder')->name('getdataorder'); //ดึงข้อมูล แบบประเมิน
    Route::get('/studentme','InsuranceController@studentme')->name('studentme'); //แก้ไข
    Route::post('/submitedittypequestion/{id}','InsuranceController@submitedittypequestion')->name('submitedittypequestion'); //แก้ไขคำถาม
    Route::post('/submiteditdata/{id}','InsuranceController@submiteditdata')->name('submiteditdata'); //แก้ไขหัวข้อคำถาม
    Route::get('/datastudentme','InsuranceController@datastudentme')->name('datastudentme');
    Route::get('/news', 'NewsController@news')->name('news');
    Route::get('/datanews', 'NewsController@datanews')->name('datanews');
    Route::get('/home', 'indexController@home')->name('home'); //หน้า website สำหรับ user ทั่วไป
    Route::get('/news1', 'indexController@news1')->name('news1');
    Route::get('/newsdetail', 'indexController@newsdetail')->name('newsdetail');
    Route::get('/about', 'indexController@about')->name('about');
    Route::post('/submitcreatenews','NewsController@submitcreatenews');

    //Route::post('/getnews','NewsController@getdatanews')->name('getnews');
});
