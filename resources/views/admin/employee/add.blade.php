@extends('admin.layouts.master')

@section('Current-Page')
Add Emoloyee
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Add Emoloyee
@endsection

@section('content')

<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\EmployeeController@index') }}'">View Employee
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\EmployeeController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Employee Name</b></h5>
                                    <input class="form-control"  type="text"  placeholder="Enter Name" value="{{ old('name') }}" name="name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Mobile Number</b></h5>
                                    <input type="number"  class="form-control" placeholder="Enter Mobile Number" value="{{ old('mobile') }}" name="mobile">
                                </div>
                            </div>
                            <div class='col-sm-4'>
                                 <div class="form-group"><h5><b>Salary Per/DAy</b></h5>
                                    <input type='number' class="form-control" placeholder="Enter Salary Per/Day" value="{{ old('amount_per_day') }}" name="amount_per_day"/>
                                </div>
                            </div>
                        </div>							   

                         <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Address</b></h5>
                                    <textarea rows="4" cols="50" class="form-control" placeholder="Enter Employee Address" name="address">{{ old('address') }}</textarea>
                                </div>
                            </div>
                             
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection