<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shops extends Model
{
    protected $table="order_good";
    //设置是否自动维护时间chuo
    public  $timestamps= false;
    //主键
    protected $primaryKey="id";
}
