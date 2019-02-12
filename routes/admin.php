<?php



Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//Deposit
Route::get('/add_deposit','BillingController\DepositController@addDeposit');
Route::get('/view_deposit','BillingController\DepositController@viewDeposit');

//Expenses
Route::get('/add_expenses','BillingController\ExpenseController@addExpense');
Route::get('/view_expenses','BillingController\ExpenseController@viewExpense');

//Ledger
Route::get('/ledgers', 'BillingController\LedgerController@viewLedger');
Route::post('/ledger/add','BillingController\LedgerController@addLedger')->name('addLedger');
Route::get('/ledger/{id}/edit', 'BillingController\LedgerController@editLedger')->name('editLedger');
Route::post('/ledger/{id}/update', 'BillingController\LedgerController@updateLedger')->name('updateLedger');
Route::get('/ledger/{id}/delete', 'BillingController\LedgerController@deleteLedger')->name('deleteLedger');


//Stock
Route::get('/add_stock','BillingController\StockController@addStock');
Route::get('/view_stock', 'BillingController\StockController@viewStock');

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