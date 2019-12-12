<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillExtraWork extends Model
{
    public function BillExtraWork(){
        return $this->hasOne(ExtraWork::class,'id','extra_work_id');
    }
}
