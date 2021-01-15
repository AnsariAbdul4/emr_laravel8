<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Login;

use Validator;

class Login_controller extends Controller
{
  //
  function login(Request $r){
  
    $r->validate([
      'email' => 'email|required',
      'password' => 'required|min:3'
    ]);
    
    $email = $r->input('email');
    $password = sha1(md5($r->input('password')));
    $user = Login::where(['email' => $email, 'password' => $password])->first();  
    if($user){
      if($user->active == 1){
        $data = [
          'user_id' => $user->user_id,
          'role_id' => $user->role_id,                    
          'logged_in_time' => date('h:i:s A'),
          'last_login' => date('h:i:s A') // date('d M Y',strtotime($this->Users_model->getLastLogin($user->user_id))) 
        ];
        $user_id = $user->user_id;
        $user_detail = Login::where(['user_id' => $user_id])->get()->toArray();
        $user_detail = $user_detail[0];
        $user_detail = (object) $user_detail;
        $r->session()->put(
          [
            'user_data' => $data, 
            'user_details' => $user_detail
          ]
        );
        return redirect('dashbord');
      }else{
        $r->session()->flash('error', 'Account is deactivated.');
        return redirect('/');
      }
    }else{
      $r->session()->flash('error', 'user name or password is invalid.');
      return redirect('/');
    }
  }

  function dashbord(){
    return view('dashbord');
  }
}
