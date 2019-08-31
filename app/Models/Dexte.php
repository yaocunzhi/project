<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dexte extends Model
{
    protected $table='dexte';

    public  $timestamps= false;
      //批量赋值
    protected $fillable =['title','detext','thumb','editor'];
}
