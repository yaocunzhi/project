<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public static function getCates($pid)
     {   
         //获取数据
         $cate=DB::table('cates')->where('pid','=',$pid)->get();
        
         //遍历数据获取顶级父类把子类写在父类的suv
         foreach ($cate as $key => $value) {
             $value->suv=self::getCates($value->id);
         }
          return $cate;
     }
       
    public function index()
    {    $cate=self::getCates(0);
         //dd($cates);
         //获取顶级分类
         $cates=DB::table('cates')->where('pid','=',0)->get();
         //遍历顶级分类
          foreach ($cates as $row) {
            //把获取到的当前顶级分类下下的书书记奉陪到数组里
           $shop[]=DB::table('shops')->join("cates","shops.cate_id","=","cates.id")->select('cates.name as cname',"cates.id as cid","shops.id as sid","shops.name as sname","shops.pic","shops.descr","shops.num","shops.price")->where("shops.cate_id","=",$row->id)->get();

          }
          //获取友情链接数据
          $link=DB::table('link')->get();
          //获取友情链接数据
          $lunbo=DB::table('lunbo')->get();
          //获取广告图片
          $guang=DB::table('guang')->get();

           //dd($shop);
        return view('Home.Index.index',[
            'cates'=>$cate,
            'shop'=>$shop,
            "link"=>$link,
            "lunbo"=>$lunbo,
            'guang'=>$guang
        ]);

    } 

    //搜素分词
    public function homefen(Request $request)
    {    
        //dd($request->all());
        $name=$request->input('name');
        //dd($name);
        $info[]=DB::table('shops_word')->where('word','=',$name)->get();
        // /dd($info);
         // foreach($info as $row){
         //       //echo $row;
         //    $data1[]=DB::table('shops')->join('shops_word','shops.id','=','shops_word.shops_id')->select('shops.id  as sid','shops_word.id as wid','shops_word.shops_id','shops_word.word','shops.name','shops.pic','shops.descr','shops.num',"shops.price")->get();
         // }
     
       //dd($data1);
        return view("Home.Index.add");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    //加载详情页
        // echo $id;die;
        $info=DB::table('shops')->where('id','=',$id)->first();
        $data=DB::table('order_goods')->where('goods_id','=',$id)->get();
        //dd($data);
        // var_dump($data);die;
        //dd($id);
        // $pinglun = DB::table('pinglun')->where('good_id','=',$id)->get();
        // dd($pinglun);
        //两表联查
        $pinglun[]=array();
        foreach ($data as  $value) {
           $pinglun[]=DB::table('pinglun') ->join('order_goods', 'pinglun.good_id' ,'=', 'order_goods.id')
               ->select('order_goods.id as gid','pinglun.id as pid','pinglun.status','pinglun.detext',"pinglun.good_id")->where('good_id','=',$value->id) ->get();
        }
       
        //dd($pinglun);

        return view("Home.Index.info",['info'=>$info,'data'=>$data,'pinglun'=>$pinglun]);
    }
      
    public function infojian(Request $request)
    {   
         $id=$request->input('id');
         // /dd($id);
          //echo $id;
       $info=DB::table('shops')->where('id','=',$id)->first();
        
        // foreach ($info as $key => $value) {
        //     if ($value.id==$id) {
        //        $data[$key]['num']-=1;
        //       if ($data[$key]['num']<=1){
        //            $data[$key]['num']=1;
        //            }
        //         echo json_encode($data); 
           // }
       // }
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
     //退出
    public function  homelogout(Request $request)
    {
        //销毁session
        $request->session()->pull('email');
         $request->session()->pull('cart');
         $request->session()->pull('goods'); 
        return redirect('/homelogin/create');
    }
   
}
