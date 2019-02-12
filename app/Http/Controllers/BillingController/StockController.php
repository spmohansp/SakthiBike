<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
   public function addStock(){
   return view('admin.stock.add');
   }

   public function viewStock(){
   return view('admin.stock.view');
   }
}
