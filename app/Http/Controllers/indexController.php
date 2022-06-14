<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    //index คือชื่อคลาส
    public function index(){
        // return view('index',['name'=>'Nadaporn']);
    }
    public function home(){
        return view('fontend.home');
    }

    public function news1(){
        return view('fontend.news1');
    }

    public function newsdetail(){
        return view('fontend.newsdetail');
    }

    public function about(){
        return view('fontend.about');
    }
}
