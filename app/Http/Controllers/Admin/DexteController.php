<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dexte;
use Config;//图片目录
use Intervention\Image\ImageManager;
use App\Services\OSS;//阿里云类;
use Illuminate\Support\Facades\Redis;//导入redis缓存服务区的类
use Storge;//七牛云
class DexteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //公告
    public function index()
    {    
         //把数据存储在缓存里
         $arts=[];
         //哈希表 存储列表
         $haskey='Hash:phpDexte';
         //链表 存储id;
         $listkey="list:phpDextelist";
         //判断redis里面有没有缓存
         if(Redis::exists($listkey)){
            //获取缓存服务器的id
            $lists=Redis::lrange($listkey,0,-1);
             //遍历哈希表里的数据显示到redis
             foreach($lists as $key => $value){
               $arts[]=Redis::hgetall($haskey.$value);
             }
         }else{
           $arts=Dexte::get()->toArray();
           //给redis一份遍历数据库数据
           foreach ($arts as $key => $value) {
             //将公告id存在链表里
             Redis::rpush($listkey,$value['id']);
             //将其他的数据库数据名插入到哈希表里
             Redis::hmset($haskey.$value['id'],$value);
           }
         }

        // $data=Dexte::get();
         return view('Admin.Dexte.index',['data'=>$arts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        //加载添加表单
        return view("Admin.Dexte.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
            //检测是否邮件上传
           //  if ($request->hasFile('thumb')) {
           //      //名字
           //    $name=time();
           //    //后缀
           //    $text=$request->file('thumb')->getClientOriginalExtension();
           //     //把文件移动到upload下
           //     $request->file('thumb')->move(Config::get('app.app_upload'),$name.".".$text); 
           //   }
           //   //实例化ImageManager
           //  $manager = new ImageManager();
           //  //做图片裁剪
           //  $manager->make(Config::get('app.app_upload')."/".$name.".".$text)->resize(120,120)->save(Config::get('app.app_upload')."/"."r_".$name.".".$text);
           //    //数据导入库
           //  $data['title']=$request->input('title');
           //  $data['editor']=$request->input('editor');
           //  $data['thumb']=Config::get('app.app_upload')."/"."r_".$name.".".$text;
           //  $data['detext']=$request->input('detext');

           //  if (Dexte::create($data)) {

           //  return redirect('/dexte')->with('success','添加成功');
        
           // }else{
           //  return back()->with('error','添加失败');
           // } 
            //上传到阿里云存储
            //检测是否邮件上传
              if ($request->hasFile('thumb')) {
                //获取零时文件名
                $file=$request->file('thumb');
                //dd($file);
                //名字
              $name=time();
              //后缀
              $ext=$request->file('thumb')->getClientOriginalExtension();
               //把文件移动到upload下
               
             }
              $newfile=$name.".".$ext;

              $filepath=$file->getRealPath();

              OSS::upload($newfile,$filepath);
               //die;
             //实例化ImageManager
            $manager = new ImageManager();
            //做图片裁剪
            $manager->make(env("ALIURl").$newfile)->resize(120,120)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
              //数据导入库
            $data['title']=$request->input('title');
            $data['editor']=$request->input('editor');
            $data['thumb']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,".");
            
            $data['detext']=$request->input('detext');
            $data1=Dexte::create($data);
            $id=$data1->id;
            if ($id) {
              //把需要的数据通过id缓存到redis
              //哈希表名 作用存储数据
               $haskey='Hash:phpDexte';
              //链表 存储id;
                $listkey="list:phpDextelist";
                //存储id
                Redis::rpush($listkey,$id);
                //存储数据
                $data['id']=$id;
                Redis::hmset($haskey.$id,$data);
                return redirect('/dexte')->with('success','添加成功');
        
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
        $info=Dexte::where('id','=',$id)->first();
        return view('admin.Dexte.edit',['info'=>$info]);
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
          if ($request->hasFile('thumb')) {

              $file=$request->file('thumb');
                //名字
              $name=time();
              //后缀
              $ext=$request->file('thumb')->getClientOriginalExtension();
               //把文件移动到upload下
               
              }

              $newfile=$name.".".$ext;
              \Storage::disk('qiniu')->writeStream($newfile, fopen($file->getRealPath(), 'r'));  
              
             //实例化ImageManager
              $manager = new ImageManager();
            //做图片裁剪
            $manager->make(env("QINIU_DOMAIN").$newfile)->resize(120,120)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
              //数据导入库
            $data['title']=$request->input('title');
            $data['editor']=$request->input('editor');
            $data['thumb']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');
            $data['detext']=$request->input('detext');
           
           Dexte::where('id','=',$id)->update($data);
            
        if ($id ) {
            
               //哈希表名 作用存储数据
               $haskey='Hash:phpDexte';
              //链表 存储id;
               
                //存储id
                
                //存储数据
                $data['id']=$id;
                Redis::hmset($haskey.$id,$data); 
            return redirect('/dexte')->with('success','修改成功');
            
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
        
    }
    public function del(Request $request)
    {
      //echo 'ssss';
      $arr=$request->input('arr');
      if ($arr=="") {
          echo '请选择一条数据删除';die;
      }
        //echo json_encode($arr);
      foreach ($arr as $key => $value) {
      Dexte::where('id','=',$value)->delete();
           //哈希表名 作用存储数据
          $haskey='Hash:phpDexte';
           //链表 存储id;
          $listkey="list:phpDextelist";
          //删除id
          Redis::lrem($listkey,1,$value);
          //删除哈希表de数据
          Redis::del($haskey.$value);
          
       }
       echo 1;
    }
}
