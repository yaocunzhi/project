<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //结算 把勾选的商品存储在session里用来做遍历
    public function jiesuan(Request $request)
    {   
        $arr=$_GET['arr'];
        $data=array();
        foreach ($arr as $key => $value) {
             $cart=session('cart');
             foreach ($cart as $k => $v) {
                 if ($value==$v['id']) {
                     //数量和id存储在$data数组里
                     $data[$k]['num']=$cart[$k]['num'];
                      $data[$k]['id']=$value;
                 }
             }
         } 
          //把数据存储到新的session里
          $request->session()->push('goods',$data);
          echo json_encode($data);

    }
    public function inster()
    {
           //var_dump(session('goods'));
          //获取勾选的商品
          $goods=session('goods');
          $d=[];
          $tot=0;
          foreach($goods[0] as $key=>$value){
            $shop=DB::table("shops")->where('id','=',$value['id'])->first();
            $temp['num']=$value['num'];
            $temp['price']=$shop->price;
            $temp['name']=$shop->name;
            $temp['pic']=$shop->pic;
            $tot+=$value['num']*$shop->price;
            $d[]=$temp;

          }
          //获取当前用户的所有地址
          $address=AddressController::alladdress(session('user_id'));
          //获取一条数据
          $ress=DB::table("address")->where('user_id','=',session('user_id'))->first();
         //  echo "这是结算页面";
         //dd($ress);
          return view('home.Order.inster',['d'=>$d,'tot'=>$tot,'address'=>$address,'ress'=>$ress]);
    }
    public function index()
    {  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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

    public function ordercreate(Request $request)
    {
        $data=$request->except(['_token']);
        $data['order_num']=time()+rand(1,10000);//订单编号
        $data['user_id']=session('user_id');//用户的id
        $data['status']=0;
        //订单表入库
        $id=DB::table('orders')->insertGetId($data);
        if ($id) {
            //订单详情表入库
            //获取购买的商品
            $goods=session('goods');
             $d=[];//存储数据
             $tot=0;//订单的总金额
            //获取商品数据
            foreach($goods[0] as $key=>$value){
                $info=DB::table('shops')->where('id','=',$value['id'])->first();
                $data1['order_id']=$id;//订单的id
                $data1['goods_id']=$value['id'];//商品id
                $data1['name']=$info->name;//商品名称
                $data1['num']=$value['num'];//商品数量
                $data1['pic']=$info->pic;//商品图片
                $tot+=$data1['num']*$info->price;//商品价格
                $d[]=$data1;

            }
               if(DB::table('order_goods')->insert($d)){
                   //把支付订单的金额和地址id存储在session里
                   session(['orders_id'=>$id]);//
                   session(['address_id'=>$data['address_id']]);
                   session(['tot'=>$tot]);
                  //调用支付宝接口
                  $out_trade_no=$data['order_num'];//订单编号
                   //主题
                  $subject='支付';
                  $total_fee='0.01';
                  $body='shop pay';
                  pays($out_trade_no,$subject,$total_fee,$body);
                  // echo 'ok';
               }
        }

    }
    public function returnurl(Request $request)
    {  
        //支付成功状态有有0转为2
        //获取id
        $orders_id=session('orders_id');
        $address_id=session('address_id');
        $tot=session('tot');
        $data['status']=2;//代表已付款
        //更新订单状态
        DB::table('orders')->where('id','=',$orders_id)->update($data);
        //获取收货地址
        $address=DB::table('address')->where('id','=',$address_id)->first();
        //加载支付成功的页面
        return view('Home.Order.success',['address'=>$address,'tot'=>$tot]);
         //清除session里面的数据
         $request->session()->pull('cart');
         $request->session()->pull('goods'); 
    }
}
