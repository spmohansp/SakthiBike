<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIncomePayment extends Model
{
    public function Shop(){
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
