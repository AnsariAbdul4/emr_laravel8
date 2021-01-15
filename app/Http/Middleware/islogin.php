<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class islogin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if(session('user_data') === null || session('user_data')['user_id'] < 0){
      return redirect('/');
    }
    
    return $next($request);
  }
}
