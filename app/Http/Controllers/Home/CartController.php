<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cart=session('cart');
        //dd($cart);
       //统计总金额
        $tot=0;
        //统计总的件数
        $sum=0;
       $data1=array();
      if(is_array($cart)){
       //遍历数据
       foreach($cart as $key=>$value){
        //获取商品信息
        $info=DB::table('shops')->where('id','=',$value['id'])->first();

        $data['id']=$value['id'];//id
        $data['num']=$value['num'];//数量
        $data['name']=$info->name;//名字
        $data['price']=$info->price;//商品价格
        $data['pic']=$info->pic;//图片
        $data['descr']=$info->descr;
         $tot+=$data['num']*$data['price'];
         $sum+=$data['num'];
         $data1[]=$data;
       }
       // dd($data1);
     }
       //加载模板
       return view('Home.Cart.index',['data'=>$data1,"sum"=>$sum,'tot'=>$tot]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //去重复购物车
    public function checkExists($id)
    {
       $goods=session('cart');
       //判断购物车里有没有购买的数据
       if (empty($goods)) return false;

       foreach($goods as $k=>$v){
          if($v['id']==$id){
            //购物车里有购买的商品
             return  true;
          }
       }      


    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //把商品添加到一组session数组里
        $data=$request->except(['_token']);
        if(!$this->checkExists($data['id'])){

        $request->session()->push('cart',$data);
        
       }
       return redirect('/homecart');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //获取sessio里面的数据
        $cart=session('cart');
        //遍历
        foreach ($cart as $key => $value) {
            if ($value['id']==$id) {

             //删除当前商品的数据
             unset($cart[$key]);
            }
        }
        //重新赋值session
        session(['cart'=>$cart]);
        return redirect("/homecart");
    }
    //全部删除
    public function alldelete(Request $request)
    {   
        $request->session()->pull('cart');
        return redirect('/homecart');
    }
    public function cartupdatee(Request $request)
    {      
          $id=$request->input('id');

          $info=DB::table('shops')->where('id','=',$id)->first();
          
          //获取sessio里面的数据
          $data=session('cart');
          foreach($data as $key => $value) {
              if ($value['id']==$id) {
                   //每次点击数量检疫
                 $data[$key]['num']-=1;
                   if ($data[$key]['num']<=1){
                       $data[$key]['num']=1;
                   }
                session(['cart'=>$data]);
               //echo $data[$key]['num'];
               $data1['num']=$data[$key]['num'];
               $data1['tot']=$data[$key]['num']*$info->price;
               echo json_encode($data1);
              }

         }
          
    }
     public function cartupdate(Request $request)
    {      
          $id=$request->input('id');
          $info=DB::table('shops')->where('id','=',$id)->first();
          //echo $id;
          //获取sessio里面的数据
          $data=session('cart');
          foreach($data as $key => $value) {
              if ($value['id']==$id) {
                   //每次点击数量检疫
                 $data[$key]['num']+=1;
                   if ($data[$key]['num']>=$info->num){
                       $data[$key]['num']=$info->num;
                   }
                session(['cart'=>$data]);
               //echo $data[$key]['num'];
               $data1['num']=$data[$key]['num'];
               $data1['tot']=$data[$key]['num']*$info->price;
               echo json_encode($data1);
              }

         }
          
    }
    //计算商品的总件数和总价钱
    public function carttot()
    {
        
      //判断是否有值
    if(isset($_GET['arr'])){
       //总金额
       $sum=0;
       //总件数
      $nums=0;

       //遍历循环 $value 选中的id
       foreach($_GET['arr'] as $value){
         $data=session('cart');
         //遍历
         foreach ($data as $k => $v) {
             if ($v['id']==$value) {
                 //获取单价数量和数量
                $num=$data[$k]['num'];
                //获取商品数据
                $info=DB::table("shops")->where('id','=',$value)->first();
                //获取单价
                $price=$info->price;

                 $tot=$num*$price;
                 //
                 $sum+=$tot;
                 //总件数
                 $nums+=$num;

             }
         }
       }
        $data2['nums']=$nums;
        $data2['sum']=$sum;
      echo json_encode($data2);
    }else{
       //如果没有商品交给总金额和总件数为0
       $data2['nums']=0;
       $data2['sum']=0;
       echo json_encode($data2);
    }
  }
  
}
