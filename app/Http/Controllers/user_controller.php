<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_controller extends Controller
{
    // 
    function  profile(){
        $user = session('user_details');
        return view('user.myprofile',['user' => $user]);
    }

    function showprofile($user_id){
        
    }
}
