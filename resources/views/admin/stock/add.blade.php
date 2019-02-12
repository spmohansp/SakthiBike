@extends('admin.layouts.master')

@section('Current-Page')
Add Stock
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Add Stock
@endsection

@section('content')
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-8">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ url('/admin/stock/view') }}'">View Stock</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 ">
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.saveStock') }}" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <select class="form-control form-control-lg" name="product_id" required="">
                          <option value="">Select Product</option>
                          <option>hjh</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Quantity" name="quantity" required="">
                      </div>
                    </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Amount" name="amount" required="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="" type="date" aria-describedby="emailHelp" placeholder="" name="date" required="">
                  </div>
                  </div>

                </div>
              <div class="">
                <button class="btn btn-primary" type="submit">Add Stock</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-2">

        </div>
      </div>
      </div>
    </div>
      </div>
    </div>
  @endsection