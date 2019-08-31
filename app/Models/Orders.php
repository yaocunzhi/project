<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     protected $table='shops';
   
      //批量赋值
     protected $fillable =['order_num','user_id','address_id','status'];
      
     public function getStatusAttribute($value){
    	//给状态赋值
        $status=[0=>'未付款', 1='已付款',2=>'待发货',3=>'已发货',4=>'已收货'];
    	return  $status[$value];
    } 
}
