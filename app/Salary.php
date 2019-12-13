<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function AttendenceDate(){
        return $this->hasOne(Attendence::class,'id','date_id');
    }
}
