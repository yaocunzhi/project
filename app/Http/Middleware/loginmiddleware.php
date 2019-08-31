<?php

namespace App\Http\Middleware;

use Closure;

class loginmiddleware
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
        //中间件做数据的过滤
        //检测是否具有用户登陆的sessionid
        if($request->session()->has('email')){
            //执行下一个请求
            return $next($request);
        }else{
            //跳转到登录页面;
            return redirect('/homelogin/create');
        }
        
    }
}
