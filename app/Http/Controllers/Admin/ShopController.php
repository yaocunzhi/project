<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Markdown;//导入编辑文档
use Config;
use Intervention\Image\ImageManager;
use DB;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        // 两表联查 获取商品的数据
        $shop=DB::table('shops')->select("cates.id as cid","shops.id as sid","cates.name as cname","shops.name as sname","shops.pic","shops.descr","shops.price","shops.num")->join("cates","shops.cate_id",'=','cates.id')->get();
        return view('Admin.Shops.index',['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $cate=CateController::getCates();
      
        return view('Admin.shops.add',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data=$request->all();
        //上传图片
        if($request->hasFile('pic')) {
            $name=time();
            $ext=$request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move(Config::get('app.app_upload'),$name.".".$ext); 
        }
         
          //封装函数
            $data['name']=$request->input('name');
            $data['cate_id']=$request->input('cate_id');
            $data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
            //通过markdown转化文档为html格式页面
            $data['descr']=Markdown::convertToHtml($request->input('descr'));  
            $data['num']=$request->input('num');
            $data['price']=$request->input('price');
        if (DB::table('shops')->insert($data)) {

            return redirect('/adminshop')->with('success','商品添加成功');
        }else{
            return back()->with('error','添加商品失败');
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
        //echo $id;
        $info=DB::table('shops')->where('id','=',$id)->first();
        $cate=CateController::getCates();
        return view("Admin.Shops.edit",['info'=>$info,'cate'=>$cate]);
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
           //检测是否图片上传
            if ($request->hasFile('pic')) {
                //名字
              $name=time();
              //后缀
              $ext=$request->file('pic')->getClientOriginalExtension();
               //把文件移动到upload下
               $request->file('pic')->move(Config::get('app.app_upload'),$name.".".$ext); 
             }
            //导入数据库
            $data=$request->except(['_token','_method']);
            $data['name']=$request->input('name');
            $data['cate_id']=$request->input('cate_id');
            $data['pic']=trim(Config::get('app.app_upload')."/".$name.".".$ext,".");
            //通过markdown转化文档为html格式页面
            $data['descr']=Markdown::convertToHtml($request->input('descr'));  
            $data['num']=$request->input('num');
            $data['price']=$request->input('price');
          if (DB::table('shops')->where('id','=',$id)->update($data)){
              return redirect('/adminshop')->with('success','商品修改成功');
          }else{
              return back()->with('error','修改商品失败'); 
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
        if(DB::table('shops')->where('id','=',$id)->delete()){

          return redirect('/adminshop')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
          
}
