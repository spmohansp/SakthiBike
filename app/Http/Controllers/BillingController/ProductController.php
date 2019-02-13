<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Products;
class ProductController extends Controller
{
    public function addproduct(){
        return view('admin.products.add');
    }

    public function viewproduct(){
        $details = Products::all();
        return view('admin.products.view',compact('details'));
    }

    public function storeproduct(){
        try {
            $Product = new Products;
            $Product->Product_ID = request('Product_ID');
            $Product->Product_Name_English = request('Product_Name_English');
            $Product->Product_Name_Tamil = request('Product_Name_Tamil');
            $Product->Cost_Price = request('Cost_Price');
            $Product->Expense = request('Expense');
            $Product->Selling_Price = request('Selling_Price');
            $Product->Selling_Price_With_Tax = request('Selling_Price_With_Tax');
            $Product->CGST = request('CGST');
            $Product->SGST = request('SGST');
            $Product->CESS = request('CESS');
            $Product->minimun_quantity = request('minimun_quantity');
            $Product->save();
            return back()->with('success', 'Product Added Successfully');
        } catch (Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }

    public function editProduct($id){
        $Product = Products::findorfail($id);
        return view('admin.products.edit',compact('Product'));
    }

    public function updateProduct($id){
        try {
            $Product = Products::findorfail($id);
            $Product->Product_ID = request('Product_ID');
            $Product->Product_Name_English = request('Product_Name_English');
            $Product->Product_Name_Tamil = request('Product_Name_Tamil');
            $Product->Cost_Price = request('Cost_Price');
            $Product->Expense = request('Expense');
            $Product->Selling_Price = request('Selling_Price');
            $Product->Selling_Price_With_Tax = request('Selling_Price_With_Tax');
            $Product->CGST = request('CGST');
            $Product->SGST = request('SGST');
            $Product->CESS = request('CESS');
            $Product->minimun_quantity = request('minimun_quantity');
            $Product->save();
            return back()->with('success', 'Product Updated Successfully');
        } catch (Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }

    public function deleteProduct($id)
    {
        Products::findorfail($id)->delete();
        return back()->with('success', 'Product Deleted Successfully');
    }

    public function getProduct(){
        $Product = Products::findorfail(request('product_id'));
         return $data=     '<tr>
                                <th>'.$Product->Product_Name_English.'<input type="hidden" value="'.$Product->id.'" name="id[]"></th>
                                <th>'.request('qty').'<input type="hidden" value="'.request('qty').'" name="qty[]"></th>
                                <th>'.$Product->Selling_Price.'</th>
                                <th>'.((($Product->Selling_Price*$Product->CGST)/100)*request('qty')).'</th>
                                <th>'.((($Product->Selling_Price*$Product->SGST)/100)*request('qty')).'</th>
                                <th>'.((($Product->Selling_Price*@$Product->CESS)/100)*request('qty')).'</th>
                                <th>'.($Product->Selling_Price*request('qty') + ((($Product->Selling_Price*$Product->CGST)/100)*request('qty')) +((($Product->Selling_Price*$Product->SGST)/100)*request('qty')) + ((($Product->Selling_Price*@$Product->CESS)/100)*request('qty'))).'<input type="hidden" value="'.($Product->Selling_Price*request('qty') + ((($Product->Selling_Price*$Product->CGST)/100)*request('qty')) +((($Product->Selling_Price*$Product->SGST)/100)*request('qty')) + ((($Product->Selling_Price*@$Product->CESS)/100)*request('qty'))).'" name="qty[]"></th>
                                <th><button type="button" class="btn btn-primary btn-sm RemoveProductButon"><i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></th>
                            </tr>';
    }

}
