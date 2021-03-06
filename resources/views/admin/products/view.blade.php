@extends('admin.layouts.master')

@section('Current-Page')
View Products
@endsection

@section('Parent-Menu')
Products
@endsection

@section('Menu')
View Products
@endsection

@section('content')
    <div class="tile">
      <div class="row">
        <div class="col-lg-12">
          <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('admin/product/add') }}'">Add Product</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="tile-body table-responsive">
            <table class="table DataTable">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Vehicle Name</th>
                  <th>Cost Price</th>
                  <th>Selling Price</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($details as $key=>$detail)
                <?php $Qty = $detail->StockDetail->sum('Unit') - $detail->BillProduct->sum('quantity'); ?>
                    <tr>
                      <td> {{ ++$key }}</td>
                      <td  style="color: {{ $Qty>0?'':'red' }}"> {{ $detail->Product_Name }}</td>
                      <td> {{ isset($detail->VehicleName) ? @$detail->VehicleName->name : '-' }}</td>
                      <td> {{ $detail->Cost_Price }}</td>
                      <td> {{ $detail->Selling_Price }}</td>
                      <td> {{ $Qty }}</td>
                      <td>
                        <a href="{{ route('admin.editProduct',$detail->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                        <a href="{{ route('admin.deleteProduct',$detail->id) }}"> <button class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                      </td>
                    </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br>
      {{-- {!! $details->links() !!} --}}
    </div>
  @endsection
