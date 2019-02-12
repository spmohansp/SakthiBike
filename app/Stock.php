<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function Products(){
        return $this->hasOne(Products::class,'id','product_id');
    }
}
