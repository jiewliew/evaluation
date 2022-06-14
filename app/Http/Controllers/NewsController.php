<?php
namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use Throwable;
use App\User;
use App\teacher;

class NewsController extends Controller
{
    public function news(){
        return view('news.news');
    }
    public function datanews()
    {
        //return News::all()->get(); 
        return news::all();
    }
    public function submitcreatenews(Request $request){
        // $response = [  //ส่งข้อมูลกลับไปยังที่เรียกมา
        //     'status' => 500,
        //     'msg' => $request->detail
        //   ];
      
        // return response()->json($response);
        try{
            News::create([
                'topic' => $request->topic,
                'detail' => $request->detail,
                'pic' => '',
                //'updated_at' => date('d-m-Y'),
                //'created_at' => date('d-m-Y')
            ]);
            // $this->validate($request,['topic' => 'required', 'detial' => 'required']);
            // $user = new User(['topic' => $request->get('topic'),'detial' => $request->get('detial')]);
            // $user->save();
            
            $response = [  //ส่งข้อมูลกลับไปยังที่เรียกมา
                'status' => 200,
              ];
          
            return response()->json($response);
        }catch(Throwable $e){
            $response = [  //ส่งข้อมูลกลับไปยังที่เรียกมา
                'status' => 500,
                'msg' => $e
              ];
          
            return response()->json($response);
        } 
    }
    public function submiteditnews(Request $request)
    {
        $update = $request->all();
        unset($update['']);
        unset($update['']);
    }
}
