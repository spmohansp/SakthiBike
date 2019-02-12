<?php



Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//Product
Route::get('/product/add', 'BillingController\ProductController@addproduct')->name('addProduct');
Route::get('/products', 'BillingController\ProductController@viewproduct')->name('viewProducts');
Route::post('/product/add', 'BillingController\ProductController@storeproduct')->name('storeproduct');
Route::get('/product/{id}/edit', 'BillingController\ProductController@editProduct')->name('editProduct');
Route::post('/product/{id}/update', 'BillingController\ProductController@updateProduct')->name('updateProduct');
Route::get('/product/{id}/delete', 'BillingController\ProductController@deleteProduct')->name('deleteProduct');




Route::get('/deposit/add','BillingController\DepositController@addDeposit');
Route::get('/deposits','BillingController\DepositController@viewDeposit');

//Ledger
Route::get('/ledgers', 'BillingController\LedgerController@viewLedger');
Route::post('/ledger/add','BillingController\LedgerController@addLedger')->name('addLedger');
Route::get('/ledger/{id}/edit', 'BillingController\LedgerController@editLedger')->name('editLedger');
Route::post('/ledger/{id}/update', 'BillingController\LedgerController@updateLedger')->name('updateLedger');
Route::get('/ledger/{id}/delete', 'BillingController\LedgerController@deleteLedger')->name('deleteLedger');


//Stock
Route::get('/stock/add','BillingController\StockController@addStock');
Route::post('/stock/add','BillingController\StockController@saveStock')->name('saveStock');
Route::get('/stock/view', 'BillingController\StockController@viewStock');
Route::get('/stock/{id}/edit','BillingController\StockController@editStock')->name('editStock');
Route::post('/stock/{id}/update','BillingController\StockController@updateStock')->name('updateStock');
Route::get('/stock/{id}/delete','BillingController\StockController@deleteStock')->name('deleteStock');

//Print
Route::get('/print/add','BillingController\PrintController@addPrint');
Route::get('/prints','BillingController\PrintController@viewPrint');


//Clients
Route::get('/client/add','BillingController\ClientController@addClient');
Route::post('/client/add','BillingController\ClientController@saveClient')->name('saveClient');
Route::get('/clients','BillingController\ClientController@viewClient');
Route::get('/client/{id}/edit','BillingController\ClientController@editClient')->name('editClient');
Route::post('/client/{id}/update','BillingController\ClientController@updateClient')->name('updateClient');
Route::get('/client/{id}/delete','BillingController\ClientController@deleteClient')->name('deleteClient');


//EXPENSE
Route::get('/expense/add','BillingController\ExpenseController@addExpense')->name('addExpense');
Route::get('/expenses','BillingController\ExpenseController@viewExpense')->name('viewExpense');
Route::post('/expense/add','BillingController\ExpenseController@saveExpense')->name('saveExpense');
Route::get('/expense/{id}/edit','BillingController\ExpenseController@editExpense')->name('editExpense');
Route::post('/expense/{id}/update','BillingController\ExpenseController@updateExpense')->name('updateExpense');
Route::get('/expense/{id}/delete','BillingController\ExpenseController@deleteExpense')->name('deleteExpense');