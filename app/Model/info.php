<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{     //关联数据库
    protected $table="user_info";
    //设置是否自动维护时间chuo
    public  $timestamps= true;
    //主键
    protected $primaryKey="id";


}
