<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Stock;
use App\StockIncomePayment;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Data['Shops'] = Shop::paginate(10);
        return view('admin.shop.view',$Data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.shop.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'phone_number'=>'required|min:10|max:10',
            'address'=>'required',
        ]);
        try{
            $Shop = Shop::create($request->all());
            return back()->with('success','Shop Added Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Shop Cannot Be Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Data['Shop'] = Shop::findorfail($id);
        $Stock = Stock::where([['shop_id',$id]])->sum('balance');
        $StockIncomePayment = StockIncomePayment::where([['shop_id',$id]])->sum('amount');
       $Data['Balance'] = $Stock - $StockIncomePayment;
        return view('admin.shop.payment',$Data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Data['Shop'] = Shop::findorfail($id);
        return view('admin.shop.edit',$Data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            Shop::findOrFail($id)->update($request->all());
            return redirect(action('BillingController\ShopController@index'))->with('success','Shop Updated Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Shop Cannot Be Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Shop::findOrFail($id)->delete();
            return back()->with('success','Shop Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Shop Cannot Be Deleted!');
        }
    }


     public function addPayment(){
        try{
            $StockIncomePayment  = new StockIncomePayment;
            $StockIncomePayment->date  = request('date');
            $StockIncomePayment->shop_id  = request('shop_id');
            $StockIncomePayment->amount  = request('amount');
            $StockIncomePayment->save();
            return back()->with('success','Income Payment Added');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Shop Cannot Be Deleted!');
        }
    }
}
