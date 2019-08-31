<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //后台分类
    public static function getCates()
    {
         $cate=DB::table('cates')->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy('paths')->get();
         foreach($cate as $key=>$value){
            //echo $value->path."<br>";
            //把字符串转换为数组
            $arry=explode(',',$value->path);
             //var_dump($arry);
            //获取逗号个数
            $leng=count($arry)-1;
           
            //重复字符串
            $cate[$key]->name=str_repeat("--|",$leng).$value->name;
            
        }
        return $cate;
    }
    public function index(Request $request)
    {   //查询获取数据分配数据
         // $cate=DB::table('Cates')->get();
         //$cate=DB::select("SELECT *,concat(path,',',id)as paths FROM 'cates' order by path")
         //sql转换为连贯方法
         $k=$request->input('key');
         $cate=DB::table('cates')->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy('paths')->where('name','like','%'.$k."%")->paginate(3);
         foreach($cate as $key=>$value){
            //echo $value->path."<br>";
            //把字符串转换为数组
            $arry=explode(',',$value->path);
             //var_dump($arry);
            //获取逗号个数
            $leng=count($arry)-1;
           
            //重复字符串
            $cate[$key]->name=str_repeat("--|",$leng).$value->name;
            
        }
         //  dd($cate);
        return view("Admin.Cates.index",['cate'=>$cate,'request'=>$request->all(),"k"=>$k]);
        //遍历 分隔符

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "zheshi gaenole ";
        //添加表单
        //获取所有的数据并且分配
        // $cate=DB::table('cates')->get();
        //优化添加
        $cates=self::getCates();

        return view("Admin.Cates.create",['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
       
        $data=$request->except(['_token']);
        //h获取pid并且做出判断
        $pid=$request->input('pid');
        if($pid==0) {
            //如果pid等于0那就是父类分类
            $data['path']='0';
        }else{
           //  如果不等于就添加子类
           //  拼接父类的path 获取父类的id
           
           $info=DB::table('cates')->where('id','=',$pid)->first();
           $data['path']=$info->path.','.$info->id;
          
        }
        if (DB::table('cates')->insert($data)) {
             return redirect('/admincate')->with('success','添加成功');
        }else{
              return back()->with('error','修改失败');
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
         $info=DB::table('cates')->where('id','=',$id)->first();
         return view('Admin.Cates.edit',['info'=>$info]);
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
         $data=$request->except(['_token','_method']);
         //dd($data);
         if (DB::table('cates')->where('id','=',$id)->update($data)) {
            return redirect('/admincate')->with('success','修改成功');
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
        //获取父类下的子类个个数并做出判断父类父类下面有没有子类
        $cate=DB::table('cates')->where('pid','=',$id)->count();
        if($cate>0){
            return redirect('/admincate')->with('error','请您先删除下面的商品');
        }
        if (DB::table('cates')->where('id','=',$id)->delete()) {

            return redirect('admincate')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
