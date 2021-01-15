<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_controller;


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

Route::view('/','login');
Route::post('/', [Login_controller::class, 'login']);
Route::group(['middleware' => ['islogin']], function(){
  Route::get('/dashbord',[Login_controller::class, 'dashbord']);
});