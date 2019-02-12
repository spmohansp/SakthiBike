<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LedgerController extends Controller
{
    public function viewLedger(){
    return view('admin.billing.ledger.ledger');
    }
}
