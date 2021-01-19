<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_controller;
use App\Http\Controllers\user_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
  Route::get('/', function () {
    return view('welcome');
  });
*/

// Route::view('/','login');
Route::get('/', function(){
  if(session()->has('user_data')){
    return redirect('/dashboard');
  }
  return view('login');
});
Route::post('/', [Login_controller::class, 'login']);
Route::group(['middleware' => ['islogin']], function(){
  Route::get('/dashboard',[Login_controller::class, 'user.dashboard']);
  Route::get('/logout', [Login_controller::class, 'logout']);
  Route::get('/profile', [user_controller::class, 'profile']);
  Route::get('user/profile/{id}', [user_controller::class, 'showprofile']);
});