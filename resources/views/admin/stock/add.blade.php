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
                 <div class="col-lg-6">
                    <div class="form-group">
                       <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Quantity" name="quantity" required="">
                    </div>
                 </div>
               </div>
               <div class="row">
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
                <div class="row">
                    <div class="col-sm-12">
                       <div class="panel-group">
                          <div class="panel panel-default">
                             <div class="panel-heading">Add Stock
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
                                         <th>Action</th>
                                      </tr>
                                   </thead>
                                   <tbody class="StockDetailTableData">
                                      <tr>
                                         <td>
                                            <input type="text" class="form-control" name="Stock[Product][]" value="">
                                         </td>
                                         <td>
                                            <input type="number" min="0" class="form-control" name="Stock[Unit][]" value="">
                                         </td>
                                         <td>
                                            <input type="text" class="form-control" name="Stock[Cost][]" value="" disabled>
                                         </td>
                                         <td>
                                            <input type="number" min="0" class="form-control" name="Stock[Selling][]" value="" disabled>
                                         </td>
                                         <td><i style="color: red;" class="fa fa-close RemoveStockInput"></i></td>
                                      </tr>
                                   </tbody>
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
    <script>
      $( document ).ready(function() {
        $('.AddStock').on('click',function () {
          var stock_entry = '<tr>\n' +
              '    <td>\n' +
              '        <input type="text" class="form-control" name="Stock[Product][]" value="">\n' +
              '    </td>\n' +
               '    <td>\n' +
              '        <input type="text" class="form-control" name="Stock[Unit][]" value="">\n' +
              '    </td>\n' +
               '      <td>\n' +
              '        <input type="text" class="form-control" name="Stock[Cost][]" value="" disabled>\n' +
              '    </td>\n' +
              '    <td>\n' +
              '        <input type="number" min="0" class="form-control" name="Stock[Selling][]" value="" disabled>\n' +
              '    </td>\n' +
              '    <td class="RemoveStockInput" style="font-size: 18px;"><i style="color: red;" class="fa fa-close fa-10x"></i></td>\n' +
              '</tr>';
          $('.StockDetailTableData').append(stock_entry);
        });

        $('body').on('click','.RemoveStockInput',function (e) {
            e.preventDefault();
            $(this).parent().remove();
        });
      });
    </script>

=======
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
>>>>>>> 05c0f53cc5b58a06c7f3a164cd1804df77cffa2e
@endsection