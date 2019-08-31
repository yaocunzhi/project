<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=DB::table('role')->get();
        return view('Admin.Role.index',['role'=>$role]);
    }

    public function adminauth($id)
    {
        //分配权限
        //获取角色的信息
        $role=DB::table('role')->where('id','=',$id)->first();
         //获取所有的权限
        $node=DB::table('node')->get();
        //获取当前角色的信息
        $data=DB::table('role_node')->where('rid','=',$id)->get();
        if (count($data)) {
            foreach ($data as $key => $value) {
                 $nids[]=$value->nid;
            }
              return view("Admin.Role.auth",['role'=>$role,'node'=>$node,'nids'=>$nids]);
           }else{

              return view("Admin.Role.auth",['role'=>$role,'node'=>$node,'nids'=>array()]);
              
           }
    }
    public function saveauth(Request $request)
    {
         $rid=$request->input('rid');
         //echo $rid;
         //获取分配的权限
         $nids=$_POST['nids'];
         //删除之前的数据库信息
         DB::table("role_node")->where('rid','=',$rid)->delete();
         foreach ($nids as $key => $value) {
             $data['nid']=$value;
             $data['rid']=$rid;
             DB::table('role_node')->insert($data);

         }
         return  redirect('adminrole')->with('success','分配成功');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     //去除token
         $data=$request->except(['_token']);
         //dd($data);
        if (DB::table('role')->insert($data)) {

            return redirect('/adminrole')->with('success','添加角色成功');
        }else{
            return back()->with('error','添加角色失败');
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
    {    //加载修改页面
         $info=DB::table('role')->where('id','=',$id)->first();                       
         return view('Admin.Role.edit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     //去除token更新数据
         $data=$request->except(['_token','_method']);
          if(DB::table('role')->where('id','=',$id)->update($data)){

            return redirect('/adminrole')->with('success','修改角色成功');

          }else{
            return back()->with('error','修改角色成失败');

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
        //删除角色
       if(DB::table('role')->where('id','=',$id)->delete()){

          return redirect('/adminrole')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
}
