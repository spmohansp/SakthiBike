<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function ExpenseCategory(){
        return $this->hasOne(ExpenseCategory::class,'id','expense_type_id');
    }
}
