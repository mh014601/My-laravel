<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class HomeLogin
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
        $deny_list = ['Home/Index/login','Home/Index/loginAction'];
        // 如果你访问的路由不在禁止访问的路由数组中,才去验证session
        if( !in_array($request->route()->uri,$deny_list)){
            if(!Session::get('id')){
                return redirect(url('Home/Index/login'));
            }
        }

        return $next($request);
    }
}
