<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 判断一下当前的路由
//        $deny_list = ['Admin/Index/login','Admin/Index/loginAction'];
//        // 如果你访问的路由不在禁止访问的路由数组中,才去验证session
//        if( !in_array($request->route()->uri,$deny_list)){
//            if(!Session::get('uid')){
//                return redirect(url('Admin/Index/login'));
//            }
//        }
//
//        return $next($request);
    }
}
