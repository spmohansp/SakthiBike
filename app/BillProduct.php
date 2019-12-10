<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{

    public function Product(){
        return $this->hasOne(Products::class,'id','product_id');
    }

    public function BillProduct(){
        return $this->hasOne(BillProduct::class,'quantity','id');
    }
}
