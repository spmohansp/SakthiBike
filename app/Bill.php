<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function Client(){
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function BillProducts(){
        return $this->hasMany(BillProduct::class,'bill_id','id');
    }

	public function BillExtraWork(){
	        return $this->hasOne(ExtraWork::class,'id','extra_work_id');
	    }
}
