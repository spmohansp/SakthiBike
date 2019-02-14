<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{


    public function Product(){
        return $this->hasOne(Products::class,'id','product_id');
    }
}
