<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
  //导入调用的模型类
use  App\Model\User;
//导入校验类
use App\Http\Requests\Requests\UserInsert;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //显示会员模型
        // $k=$request->input('key');
        // // dd($k);
        // $user=User::where('uname','like','%'.$k."%")->paginate(2);
        // 获取总的条数
        $count=user::count();
        //每页显示几条
        $rev=3;
        //获取最大页
        $maxpage=ceil($count/$rev);
        // 循环页数
        for($i=1;$i<=$maxpage;$i++){
            $pp[$i]=$i;
        }
        //dd($pp);
        //echo 'ok';
        //获取当前页面
        $page = $request->input('page');
        //dd($page);
        //判断当前页面为普通页面的数据
        if(empty($page)){
            $page=1;
        }  

        //获取偏移量
        $offset=($page-1)*$rev;
         //获取当前页面的数据
        //$sql ="select * from user limit 0,3";
        //$data = DB::select($sql);
          $data=user::offset($offset)->limit($rev)->get();
         // dd($ata);
        //ajax()如果请求返回的是true,否则就返回false;
        if($request->ajax()){
             return view("Admin.user.page",['data'=>$data]);
        }
       return view("Admin.User.index",['pp'=>$pp,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
          //添加会员模型
         return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsert $request)
    {     
         //加载添加会员模型
         //去除token
         $data=$request->except(['_token']);
        //密码加密
         $data['password']=Hash::make($data['password']);

         $data['status']=1;//开启

         if (User::create($data)) {

             return redirect('/user')->with('success','添加成功');
         }else{
             return redirect('/user')->with('error','添加失败');

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
        
       $info=User::where('id','=',$id)->first();
        return view("Admin.User.edit",['info'=>$info]); 
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
         $data=$request->except('_token','_method');
         if (User::where('id','=',$id)->update($data)) {
             return redirect('/user')->with('success','修改会员模型成功');
         }else{
             return redirect('/user')->with('error','修改会员模型失败');

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
        //echo $id;
        if (User::where('id','=',$id)->delete()) {

         return redirect('/user')->with('success','删除会员模型成功');
            
        }else{
         return redirect('/user')->with('error','删除会员模型失败');

        }

    }
    public function userinfo($id){
        //会员详情
      $info = User::find($id)->info;
       return view("Admin.User.info",['info'=>$info]);
    }
    public function useradd($id){
       $useradd=User::find($id)->useradd;
      return view("Admin.User.useradd",['useradd'=>$useradd]);
    }
}
