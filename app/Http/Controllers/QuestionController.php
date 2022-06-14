<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evalution;
use App\indicator;
use App\assessment;
class QuestionController extends Controller
{
     public function  dataquestion()
     {
        return view('question.dataquestion');
     }
     public function dataevalution()
     {
        return  evalution::all();
     }
     public function submiteditevalution(Request $request,$id)
     {
         try{
            
            $evalution =  evalution::where('evalution_id',$id)->first();
            $evalution->evalution_question_form_detail  = $evalution->evalution_question_form_detail;
            $evalution->save();

            return response()->json(200);
         }
         catch(Exception $e)
         {
             return response()->json($e);
         }
     }
     public function datatype()
     {
         return view('question.datatype');
     }
     public function ajaxdatatype()
     {
         return  indicator::with('evaluation')->get();
     }
     public function dataassessment()
     {
         return view('question.dataassessment');
     }
     public function ajaxdataassessment()
     {
        return  assessment::with('indicator')->with('indicator.evaluation')->get();
     }
}
