<?php

namespace App\Http\Controllers\BillingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExtraWork;


class ExtraWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Data['ExtraWorks'] = ExtraWork::get();
        return view('admin.ExtraWork.add',$Data);
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
            'name' => 'required',
        ]);
        try {
            $ExtraWork = new ExtraWork;
            $ExtraWork->name = request('name');  
            $ExtraWork->save();
            return back()->with('success','ExtraWork Created Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.ExtraWork Cannot be Stored!');
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
        $Data['ExtraWork'] = ExtraWork::findorfail($id);
        return view('admin.ExtraWork.edit',$Data);
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
            // return request()->all();
            $ExtraWork = ExtraWork::findorfail($id);
            $ExtraWork->name = request('name');  
            $ExtraWork->save();
            return redirect(action('BillingController\ExtraWorkController@create'))->with('success','ExtraWork Updated Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.ExtraWork Cannot Be Updated!');
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
        try{
            ExtraWork::findOrFail($id)->delete();
            return back()->with('success','ExtraWork Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('danger','Sorry,Something went wrong!.ExtraWork Cannot Be Deleted!');
        }
    }
}
