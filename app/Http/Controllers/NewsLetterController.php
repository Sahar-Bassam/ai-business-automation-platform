<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
   public function index(){
    return view('index');
   }

   public function sub(Request $request){
   $request->validate ([
    'email'=>'required|unique:newsletter,email'
   ]);
   event(new UserSubscribed($request->email));
   return 'Successful ops';
   }
}
