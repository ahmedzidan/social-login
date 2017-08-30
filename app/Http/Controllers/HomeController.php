<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
   public function index(){
       return view('home.dashboard');
   }
   
   public function logout(Request $request){
       $request->session()->flush();
       return redirect()->to('/');
   }
}