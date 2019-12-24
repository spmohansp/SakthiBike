<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     public function VehicleName(){
        return $this->hasOne(vehicle_type::class,'id','Vehicle_id');
    }
}
