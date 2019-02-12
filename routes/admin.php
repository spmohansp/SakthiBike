<?php



Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//Product
Route::get('/product/add', 'BillingController\ProductController@addproduct');
Route::get('/product/view', 'BillingController\ProductController@viewproduct');

//Deposit
Route::get('/add_deposit','BillingController\DepositController@addDeposit');
Route::get('/view_deposit','BillingController\DepositController@viewDeposit');

//Ledger
Route::get('/ledgers', 'BillingController\LedgerController@viewLedger');
Route::post('/ledger/add','BillingController\LedgerController@addLedger')->name('addLedger');
Route::get('/ledger/{id}/edit', 'BillingController\LedgerController@editLedger')->name('editLedger');
Route::post('/ledger/{id}/update', 'BillingController\LedgerController@updateLedger')->name('updateLedger');
Route::get('/ledger/{id}/delete', 'BillingController\LedgerController@deleteLedger')->name('deleteLedger');


//Stock
Route::get('/stock/add','BillingController\StockController@addStock');
Route::get('/stock/view', 'BillingController\StockController@viewStock');

//Print
Route::get('/add_print','BillingController\PrintController@addPrint');
Route::get('/view_print','BillingController\PrintController@viewPrint');

//Clients
Route::get('/client/add','BillingController\ClientController@addClient');
Route::post('/client/add','BillingController\ClientController@saveClient')->name('saveClient');
Route::get('/clients','BillingController\ClientController@viewClient');
Route::get('/client/{id}/edit','BillingController\ClientController@editClient')->name('editClient');
Route::post('/client/{id}/update','BillingController\ClientController@updateClient')->name('updateClient');
Route::get('/client/{id}/delete','BillingController\ClientController@deleteClient')->name('deleteClient');


//EXPENSE
Route::get('/expense/add','BillingController\ExpenseController@addExpense');
Route::get('/expenses','BillingController\ExpenseController@viewExpense');