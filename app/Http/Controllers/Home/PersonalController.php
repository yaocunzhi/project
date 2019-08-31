<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;//
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // 订单管理
    public function index()
    {     
        $user_id = session('user_id');
        // dd(session('user_id'));
        //获取当前用户的所有订单数据
        $pp[]=array();
        $order = DB::table('orders')->where('user_id',$user_id)->get();
        // dd($order);
          foreach ($order as $row) {
             $pp[]=DB::table('order_goods')
             ->join("orders","order_goods.order_id","=","orders.id")->select("orders.id as oid","order_goods.id as gid","order_goods.num as onum","order_goods.order_id","order_goods.name as oname","order_goods.pic")
             ->where("order_goods.order_id","=",$row->id)->get();
          }
           //dd($pp);
         return view('Home.personal.index',['order'=>$order,'pp'=>$pp]);
    }
    //评价
     // public function evaluate($id)
     // {    
     //      $info=DB::table('order_goods')->where('id','=',$id)->first();
     //     return view("Home.Personal.ping",['info'=>$info]);
     // }
     // public function evalin(Request $request)
     // {
     //    $data=$request->except(['_token','_method']);
     //    //dd($data);
     //    if (DB::table("pinglun")->insse($data)) {

     //        return redirect("/homeindex");
     //    }

     // }
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
}
