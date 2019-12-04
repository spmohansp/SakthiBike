<?php

namespace App\Http\Controllers\BillingController;
use App\Products;
use App\Stock;
use App\StockDetail;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
   public function addStock(){
   	$Products = Products::all();
      $Shops = Shop::all();
      return view('admin.stock.add',compact('Products','Shops'));
   }

   public function saveStock(){
      $this->validate(request(),[
         'Product'=>'required',
         'Unit'=>'required',
     ]);

   	$Stock = new stock;
   	$Stock->shop_id = request('shop_id');
   	$Stock->date = request('date');
      $Stock->ProductTotal = request('ProductTotal');
   	$Stock->save();
      foreach (request('Stock')['Product'] as $key=>$value) {
         $StockDetails = new StockDetail;
         $StockDetails->stock_id = $Stock->id;
         $StockDetails->product_id = request('Stock')['Product'][$key];
         $StockDetails->Unit = request('Stock')['Unit'][$key];
         $StockDetails->save();
      }
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

   public function GetProductDetails(Request $request)
   {
      $data = Products::findorfail(request('Product'));
      return $data;
   }
}
