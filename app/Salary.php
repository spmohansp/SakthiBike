<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function Salary(){
        return $this->hasOne(Employee::class,'id','name');
    }
}
