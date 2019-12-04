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
                    <div class="form-group">
                       <select class="form-control form-control-lg" name="product_id" required="">
                          <option value="">Select Shop</option>
                          @foreach($Shops as $Shop)
                            <option value={{ $Shop->id }}>{{ $Shop->name}} </option>
                          @endforeach 
                       </select>
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
                                   </tbody>
                                      <tr>
                                        <td colspan="" rowspan="" headers=""></td>
                                        <td colspan="" rowspan="" headers=""></td>
                                        <td colspan="" rowspan="" headers=""><input type="" class="form-control" name="" readonly></td>
                                        <td colspan="" rowspan="" headers=""><input type="" class="form-control" name="" readonly></td>
                                        <td colspan="" rowspan="" headers=""><p class="ProductWiseTotal" style="font-size: 18px;">0</p></td>
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
              '    <td id="1td">\n' +
              '        <select class="form-control Products" style="width:20em;" name="Stock[Product][]" >\n' +
                        @foreach($Products as $key=>$Product)
              '           <option value="{{ $Product->id }}">{{ $Product->Product_Name }}</option>\n' +
                        @endforeach
              '        </select>\n' +
              '    </td>\n' +
              '    <td id="2td">\n' +
              '        <input type="text" class="form-control Unit" name="Stock[Unit][]" value="">\n' +
              '    </td>\n' +
              '    <td id="3td">\n' +
              '        <input type="text" class="form-control Cost" name="Stock[Cost][]" value="">\n' +
              '    </td>\n' +
              '    <td id="4td">\n' +
              '        <input type="text" min="0" class="form-control Selling" name="Stock[Selling][]" value="">\n' +
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
          

          // $('.Products').select2({
          // });

          $('body').on('change keypress','.Products',function() {
            var Product = $(this).val();
            setTimeout(function() {
            $('.Products').trigger('change');
          }, 2000);
            $.ajax({
                type: "get",
                url: "{{ route('admin.GetProductDetails') }}",
                data: {Product: Product},
                success: (data)=> {
                  // return data;
                  $(this).parent().parent().find(".Cost").val(data.Cost_Price);
                  $(this).parent().parent().find(".Selling").val(data.Selling_Price);
                }
              });
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