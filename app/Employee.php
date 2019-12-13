<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function Salary(){
        return $this->hasMany(Salary::class,'employees_id','id');
    }
}
