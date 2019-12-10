<?php

namespace App\Http\Controllers\BillingController;
use App\Products;
use App\Stock;
use App\StockDetail;
use App\Shop;
use App\BillProduct;
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
      $Data['Products'] = Products::all();
   	$Data['Stock'] = Stock::all();
      $Data['Shops'] = Shop::all();
      $Data['Bill_product'] = BillProduct::all();
      return view('admin.stock.view',$Data);
   }

   public function editStock($id){
   	$Data['Stock'] = Stock::FindorFail($id);
   	$Data['Products'] = Products::all();
      $Data['StockDetails'] = StockDetail::where('stock_id',$id)->get();
      $Data['Shops'] = Shop::all();
   return view('admin.stock.edit',$Data);
   }

   public function updateStock($id){
   	$Stock = Stock::FindorFail($id);
      $Stock->shop_id = request('shop_id');
      $Stock->date = request('date');
      $Stock->ProductTotal = request('ProductTotal');
      $Stock->save();
      $StockDetail = StockDetail::where('stock_id',$Stock->id)->delete();
      foreach (request('Stock')['Product'] as $key=>$value) {
         $StockDetails = new StockDetail;
         $StockDetails->stock_id = $Stock->id;
         $StockDetails->product_id = request('Stock')['Product'][$key];
         $StockDetails->Unit = request('Stock')['Unit'][$key];
         $StockDetails->save();
      }
   	return redirect(route('admin.ViewStock'))->with('success','Stock Updated Sucessfully');
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
