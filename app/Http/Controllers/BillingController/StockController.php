<?php

namespace App\Http\Controllers\BillingController;
use App\Products;
use App\Stock;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
   public function addStock(){
   	$Stock = Products::all();
      $Shops = Shop::all();
   return view('admin.stock.add',compact('Stock','Shops'));
   }

   public function saveStock(){
   
   	$Stock = new stock;
   	$Stock->product_id = request('product_id');
   	$Stock->quantity = request('quantity');
   	$Stock->amount = request('amount');
   	$Stock->date = request('date');
   	$Stock->save();
   	return back()->with('success','Stock Added Sucessfully');
   }

   public function viewStock(){
   	$Stock = Stock::all();
      $Shops = Shop::all();
   return view('admin.stock.view',compact('Stock'));
   }

   public function editStock($id){
   	$Stock = Stock::FindorFail($id);
   	$Products = Products::all();
   return view('admin.stock.edit',compact('Stock','Products'));
   }

   public function updateStock($id){
   	$Stock = Stock::FindorFail($id);
   	$Stock->product_id = request('product_id');
   	$Stock->quantity = request('quantity');
   	$Stock->amount = request('amount');
   	$Stock->date = request('date');
   	$Stock->save();
   	return back()->with('success','Stock Updated Sucessfully');
   }

    public function deleteStock($id){
   Stock::FindorFail($id)->delete();
   return back()->with('success','Stock Deleted Sucessfully');
   }
}
