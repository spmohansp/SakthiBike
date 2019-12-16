<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Data['ExpenseCategories'] = ExpenseCategory::get();
        return view('admin.expenses.add_expense_category',$Data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(request(),[
            'expense_type' => 'required',
        ]);
        try {
            // return request()->all();
            $Expense_category = new ExpenseCategory;
            $Expense_category->expense_type = request('expense_type');
            // $Expense_category->description = request('description');
            $Expense_category->save();
            return redirect(action('BillingController\ExpenseCategoryController@create'))->with('success','Expense Category Created Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.Expense Category cannot be stored!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Data['ExpenseCategory'] = ExpenseCategory::findorfail($id);
        return view('admin.expenses.edit_expense_category',$Data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $Expense_category = ExpenseCategory::findorfail($id);
            $Expense_category->expense_type = request('expense_type');
            $Expense_category->save();
            return redirect(action('BillingController\ExpenseCategoryController@create'))->with('success','Expense Category Updated Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!Expense Category cannot be Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ExpenseCategory::findOrFail($id)->delete();
            return back()->with('success','Expense Category Details Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!');
        }
    }
}
