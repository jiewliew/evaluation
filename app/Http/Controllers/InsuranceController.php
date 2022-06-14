<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\insurance;
use App\indicator;
use App\Question;
use App\student;
use App\evalution;
use App\assessment;
use App\insurance_order;
use App\insurance_order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;


class InsuranceController extends Controller
{
    public function insurance()
    {
        return view('insurance.index');
    }
    public function getdataquestion(request $request)
    {
        $checkdata =   insurance_order::where('stu_id', $request->stu_id)->where('year', $request->year)->where('evalution_id', $request->evalution_id)->count();
        $id = $request->evalution_id;
        if ($checkdata > 0) {
            $res = [];
            return response()->json($res);
        }
        $data =   assessment::whereHas('indicator', function ($query) use ($id) {
            return $query->where('evalution_id', '=', $id);
        })->with('indicator')->get();


        foreach ($data  as $key => $datas) {
            $res[$key] = [];
            $res[$key]['key'] = $key + 1;
            $res[$key]['Indicator_id'] =  $datas['indicator']['id'];
            $res[$key]['detail_indicator'] =  $datas['indicator']['detail'];
            $res[$key]['detail'] =  $datas['detail'];
            $res[$key]['id'] =  $datas['id'];
            $res[$key]['actions'] =  $datas['id'];
        }
        return response()->json($res);
    }
    public function saveinsurance(request $request)
    {
        $data =  $request->all();
        DB::beginTransaction();
        try {
            $insurance_order_id =  insurance_order::insertGetId([
                'stu_id' => $data['stu_id'],
                'evalution_id' => $data['evalution_id'],
                'year' => $data['year'],
                'status' => 'ประเมินแล้ว',
                'created_at' => date('Y-m-d H:i:s'),
                'teacher_id'=>Auth::id(),
            ]);
            foreach ($data['data'] as $key => $value) {
                insurance_order_detail::create([
                    'insurance_id' => $insurance_order_id,
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
                'status' => 200,
                'msg' => $e,
            ];
            return response()->json($response);
        }
    }
    public function datainsurance()
    {
        return view('insurance.data');
    }
    public function getdataorder(Request $request)
    {
        $data =insurance_order::where('evalution_id',$request->get('evalution_id'))
        ->where('stu_id',$request->stu_id)->where('year',$request->year)->first();

        if(!empty($data))
        {
           $register_order_detail =  insurance_order_detail::where('insurance_id',$data->id)->with('question')->with('question.indicator')->get();
           
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
    public function submitedittypequestion(Request $request,$id)
    {
        try{
           
            $indicator =  indicator::where('id',$id)->first();
            $indicator->detail  = $request->detail;
            // $indicator->evalution_id  = $request->evalution_id;
           
            $indicator->save();

            return response()->json(200);
         }
         catch(Exception $e)
         {
             return response()->json($e);
         }
    }
    public function submiteditdata(Request $request,$id)
    {
        try{
           
            $assessment =  assessment::where('id',$id)->first();
            $assessment->detail  = $request->detail;
            // $indicator->evalution_id  = $request->evalution_id;
            $assessment->save();
            return response()->json(200);
         }
         catch(Exception $e)
         {
             return response()->json($e);
         }
    }
    public function studentme()
    {
        return view('studentme');
    }
    public function datastudentme()
    {
        return   student::where('student_status',1)->where('teacher_id',Auth::id())->get();
    }
}
