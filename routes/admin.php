<?php



Route::get('/dashboarddashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.billing.dashboard');
})->name('dashboard');

//Deposit
Route::get('/add_deposit','BillingController\DepositController@addDeposit');
Route::get('/view_deposit','BillingController\DepositController@viewDeposit');

//Expenses
Route::get('/add_expenses','BillingController\ExpenseController@addExpense');
Route::get('/view_expenses','BillingController\ExpenseController@ViewExpense');

//Legger
Route::get('/ledger', 'BillingController\LedgerController@viewLedger');

//Stock
Route::get('/add_stock', 'BillingController\StockController@addStock');
Route::get('/view_stock', 'BillingController\StockController@viewStock');

//Print
Route::get('add_print','BillingController\PrintController@addPrint');
Route::get('view_print','BillingController\PrintController@viewPrint');