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
      <div class="row">
         <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('/admin/stock/view') }}'">View Stock</button>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-md-12 ">
            <div class="">
               <div class="row">
                  <div class="col-lg-12">
                     <form action="{{ route('admin.saveStock') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                <select class="form-control" name="client_id"  id="demoSelect" >
                                  <option selected disabled>Select Shop</option>
                                  @foreach($Stock as $Stocks)
                                    <option value={{ $Stocks->id }}>{{ $Stocks->Product_Name_English}} </option>
                                  @endforeach
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
            </div>
         </div>
      </div>
  </div>
  @endsection

  @section('loadMore')

    <script src="{{ url('billing/js/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('billing/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('billing/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('#demoSelect').select2();
    </script>
@endsection