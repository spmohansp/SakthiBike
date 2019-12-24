@extends('admin.layouts.master') 

@section('Current-Page') 
Edit Vehicle 
@endsection 

@section('Parent-Menu') 
Home 
@endsection 

@section('Menu') 
Edit Vehicle 
@endsection 

@section('content')


<div class="tile">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\VehicleTypeController@update',$Vehicles->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                	<label><h5><b>Enter Vehicle Name</b></h5></label>
                                    <input class="form-control form-control-lg" id="" type="text"  placeholder="Enter Name" value="{{ $Vehicles->name }}" name="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Update Vehicle Name</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection