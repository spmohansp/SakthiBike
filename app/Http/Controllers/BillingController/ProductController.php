<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function addproduct(){
        return view('admin.products.add');
    }

    public function viewproduct(){
        return view('admin.products.view');
    }
}
