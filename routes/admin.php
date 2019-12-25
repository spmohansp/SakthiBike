<?php


//Dashboard
Route::get('/home','BillingController\DashboardController@index')->name('home');

Route::get('/dashboard/get-total-income-expense','BillingController\DashboardController@GetTotalDashboardIncomeExpense');

// Route::get('/home', function () {
//     $users[] = Auth::user();
//     $users[] = Auth::guard()->user();
//     $users[] = Auth::guard('admin')->user();

//     //dd($users);

//     return view('admin.home');
// })->name('home');

//Product
Route::get('/GetMonthlyIncome/{month}/{year}', 'BillingController\DashboardController@GetMonthlyIncome')->name('GetMonthlyIncome');


Route::get('/product/add', 'BillingController\ProductController@addproduct')->name('addProduct');
Route::get('/products', 'BillingController\ProductController@viewproduct')->name('viewProducts');
Route::post('/product/add', 'BillingController\ProductController@storeproduct')->name('storeproduct');
Route::get('/product/{id}/edit', 'BillingController\ProductController@editProduct')->name('editProduct');
Route::post('/product/{id}/update', 'BillingController\ProductController@updateProduct')->name('updateProduct');
Route::get('/product/{id}/delete', 'BillingController\ProductController@deleteProduct')->name('deleteProduct');
Route::get('/product/getProduct/','BillingController\ProductController@getProduct');

Route::get('/GetProductStock','BillingController\ProductController@GetProductStock')->name('GetProductStock');
Route::get('/GetProductCount','BillingController\ProductController@GetProductCount')->name('GetProductCount');

Route::resource('/shop','BillingController\ShopController');

Route::resource('/Expense-category','BillingController\ExpenseCategoryController');

Route::resource('/extraworks','BillingController\ExtraWorkController');

//Stock
Route::get('/stock/add','BillingController\StockController@addStock');
Route::post('/stock/add','BillingController\StockController@saveStock')->name('saveStock');
Route::get('/stock/view', 'BillingController\StockController@viewStock')->name('ViewStock');
Route::get('/stock/{id}/edit','BillingController\StockController@editStock')->name('editStock');
Route::post('/stock/{id}/update','BillingController\StockController@updateStock')->name('updateStock');
Route::get('/stock/{id}/delete','BillingController\StockController@deleteStock')->name('deleteStock');

Route::get('/GetProductDetails','BillingController\StockController@GetProductDetails')->name('GetProductDetails');

//Print
Route::get('/bill/add','BillingController\PrintController@addPrint');
Route::get('/bills','BillingController\PrintController@viewPrint')->name('ViewBill');
Route::post('/bill/add','BillingController\PrintController@saveBill')->name('saveBill');
Route::get('/print/{id}/edit', 'BillingController\PrintController@editPrint')->name('editPrint');
Route::post('/print/{id}/update', 'BillingController\PrintController@UpdateBill')->name('UpdateBill');
Route::get('/bill/{id}/print','BillingController\PrintController@printBill')->name('printBill');
Route::get('/bill/{id}/delete','BillingController\PrintController@deleteBill')->name('deleteBill');

Route::get('/bill/autocomplete','BillingController\PrintController@search_customer_name');


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
Route::get('/GetExpenseDetails','BillingController\ExpenseController@GetExpenseDetails');

//Salary
Route::resource('salary','BillingController\SalaryController');
Route::get('GetSalaryDetails','BillingController\SalaryController@GetSalaryDetails')->name('GetSalaryDetails');

//Employee
Route::resource('employee','BillingController\EmployeeController');

//ExtraIncome
Route::resource('Extra-Income','BillingController\ExtraIncomeController');

//Vehicle Type

Route::resource('vehicle_type','BillingController\VehicleTypeController');
Route::get('/GetVehicleName','BillingController\VehicleTypeController@GetVehicleName')->name('GetVehicleName');




