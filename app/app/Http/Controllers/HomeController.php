<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role ==1){
            return view('house.main');
        }
        elseif(Auth::user()->role ==2){
            return view('guest.main');
        }
        else{
            return view();
        }

    }
    public function getMypage()
    {
        if(Auth::user()->role ==1){
            return view('house.mypage');
        }
        elseif(Auth::user()->role ==2){
            return view('guest.mypage');
        }
        else{
            return view();
        }

    }
    
    

    
   
    
}
