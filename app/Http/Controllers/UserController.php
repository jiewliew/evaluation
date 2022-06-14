<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\student;
class UserController extends Controller
{
    use AuthenticatesUsers;
    public function login()
    {
      
    return view('login');

    }
    public function submitlogin(Request $request)
     {
        if(Auth::attempt(array('email' => $request->input('email'), 'password' => $request->input('password')))){
          return   redirect()->route('student');
     }
    else{
      return   redirect()->back();
    }
  }
}
