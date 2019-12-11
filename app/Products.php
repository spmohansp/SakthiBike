<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	public function StockDetail(){
        return $this->hasMany(StockDetail::class,'product_id','id');
    }

    public function BillProduct(){
        return $this->hasMany(BillProduct::class,'product_id','id');
    }
}
