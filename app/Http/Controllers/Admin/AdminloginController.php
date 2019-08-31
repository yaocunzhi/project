<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //后台登录
    public function index(Request $request)
    {    
       //退出销毁session
       $request->session()->pull('adminname');

        return redirect('/adminlogin/create');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    //加载登录页面
       return view("Admin.adminlogin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //获取管理员的名字
        $name=$request->input('name');
        $password=$request->input('password');
        //检测管理员名字
        $info=DB::table('admin_users')->where('name','=',$name)->first();
          // dd($info);
        if ($info) {
              //echo 'ok';
            if (Hash::check($password,$info->password)) {
                 //echo 'ok';
                 //设置管理员的session
                 session(['adminname'=>$name]);

                 //获取后台的所有的权限信息                      
                $list=DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                 // dd($list);
                 // 初始化权限 让大家都有进首页的权限
                 $nodelist['AdminController'][]='index';

                 foreach ($list as $key => $value) {
                     //把当前用户写到$nodelise里面
                     $nodelist[$value->mname][]=$value->aname;
                     if ($value->aname=='create') {
                        //如果用create里面添加storo方法
                         $nodelist[$value->mname][]='store';
                     }
                     if ($value->aname=='edit') {

                          $nodelist[$value->mname][]='update';
                     }

                 }
                 //dd($nodelist);
                 // /把当前的管理员权限写入session
                 session(['nodelist'=>$nodelist]);
                return redirect('/admin')->with('success','登录成功');
            }else{

            return back()->with('error','密码错误');

            }
        }else{
             return back()->with('error','管理员不存在');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
