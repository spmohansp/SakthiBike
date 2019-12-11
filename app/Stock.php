<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function StockDetail(){
        return $this->hasMany(StockDetail::class,'stock_id','id');
    }

    public function Shop(){
        return $this->hasOne(Shop::class,'id','shop_id');
    }

}
