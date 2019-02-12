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
        return view('admin.products.view');
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
            $Product->save();
            return back()->with('success', 'Product Added Successfully');
        } catch (Exception $e) {
            return back()->with('danger', 'Something went wrong');
        }
    }
}
