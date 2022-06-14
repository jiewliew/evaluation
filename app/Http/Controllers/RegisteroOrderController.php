<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\insurance;
use App\indicator;
use App\Question;
use App\students;
use App\evalution;
use App\assessment;
use App\insurance_order;
use App\insurance_order_detail;
use App\register_order;
use App\register_order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
class RegisteroOrderController extends Controller
{
    public function saveregisterorder(request $request)
    {
        $data =  $request->all();
     
        DB::beginTransaction();
        try {
            $register_order_id =  register_order::insertGetId([
                'stu_id' => $data['stu_id'],
                'evalution_id' => $data['evalution_id'],
                'status' => 'ประเมินแล้ว',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            foreach ($data['data'] as $key => $value) {
                register_order_detail::create([
                    'register_order_id' => $register_order_id,
                    'evalution_id' => $data['evalution_id'],
                    'question_id' => $value['id'],
                    'action' => $value['action'],
                    'status' => 'บันทึกแล้ว',
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $response = [
                'status' => 200,
                'msg' => 'บันทักข้อมูลสำเร็จ',
            ];
            DB::commit();

            return response()->json($response);
        } catch (Throwable $e) {
            DB::rollback();
            $response = [
                'status' => 401,
                'msg' => $e,
            ];
            return response()->json($response);
        }
    }
    public function getorder(Request $request)
    {
        $data =register_order::where('evalution_id',$request->get('evalution_id'))
        ->where('stu_id',$request->stu_id)->first();

        if(!empty($data))
        {
           $register_order_detail =  register_order_detail::where('register_order_id',$data->id)->with('question')->with('question.indicator')->get();
           
           foreach($register_order_detail as $key =>$value)
           {
            $res[$key] = [];
            $res[$key]['id'] =$value['question']['id'];
            $res[$key]['key'] = $key + 1;
            $res[$key]['Indicator_id'] =  $value['question']['indicator']['id'];
            $res[$key]['detail_indicator'] =  $value['question']['indicator']['detail'];
            $res[$key]['detail'] =  $value->question->detail;
            $res[$key]['action'] =  $value->action;
           }

           return response()->json($res);
        }
    }
}
