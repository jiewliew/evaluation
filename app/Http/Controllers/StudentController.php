<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\teacher;

class StudentController extends Controller
{
  public function index() //หน้าform นักเรียน
  {
    return view('student.student');
  }
  public function datastudent() //ดึงข้อมูลนักเรียน จาก  status = 1  คือข้อมูลที่ ถูกปรับสถานะ เป็นนักเรียนแล้ว
  {
    return   student::where('student_status', 1)->get();
  }
  public function dataregister()  //ดึงข้อมูลผู้สมครใหม่ สถานะ จะเป็น 0
  {
    return   student::where('student_status', 0)->get();
  }
  public function submitcreatestudent(Request $request) //ลงทะเบียนนักเรียน create คือ เหมือน insert เลย ตัวอย่างตามโค้ด
  {
    try {
      student::create([
        'student_id' => $request->id_student,
        'prefix_thai' => $request->prefix,
        'prefix_en' => $request->prexfix_en,
        'stu_name' => $request->name_th,
        'stu_last' => $request->surname_th,
        'stu_name_en' => $request->name_en,
        'stu_lastname_en' => $request->surname_en,
        'card_id' => $request->card,
        'birthday' => $request->birthday,
        'country' => $request->country,
        'country_1' => $request->country_1,
        'country_2' => $request->country_2,
        'country_3' => $request->country_3,
        'stu_year' => $request->student_year,
        'stu_chun' => $request->student_edu,
        'stu_room' => $request->student_room,
        'stu_chun_1' => $request->student_edu_1,
        'stu_room_1' => $request->student_room_1,
        'address_number' => $request->address_home,
        'address_number_1' => $request->address_home_1,
        'moo' => $request->moo,
        'road' => $request->road,
        'city' => $request->city,
        'amphure' => $request->amphure,
        'tumbun' => $request->tumbun,
        'postcode' => $request->postcode,
        'teacher_id' => Auth::id(),


      ]);

      return response()->json(200);  // ส่งข้อมูล เป็น json ยกตัวอย่างเหมือน datastudent ทืี่เคยขัึ้น 
    } catch (Throwable $e) {
      return response()->json(500);
    }
  }
  public function register()
  { //หน้า formสมาชิก
    return view('register');
  }
  public function  submitregister(Request $request) // เพิ่มข้อมูล การสมัครใหม่
  {
    try {

      $stu_id =  student::insertGetId([
        'student_id' => $request->id_student,
        'prefix_thai' => $request->prefix,
        'prefix_en' => $request->prexfix_en,
        'stu_name' => $request->name_th,
        'stu_last' => $request->surname_th,
        'stu_name_en' => $request->name_en,
        'stu_lastname_en' => $request->surname_en,
        'card_id' => $request->card,
        'birthday' => $request->birthday,
        'country' => $request->country,
        'country_1' => $request->country_1,
        'country_2' => $request->country_2,
        'country_3' => $request->country_3,
        'address_number' => $request->address_home,
        'address_number_1' => $request->address_home_1,
        'moo' => $request->moo,
        'road' => $request->road,
        'city' => $request->city,
        'amphure' => $request->amphure,
        'tumbun' => $request->tumbun,
        'postcode' => $request->postcode,
        'address_number_band1' => $request->address_home_band1,
        'address_number_band2' => $request->address_home_band2,
        'moo_1' => $request->moo_1,
        'road_1' => $request->road_1,
        'city_1' => $request->city_1,
        'amphure_1' => $request->amphure_1,
        'tumbun_1' => $request->tumbun_1,
        'postcode_1' => $request->postcode_1,
        'p_name' => $request->p_name,
        'p_lastname' => $request->p_lastname,
        'p_email' => $request->p_email,
        'p_tel' => $request->p_tel,
        'p_bro' => $request->p_bro,
        'student_status' => 0
      ]);
      if ($request->hasFile('file')) {
      
        $image = $request->file('file');
        $file = $image->getClientOriginalName();
        $request->file('file')->move(public_path('images/'), $file);
        $updatevent =  student::where('stu_id','=',$stu_id)->update(
          ['images'=>$file]
        );
       
      }

      return response()->json(200);  //เหมือนคอมเม้นด้านบน
    } catch (Throwable $e) {
      return response()->json(500);
    }
  }
  public function listregister()  //หน้า form ผู้สมคร
  {
    return view('listregister');
  }
  public function  getstudent($name) //หน้า ประเมินที่ filter นักเรียน จากโค้ด จะ Where Like คือค้นหาคำทั้งหมด เหมือน select * from where a LIKE '%aaa%' บลาๆ  
  {

    return student::where('stu_name', 'like', '%' . $name . '%')->where('teacher_id', Auth::id())->where('student_status', 1)->get();  //where Auth::id() คือ ไอดี ของอาจารย์ที่login มา  คำว่า get คือ ออกมาทั้งหมด
  }
  public function getteacher() // ดึงข้อมูลนักเรียน with teacher คือ เหมือน การ join ตาราง คุณครู
  {
    return  User::with('teacher')->get();
  }
  public function updatestudent(Request $request) // update ข้อมูลนักเรียน  
  {
    $update = $request->all();
    unset($update['stu_id']);
    unset($update['country_4']);
    unset($update['created_at']);
    $update['student_status'] = 1;
    $update['updated_at'] =  date('Y-m-d H:i:s');
    $data =  student::where('stu_id', $request->stu_id)->update($update); // คำว่า  update($update) ข้อมูลจากที่ส่งมา

    $response = [  //ส่งข้อมูลกลับไปยังที่เรียกมา
      'status' => 200,
    ];

    return response()->json($response);
  }
  public function submiteditstudent(Request $request) //บันทึกข้อมูลการแก้ไขนักเรียน-
  {
    $update = $request->all();
    unset($update['stu_id']);
    unset($update['country_4']); //unset คือข้อมูล เอาออกจาก array
    unset($update['created_at']);
    unset($update['student_status']);
    $update['updated_at'] =  date('Y-m-d H:i:s');
    $data =  student::where('stu_id', $request->stu_id)->update($update); // คำว่า  update($update) ข้อมูลจากที่ส่งมา จากการ where stu_id = id ที่ส่งมา
    $response = [ //ส่งข้อมูลกลับไปยังที่เรียกมา
      'status' => 200,
    ];

    return response()->json($response);
  }
  public function logout() //ออกจากระบบ
  {
    Auth::logout(); //ออกจากระบบ  Auth::logout() คือ clear ข้อมูลออก
    return redirect('/'); //กลับไปยังหน้า แรก login
  }
}
