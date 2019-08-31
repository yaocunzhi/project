<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Orders;
class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        //$info=DB::table('orders')->get();
         
           $info=DB::table('orders')->join('address','address.id','=','orders.address_id')->select('orders.id as oid','address.id as aid','address.name','address.phone','address.xhuo','orders.order_num','orders.status')->get();

        //dd($info);
        
        
        return view("Admin.Order.index",["info"=>$info]);
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
        
        $info=DB::table("orders")->where("id",'=',$id)->first();

         //dd($info);die;
         return view("Admin.Order.edit",['info'=>$info]);
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
        //echo $id;
        //dd($request->all());
        $data=$request->except(['_token','_method']);
        if (DB::table('orders')->where('id','=',$id)->update($data)) {
            return redirect('/adminorder')->with('success','修改加成功');
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
        if(DB::table('orders')->where('id','=',$id)->delete()){

          return redirect('/adminorder')->with('success','删除成功');
       }else{
          return back()->with('error','删除失败');
       }
    }
}
