<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class pingjiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //评价
    public function index()
    {   
        //$info=DB::table('pinglun')->get();
        //dd($info);
        $info=DB::table("orders")
        ->join('user','orders.user_id','=','user.id')
        ->join('order_goods','order_goods.order_id','=','orders.id')
        ->join('pinglun','order_goods.id','pinglun.good_id')
        ->select("orders.id as oid",'pinglun.id as pid',"orders.order_num","order_goods.name as oname","order_goods.pic","user.uname",'pinglun.detext','pinglun.status')->get();
        //dd($info);die;
        return view("Admin.Ping.index",['info'=>$info]);
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
       if(DB::table('pinglun')->where('id','=',$id)->delete()){

          return redirect('/pingjia')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
}
