<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
    protected $table="user";
    //设置是否自动维护时间chuo
    public  $timestamps= true;
    //可以批量赋值的属性
    protected $fillable =['uname','password','email','status','token','phone'];
    public function getStatusAttribute($value){
    	//给状态赋值
    	$status=[1=>'未激活',0=>'激活'];
    	
    	return  $status[$value];
    }
}
