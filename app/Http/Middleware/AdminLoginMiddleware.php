<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
    //检测后台登录是否有session adminname 登录 
         if($request->session()->has('adminname')){
              //把访问模块的控制器和方法直接和权限列表做对比
               $nodelist=session('nodelist');
               $actions=explode('\\', \Route::current()->getActionName());
              //或$actions=explode('\\', \Route::currentRouteAction());
               $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
               $func=explode('@', $actions[count($actions)-1]);
               $controllerName=$func[0];
               $actionName=$func[1];
             // echo $controllerName.":".$actionName;
             //权限作对比
              //访问模块控制器不存在或者访问模块控制器存在但是方法不存在
              // if (empty($nodelist[$controllerName])||!in_array($actionName,$nodelist[$controllerName])) {
              //     return redirect("/admin")->with("error","很抱歉,您没有权限访问该模块,如要访问请联系超级管理员");
              // }
             //如果有就继续请求下一个
              return $next($request);
         }else{
            //如果没有就跳到登录页面
            return redirect('/adminlogin/create');
        }
        

    }
}
