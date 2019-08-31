<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     //定义关联的数据表
     protected $table='admin_users';
   
      //批量赋值
     protected $fillable =['name','password','status'];
      
     public function getStatusAttribute($value){
    	//给状态赋值
        $status=[1=>'禁用',0=>'开启'];
    	return  $status[$value];
    } 

}
