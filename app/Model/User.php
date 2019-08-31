<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   //关联数据表
    protected $table="user";
    //设置是否自动维护时间chuo
    public  $timestamps= true;
    //可以批量赋值的属性
    protected $fillable =['uname','password','email','status'];
    //在获取字段值后自动处理
    public function getStatusAttribute($value){
    	//给状态赋值
    	$status=[1=>'未激活',0=>'激活'];
    	return  $status[$value];
    }
    //获取与user表关联的数据
    public function info(){

    	return $this->hasOne('App\Model\info','user_id');

    }
   public function useradd(){

    	return $this->hasMany('App\Model\add','user_id');

    }
}
 