<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function Client(){
        return $this->hasOne(Client::class,'id','client_id');
    }
}
