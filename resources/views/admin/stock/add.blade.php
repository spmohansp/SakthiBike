@extends('admin.layouts.master')

@section('Current-Page')
Add Stock
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Add Stock
@endsection

@section('content')


 <div class="modal fade" id="Stock" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Shop</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <form action="{{ action('BillingController\ShopController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Shop Name" value="{{ old('name') }}" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" value="{{ old('phone_number') }}" name="phone_number" minlength="0" maxlength="10" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Shop Address" name="address">{{ old('address') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Add Shop</button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                             <form action="{{ route('admin.storeproduct') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><h5><b>Product Name</b></h5></label>
                                        <input class="form-control form-control-lg" id="" type="text"
                                        aria-describedby="emailHelp" placeholder="Product Name" name="Product_Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="pull-left">Select Vehicle Type</h5>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg" name="Vehicle_id">
                                            <option value="">Select Vehicle Type</option>
                                            @foreach($Vehicles as $Vehicle)
                                            <option value={{ $Vehicle->id }}>{{ $Vehicle->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><h5><b>Select Product Type:</b></h5></label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="ml">Ml
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="Litter">Litter
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="Kg">Kg
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="Product_Type" value="piece">Piece
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="text"
                                            aria-describedby="emailHelp" placeholder="Cost Price" name="Cost_Price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg calculatevalue" id="Selling_Price" type="text"
                                            aria-describedby="emailHelp" placeholder="Selling Price" name="Selling_Price">
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <button class="btn btn-primary" type="submit">Add Product</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="tile">
      <div class="row">
         <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('/admin/stock/view') }}'">View Stock</button>
         </div>
      </div>
      <br>
     <div class="row">
        <div class="col-lg-12">
           <form action="{{ route('admin.saveStock') }}" method="post">
              {{ csrf_field() }}
              <div class="row">

                 <div class="col-lg-6">
                  <h5 class="pull-left">Select Shop</h5>
                  <div style="float:right;">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Stock">Add Shop</button>
                  </div>
                    <div class="form-group">
                       <select class="form-control form-control-lg" name="shop_id" required="">
                          <option value="">Select Shop</option>
                          @foreach($Shops as $Shop)
                            <option value={{ $Shop->id }}>{{ $Shop->name}} </option>
                          @endforeach
                       </select>

                    </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                      <h5>Date</h5>
                       <input type="date" name="date" class="form-control form-control-lg" required>
                    </div>
                 </div>
               </div>

                <div class="row">
                    <div class="col-sm-12">
                       <div class="panel-group">
                          <div class="panel panel-default">
                             <div class="panel-heading">
                                <h5>Add Stock</h5>
                                <button type="button" class="btn btn-primary btn-sm pull-right AddStock"><i class="fa fa-plus"></i></button>
                             </div>
                             <div class="panel-body table-responsive">
                                <table  class="table table-bordered">
                                   <thead>
                                      <tr>
                                         <th>Product  <div style="float:right;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Product</button>
                                </div>
                                        </th>

                                         <th>Unit</th>
                                         <th>Cost </th>
                                         <th>Selling</th>
                                         <th>Total</th>
                                         <th>Action</th>
                                      </tr>
                                   </thead>
                                   <tbody class="StockDetailTableData">
                                    {{-- @if(old('Stock'))
                                      @foreach(old('Stock')['Unit'] as $Key=>$Stock)
                                       <tr>
                                         <td>
                                           <select class="form-control Products" style="width:30em;" name="Stock[Product][]">
                                              <option value="">Select Product</option>
                                                @foreach($Products as $key=>$Product)
                                                    <option value="{{ $Product->id }}">{{ $Product->Product_Name }}</option>
                                                @endforeach
                                           </select>
                                         </td>
                                         <td>
                                             <input type="text" class="form-control Unit" name="Stock[Unit][]" value="{{ $Stock }}" required>
                                         </td>
                                         <td>
                                             <p class="Cost" style="font-size: 18px;">0</p>
                                         </td>
                                         <td>
                                             <p class="Selling" style="font-size: 18px;">0</p>
                                         </td>
                                         <td><p class="ProductWiseTotal" style="font-size: 18px;">0</p></td>
                                         <td class="RemoveStockInput" style="font-size: 18px;"><i style="color: red;" class="fa fa-close fa-10x"></i></td>
                                        </tr>
                                      @endforeach
                                    @endif --}}
                                   </tbody>
                                      <tr>
                                        <td colspan="" rowspan="" headers="" style="width:15em;"></td>
                                        <td colspan="" rowspan="" headers="" style="width:20em;font-size: 18px;"></td>
                                        <td colspan="2" rowspan="" headers="" style="width:10em;font-size: 18px;">Total Amount</td>
                                        <td colspan="" rowspan="" headers=""><p class="ProductWiseFullTotal" style="font-size: 18px;">0</p><input type="hidden" name="ProductTotal" class="ProductWiseFullTotal"></td>
                                      </tr>
                                </table>
                             </div>
                          </div>
                       </div>
                    </div>
                </div>
                <br>
                <div class="">
                   <button class="btn btn-primary" type="submit">Add Stock</button>
                </div>
            </form>
          </div>
        </div>
    </div>
  @endsection

@section('loadMore')
      <script type="text/javascript">
      $( document ).ready(function() {
        var x = 1;
        $('.AddStock').on('click',function () {
          var stock_entry = '<tr>\n' +
              '    <td>\n' +
              '        <select class="form-control Products" style="width:30em;" name="Stock[Product][]">\n' +
              '           <option selected disabled>Select Product</option>\n' +
                        @foreach($Products as $key=>$Product)
              '           <option value="{{ $Product->id }}">{{ $Product->Product_Name }}</option>\n' +
                        @endforeach
              '        </select>\n' +
              '    </td>\n' +
              '    <td>\n' +
              '        <input type="text" class="form-control Unit" name="Stock[Unit][]" value="" required>\n' +
              '    </td>\n' +
              '    <td>\n' +
              '        <p class="Cost" style="font-size: 18px;">0</p>\n' +
              '    </td>\n' +
              '    <td>\n' +
              '        <p class="Selling" style="font-size: 18px;">0</p>\n' +
              '    </td>\n' +
              '    <td><p class="ProductWiseTotal" style="font-size: 18px;">0</p></td>\n' +
              '    <td class="RemoveStockInput" style="font-size: 18px;"><i style="color: red;" class="fa fa-close fa-10x"></i></td>\n' +
              '</tr>';
              x++;
            $('.StockDetailTableData').append(stock_entry);
            $('.Products').select2();
           });


          // $('.AddStock').trigger('click');
          // setTimeout(function() {
          //   $('.Products').trigger('change');
          // }, 2000);

          $('.AddStock').trigger('click');

          // $('.Products').select2({
          // });

          $('body').on('change keyup','.Products,.Unit',function(e) {
            e.preventDefault();
            var Unit = $(this).parent().parent().find(".Unit").val();
            var Product = $(this).parent().parent().find(".Products").val();
            if(Product!= ''){
              $.ajax({
                type: "get",
                url: "{{ route('admin.GetProductDetails') }}",
                data: {Product: Product},
                success: (data)=> {
                  $(this).parent().parent().find(".Cost").html(data.Cost_Price);
                  $(this).parent().parent().find(".Selling").html(data.Selling_Price);
                  $(this).parent().parent().find(".ProductWiseTotal").html(data.Cost_Price * Unit);

                  var ProductWiseFullTotal = 0;
                  $('.ProductWiseTotal').each(function() {
                    if($(this).text() !=='' && !isNaN($(this).text()))
                    ProductWiseFullTotal += parseFloat($(this).text());
                    $('.ProductWiseFullTotal').html(ProductWiseFullTotal);
                    $('.ProductWiseFullTotal').val(ProductWiseFullTotal);
                  });
                }
              });
            }
           });



        $('body').on('click','.RemoveStockInput',function (e) {
            e.preventDefault();
            if(x>1){
              $(this).parent().remove();
              x--;
            }
        });
      });

    </script>
@endsection
