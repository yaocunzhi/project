<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use DB;
class GuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $map = DB::table("guang")->get();
        return view("Admin.Guang.index",['map'=>$map]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加
        return view("Admin.Guang.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->hasFile("pic")){
            //名字
            $name=time();

            $ext=$request->file("pic")->getClientOriginalExtension();

            //把文件移动到upload下
            $request->file("pic")->move(Config::get('app.app_upload'),$name.".".$ext);
        }else{
            return back()->with("error","没有上传文件");
        }

        $data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");

        $data['text']=$request->input("text");
        
        if(DB::table("guang")->insert($data)){
            return redirect("/guang")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败");
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
        $info=DB::table("guang")->where('id','=',$id)->first();
        //dd($info);
       return view("Admin.Guang.edit",['info'=>$info]);
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
        if($request->hasFile("pic")){
            //名字
            $name=time();

            $ext=$request->file("pic")->getClientOriginalExtension();

            //把文件移动到upload下
            $request->file("pic")->move(Config::get('app.app_upload'),$name.".".$ext);
        }else{
            return back()->with("error","没有上传文件");
        }

           $data=$request->except(['_token','_method']);
           $data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
           $data['text']=$request->input('text');
          if (DB::table('guang')->insert($data)) {
             
            return redirect('/guang')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        if(DB::table('guang')->where('id','=',$id)->delete()){

          return redirect('/guang')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
}
