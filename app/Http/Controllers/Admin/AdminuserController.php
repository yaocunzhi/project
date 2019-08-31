<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入哈希类
use Hash;
//导入数据库
use DB;
//导入校验类
use App\Http\Requests\Requests\AdminuserInsert;
//导入model类
use App\Models\Admin;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //管理员列表
    public function index(Request $request)
    {     //显示列表
        $k=$request->input('keywords');

        $users=DB::table('admin_users')->where('name','like','%'.$k.'%')->paginate(2);

        return view("Admin.Adminuser.index",['users'=>$users,'request'=>$request->all(),'k'=>$k]);
    }

    public function userrole($id)
     {   
        //查找管理员的信息
        $info=DB::table('admin_users')->where('id','=',$id)->first();
         //获取所有角色的信息
        $role=DB::table('role')->get();
         //获取当前用户的角色信息
        $data=DB::table('user_role')->where('uid','=',$id)->get();
        if (count($data)) {
            foreach ($data as $key => $value) {
                //$ris是登录角色的所有数据
              $rids[]=$value->rid;

            }

            return view('Admin.Adminuser.userrole',['info'=>$info,'role'=>$role,'rids'=>$rids]);
        }else{

             return view('Admin.Adminuser.userrole',['info'=>$info,'role'=>$role,'rids'=>array()]);
        }

        
     }
      
     public function saverole(Request $request)
     {
        //把选择的数据查到user_role保存角色
        $uid=$request->input('uid');
        //dd($uid);
        //获取分配的角色
        $rids=$_POST['rids'];
         // /var_dump($rids);
        //把当前的的角色信息删除掉
        //循环入库
        DB::table('user_role')->where('uid','=',$uid)->delete();
        foreach ($rids as $key => $value) {
            $data['uid']=$uid;
            $data['rid']=$value;
            DB::table('user_role')->insert($data);
        }
            return redirect('/adminuser')->with('success','分配角色成功');

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //加载表单
        return view('Admin.Adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserInsert $request)
    {   //加载显示表单
        //去掉_token 去掉重复密码
        $data=$request->except(['_token','repassword']);
        //给密码加密
        $data['password']=Hash::make($data['password']);
        //开启状态
        $data['status']=0;
        //判断并添加到数据库
        if (Admin::create($data)){
            return redirect('/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
    {      //加载修改表单
           $info=DB::table('admin_users')->where('id','=',$id)->first();

           return view('Admin.Adminuser.edit',['info'=>$info]);
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
        //做出判断并且导入数据库
        //去除_token _method
         $data=$request->except(['_token','_method']);
         if (DB::table('admin_users')->where('id','=',$id)->update($data)) {

            return redirect('adminuser')->with('success','修改成功');
             
         }else{
            return back()->with('error','修改失败'); 
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除管理员
        if(DB::table('admin_users')->where('id','=',$id)->delete()){

            return redirect('adminuser')->with('success','删除成功');

        }else{
            return back()->with('error','删除失败');
        }
    }   
}
