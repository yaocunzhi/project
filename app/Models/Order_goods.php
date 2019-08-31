<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_goods extends Model
{
    protected $table="orders";
    //设置是否自动维护时间chuo
    public  $timestamps= false;
    //主键
    protected $primaryKey="id";
}
