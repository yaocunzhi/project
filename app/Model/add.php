<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class add extends Model
{
    protected $table="user_add";
    //设置是否自动维护时间chuo
    public  $timestamps= true;
    //主键
    protected $primaryKey="id";
}
