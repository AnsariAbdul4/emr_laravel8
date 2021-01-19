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
        $user_id = $user->user_id;
        $user_detail = Login::where(['user_id' => $user_id])->get()->toArray();
        $user_detail = $user_detail[0];
        $user_detail = (object) $user_detail;
        $data = [
          'user_id' => $user->user_id,
          'role_id' => $user->role_id,                    
          'logged_in_time' => date('h:i:s A'),
          'last_login' => date('d M Y',strtotime($user_detail->last_login))  // date('d M Y',strtotime($this->Users_model->getLastLogin($user->user_id))) 
        ];
        $r->session()->put(
          [
            'user_data' => $data, 
            'user_details' => $user_detail
          ]
        );
        $user = Login::where('user_id', $user->user_id)->update(['last_login' => date('Y-m-d')]);
        return redirect('dashboard');
      }else{
        $r->session()->flash('error', 'Account is deactivated.');
        return redirect('/');
      }
    }else{
      $r->session()->flash('error', 'user name or password is invalid.');
      return redirect('/');
    }
  }

  function dashboard(){
    return view('dashboard');
  }

  function logout(){
    if(session()->has('user_data')){
      session()->pull('user_data', null);
    }
    if(session()->has('user_details')){
      session()->pull('user_details', null);
    }
    return redirect('/');
  }
}
