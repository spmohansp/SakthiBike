@extends('admin.layouts.master')

@section('Current-Page')
Edit Stock
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Edit Stock
@endsection

@section('content')
    <div class="tile">
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ url('/admin/stock/view') }}'">View Stock</button>
          </div>
        </div><br>
        <div class="row">
        <div class="col-lg-12">
           <form action="{{ route('admin.updateStock',$Stock->id) }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                 <div class="col-lg-6">
                    <div class="form-group">
                       <select class="form-control form-control-lg" name="shop_id" required="">
                          <option value="">Select Shop</option>
                          @foreach($Shops as $Shop)
                            <option value="{{ $Shop->id }}" {{ $Stock->shop_id == $Shop->id ? 'selected' : '' }}>{{ $Shop->name}} </option>
                          @endforeach 
                       </select>
                    </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                       <input type="date" name="date" value="{{ $Stock->date }}" class="form-control form-control-lg">
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
                                         <th>Product</th>
                                         <th>Unit</th>
                                         <th>Cost </th>
                                         <th>Selling</th>
                                         <th>Total</th>
                                         <th>Action</th>
                                      </tr>
                                   </thead>
                                   <tbody class="StockDetailTableData">
                                    @if(!empty($StockDetails))
                                      @foreach($StockDetails as $Key=>$StockDetail)
                                       <tr>
                                         <td>
                                           <select class="form-control Products" style="width:30em;" name="Stock[Product][]">
                                              <option value="">Select Product</option>
                                                @foreach($Products as $key=>$Product)
                                                    <option value="{{ $Product->id }}" {{ $Product->id == $StockDetail->product_id ? 'selected' : ''}}>{{ $Product->Product_Name }}</option>
                                                @endforeach
                                           </select>
                                         </td>
                                         <td>
                                             <input type="text" class="form-control Unit" name="Stock[Unit][]" value="{{ $StockDetail->Unit }}" required>
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
                                    @endif
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
                   <button class="btn btn-primary" type="submit">Update Stock</button>
                </div>
            </form>
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

          $('.Products,.Unit').each(function (index, value) {
            var Unit = $(this).parent().parent().find(".Unit").val();
            var Product = $(this).parent().parent().find(".Products").val();
            GetProductDetails(Product,Unit).then(data=>{
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
            });
          });

          $('body').on('change keyup','.Products,.Unit',function(e) {
            e.preventDefault();
            var Unit = $(this).parent().parent().find(".Unit").val();
            var Product = $(this).parent().parent().find(".Products").val();
            GetProductDetails(Product,Unit).then(data=>{
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
            });
           });

        function GetProductDetails(Product,Unit) {
          if(Product!= ''){              
            return $.ajax({
              type: "get",
              url: "{{ route('admin.GetProductDetails') }}",
              data: {Product: Product},
              success: (data)=> {                
              }
            });
          }
        }

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