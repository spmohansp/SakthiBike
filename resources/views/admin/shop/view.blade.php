@extends('admin.layouts.master')

@section('Current-Page')
View Shops
@endsection

@section('Parent-Menu')
Shops
@endsection

@section('Menu')
View Shops
@endsection

@section('content')
    <div class="tile">
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\ShopController@create') }}'">Add Shop</button>
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <div class="tile-body table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Shop Name</th>
                    <th>Mobile</th>
                    <th>Action</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Shops as $key=>$Shop)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $Shop->name }}</td>
                    <td>{{ $Shop->phone_number }}</td>
                    <td>{{ $Shop->address }}</td>
                    <td>
                      <form action="{{ action('BillingController\ShopController@destroy',$Shop->id) }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="DELETE">
                          <a href="{{ action('BillingController\ShopController@edit',$Shop->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></a>
                          <button href="" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class="fa fa-trash-o"  aria-hidden="true" style="color:#fff" ></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  @endsection
