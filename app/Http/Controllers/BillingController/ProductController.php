<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\StockDetail;
use App\BillProduct;
use App\vehicle_type;

class ProductController extends Controller
{
    public function addproduct(){
        $Data['Vehicles'] = vehicle_type::get();
        return view('admin.products.add',$Data);
    }

    public function viewproduct(){
        $details = Products::get();
        return view('admin.products.view',compact('details'));
    }

    public function storeproduct(){
        try {
            $Product = new Products;
            $Product->Product_Name = request('Product_Name');
            $Product->Product_Type = request('Product_Type');
            $Product->Cost_Price = request('Cost_Price');
            $Product->Selling_Price = request('Selling_Price');
            $Product->Vehicle_id = request('Vehicle_id');
            $Product->save();
            return back()->with('success', 'Product Added Successfully');
        } catch (\Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }

    public function editProduct($id){
        $Product = Products::findorfail($id);
        $Vehicles = vehicle_type::get();
        return view('admin.products.edit',compact('Product','Vehicles'));
    }

    public function updateProduct($id){
        try {
            $Product = Products::findorfail($id);
            $Product->Product_Name = request('Product_Name');
            $Product->Product_Type = request('Product_Type');
            $Product->Cost_Price = request('Cost_Price');
            $Product->Selling_Price = request('Selling_Price');
            $Product->Vehicle_id = request('Vehicle_id');
            $Product->save();
            return redirect(route('admin.viewProducts'))->with('success', 'Product Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }

    public function deleteProduct($id)
    {
        try{
            Products::findorfail($id)->delete();
            return back()->with('success', 'Product Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }

    public function getProduct(){
        $Product = Products::findorfail(request('product_id'));
        return $data=     
                '<tr>
                    <th style="width:15em;">'.$Product->Product_Name.'<input type="hidden" value="'.$Product->id.'" name="product_id[]"></th>
                    <th style="width:15em;">'.request('qty').'<input type="hidden" value="'.request('qty').'" name="qty[]"></th>
                    <th style="width:15em;">'.$Product->Selling_Price.'</th>
                    <th style="width:15em;">'.($Product->Selling_Price*request('qty') + ((($Product->Selling_Price*$Product->CGST)/100)*request('qty')) +((($Product->Selling_Price*$Product->SGST)/100)*request('qty')) + ((($Product->Selling_Price*@$Product->CESS)/100)*request('qty'))).'<input type="hidden" class="total_amount" value="'.($Product->Selling_Price*request('qty') + ((($Product->Selling_Price*$Product->CGST)/100)*request('qty')) +((($Product->Selling_Price*$Product->SGST)/100)*request('qty')) + ((($Product->Selling_Price*@$Product->CESS)/100)*request('qty'))).'" name="total_amount[]"></th>
                    <th><button type="button" class="btn btn-primary btn-sm RemoveProductButon"><i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></th>
                </tr>';
}

    public function GetProductStock(){
        $StockDetail = StockDetail::where('product_id',request('product_id'))->sum('Unit');
        $BillProduct = BillProduct::where('product_id',request('product_id'))->sum('quantity');
        $balance  =  $StockDetail - $BillProduct;
        return ['balance'=>$balance];
    }

}
