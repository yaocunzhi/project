<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use DB;
use Hash;
use App\Http\Requests\Requests\YonghuInsert;
class YonghuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
          $k=$request->input('keywords');
          $yonghu=DB::table('laravel')->where("uname",'like','%'.$k.'%')->paginate(2);

         return view("Admin.Yonghu.index",['yonghu'=>$yonghu,'request'=>$request->all(),'k'=>$k]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     //添加用户
         return view("Admin.Yonghu.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YonghuInsert $request)
    {
        //dd($request->all());
        //导入数据库
        //去除多余的参数
        $data=$request->except(['_token','repassword']);
        //dd($data);
        //哈希密码
        $data['password']=Hash::make($data['password']);

        if (DB::table('laravel')->insert($data)) {

          return redirect("yonghu")->with("success","添加用户成功");

        }else{

            return back();
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
        //修改表单
       $info=DB::table('laravel')->where('id','=',$id)->first();
       return view('Admin.Yonghu.edit',['info'=>$info]);
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
        //$data1=$request->all();
        //dd($data1);
        $data1=$request->except(['_token','_method']);
         //dd($data1);
        if (DB::table('laravel')->where('id','=',$id)->update($data1)) {
            return redirect('/yonghu')->with('success','修改成功');
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
        if (DB::table('laravel')->where('id',"=",$id)->delete()) {
            return redirect('/yonghu')->with('success','删除成功');
        }
    }
}
