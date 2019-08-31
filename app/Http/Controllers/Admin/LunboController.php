<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
//轮播图管理
class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $data=DB::table('lunbo')->get();
        return view("Admin.Lun.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Lun.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     //判断是否有哦图片上传
         if ($request->hasFile('img')) {
                //名字
            $name=time();
              //后缀
            $ext=$request->file('img')->getClientOriginalExtension();
               //把文件移动到upload下
            $request->file('img')->move(Config::get('app.app_upload'),$name.".".$ext,'.'); 
             }
           $data=$request->except(['_token']);
           $data['img']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
           $data['title']=$request->input('title');
          if (DB::table('lunbo')->insert($data)) {
             
            return redirect('/adminlunbo')->with('success','添加成功');
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
    {  
        $info=DB::table('lunbo')->where('id','=',$id)->first();
        return view("Admin.Lun.edit",['info'=>$info]);
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
        if ($request->hasFile('img')) {
                //名字
            $name=time();
              //后缀
            $ext=$request->file('img')->getClientOriginalExtension();
               //把文件移动到upload下
            $request->file('img')->move(Config::get('app.app_upload'),$name.".".$ext); 
             }
       // dd($request->all());
       $data=$request->except(['_token','_method']);
       $data['img']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
       $data['title']=$request->input('title');
       if (DB::table('lunbo')->where('id','=',$id)->update($data)){
              return redirect('/adminlunbo')->with('success','修改成功');
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
        if(DB::table('lunbo')->where('id','=',$id)->delete()){

          return redirect('/adminlunbo')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
}
