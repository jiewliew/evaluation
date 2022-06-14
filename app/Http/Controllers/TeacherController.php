<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\teacher;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function teacher()
    {
        return view('teacher.index');
    }
    public function datateacher()
    {
        return User::with('teacher')->get(); //with คือ joint
    }
    public function submitcreateteacher(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            unset($data['password']);
            $user  = [];
            $user['name'] = $request->teacher_name;
            $user['email'] = $request->teacher_email;
            $user['created_at'] = date('Y-m-d H:i:s');
            $user['password'] = Hash::make($request->password);
            $user_id =  User::insertGetId($user);
            $data['user_id'] = $user_id;
            $data['created_at'] = date('Y-m-d H:i:s');
            teacher::create($data);
            $response = [
                'status' => 200,
            ];
            DB::commit();
            return response()->json($response);
        } catch (Throwable $e) {
            $response = [
                'status' => 500,
                'msg'=>$e->getMessage(),
            ];
            DB::rollback();
            return response()->json($response);
        }
    }
   public function submiteditteacher(Request $request)
   {
    DB::beginTransaction();
    $data = $request->all();
    try {
       $user =  User::find($data['id']);
       $user->email = $data['teacher_email'];
       $user->name  = $data['teacher_name'];
       if(isset($data['password'])!='')
       {
        $user->password =  Hash::make($data['password']);
       }
       $user->save();

       unset($data['id']);
       unset($data['password']);
       $data['id']  = $data['teacher_id'];
       unset($data['teacher_id']);
       $user =  teacher::find($data['id'])->update($data);
       $response = [
        'status' => 200,
    ];
      DB::commit();
    return response()->json($response);
       }
       catch (Throwable $e) {
        $response = [
            'status' => 500,
            'msg'=>$e->getMessage(),
        ];
        DB::rollback();
        return response()->json($response);
    }
       
   }
    
}
