@extends('admin.layouts.master')

@section('Current-Page')
Edit Print
@endsection

@section('Parent-Menu')
Bill
@endsection

@section('Menu')
Edit Print
@endsection

@section('content')

        <div class="">
            <div class="row">
                <div class="col-md-12" style="padding:5px;">
                    <form action="{{ route('admin.UpdateBill',$Bill->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="tile">
                            <h3 style="margin-top:0px;">Customer Details</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Customer name</label>
                                        <select class="form-control CustomerName" name="client_id"  id="Customer" style="width: 31em;">
                                            <optgroup label="Select Customer">
                                                @foreach($Clients as $Client)
                                                    <option value="{{ $Client->id }}" {{ $Client->id==$Bill->id?'selected':'' }}>{{ $Client->name }} {{ $Client->phone_no }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" type="date" name="date" value="{{ $Bill->date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Vehicle Name </label>
                                    <div class="form-group">
                                        <input class="form-control VehicleName" id="Vehicle_Id" type="text" disabled>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Payment status</label>
                                        <select class="form-control Selectpicker" name="payment_status" id="payment_status" style="width:100% !important" required>
                                            <optgroup label="Select Payment" >
                                                <option value="1" {{ $Bill->payment_status=='1'?'selected':'' }} >Paid</option>
                                                <option value="2" {{ $Bill->payment_status=='3'?'selected':'' }}>Due</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employee Attended</label>
                                        <select class="form-control" name="employees[]" required multiple>
                                            @foreach($Employees as $Employee)
                                                <option value="{{ $Employee->id }}" {{ in_array($Employee->id, json_decode($Bill->employee_id)) ? 'selected' : '' }}>{{ $Employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tile">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label col-form-label-lg" for="inputLarge">Extra Work</label>
                                        <div style="float:right;">
                                            <button type="button" class="btn btn-primary btn-sm AddExtraWork" >Add Extra Work</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Extra Work</th>
                                            <th>Enter Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="AppendAddExtraWork">
                                        @foreach($BillExtraWorks as $BillExtraWork)
                                            <tr>
                                                <td>
                                                    <select class="form-control ExtraWorks" name="extrawork[]" style="width: 40em;">
                                                        <optgroup label="Select Extra Work">
                                                            @foreach($ExtraWorks as $ExtraWork)
                                                                <option value="{{ $ExtraWork->id }}" {{ in_array($ExtraWork->id, array($BillExtraWork->extra_work_id)) ? 'selected' : '' }}>{{ $ExtraWork->name }} </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control total_amount" type="number" onKeyUp="calculateTotal()" placeholder="Enter Amount" value="{{ $BillExtraWork->amount }}" name="amount[]" style="width: 40em;">
                                                </td>
                                                <td><i class="fa fa-close fa-1x RemoveExtraWorkButon btn" style="color:red;"></i></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tile">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Add Products</label>
                                </div>
                                <div class="col-md-4">
                                    <label>Quantity </label>
                                </div>
                                <div class="col-md-2">
                                    <label></label>
                                </div>
                                <div class="col-md-2">
                                    <label></label>
                                </div>
                            </div>
                            <div id="productsbilllist">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <select class="form-control Product" id="product_id" style="width: 31em;">
                                                {{-- <optgroup label="Select Products">
                                                    @foreach($Products as $Product)
                                                        <option value="{{ $Product->id }}">{{ $Product->Product_Name }}</option>
                                                    @endforeach
                                                </optgroup> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control nextrow Quantity" type="text" placeholder="Enter Quantity" min="1" id="qty">
                                            <span class="QuantityLimit" style="color:red;font-size: 18px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" id="addbillproduct"  class="btn btn-primary addbillproduct"  style="padding:10px 20px;" > Add Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="-body table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Cost</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="productbilltable">
                                                @foreach($Bill->BillProducts as $Product)
                                                    <tr><input type="hidden" value="{{ $Product->id }}" name="bill_Product[]">
                                                        <th>{{ @$Product->Product->Product_Name }}<input type="hidden" value="{{ $Product->Product->id }}" name="product_id[]"></th>
                                                        <th>{{ $Product->quantity }}<input type="hidden" value="{{ $Product->quantity }}" name="qty[]"></th>
                                                        <th>{{  @$Product->Product->Selling_Price }}</th>
                                                        <th>{{ $Product->Total_Cost }}<input type="hidden" class="total_amount" value="{{ $Product->Total_Cost }}" name="total_amount[]"></th>
                                                        <th><button type="button" class="btn btn-primary btn-sm RemoveProductButon"><i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody id="appendExtraAmount">
                                            </tbody>
                                            <thead>
                                                <th colspan="4">
                                                    <h4 class="pull-right"><b>Total</b> :</h4>
                                                    <input type="hidden" class="HiddenTotalBill" value="0">
                                                </th>
                                                <th colspan="1">
                                                    <h4><b><i class="fa fa-inr"></i> <b id="TOTALBILL"></b></b></h4>
                                                </th>

                                            </thead>
                                            <thead id="total_amount">
                                                <th colspan="4">
                                                    <h4 class="pull-right"><b>Cash Given</b> :</h4>
                                                </th>
                                                <th colspan="1">
                                                    <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="total_paid_amount" value="{{ $Bill->bill_amount_given }}" name="bill_amount_given" required></b></h4>
                                                </th>

                                            </thead>

                                            <thead id="discount">
                                                <th colspan="4">
                                                    <h4 class="pull-right"><b>Discount</b> :</h4>
                                                </th>
                                                <th colspan="2">
                                                    <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="discount_amount" name="discount_amount" value="{{ $Bill->discount_amount }}"></b></h4>
                                                </th>

                                            </thead>

                                            <thead id="balance_amount">
                                                <th colspan="4">
                                                    <h4 class="pull-right"><b>Balance</b> :  </h4>
                                                </th>
                                                <th colspan="1">
                                                    <h4><b><i class="fa fa-inr"></i><b id="BalanceAmount" name="BalanceAmount" ></b></b></h4>
                                                </th>
                                            </thead>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="col-md-8" style="text-align: right">
                                        <button type="submit" name="print" value="1" class="btn btn-primary" style="padding:10px 20px;" >Print Bill</button>
                                        <button type="submit" class="btn btn-success" style="padding:10px 20px;" >Save Bill</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('loadMore')

    <script src="{{ url('billing/js/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('billing/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('billing/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $(".total_amount").trigger('click');
            calculateTotal();
        });

        $('#sl').click(function(){
            $('#tl').loadingBtn();
            $('#tb').loadingBtn({ text : "Signing In"});
        });

        $('#el').click(function(){
            $('#tl').loadingBtnComplete();
            $('#tb').loadingBtnComplete({ html : "Sign In"});
        });

        $('#demoDate').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

        $('#Customer').select2();
        $('.Product').select2();
        $('.ExtraWorks').select2();

        VehicleDetails();

        $(document).ready(function() {

            $(".CustomerName").on('change',function (e) {
            e.preventDefault();
                VehicleDetails();
            });


            $("#addbillproduct").click(function (e) {
            e.preventDefault();
                var product_id = $("#product_id").val();
                var qty = $("#qty").val();
                if(product_id !='' && qty !=''){
                    $.ajax({
                        type: 'get',
                        url: '/admin/product/getProduct',
                        data:{product_id:product_id,qty:qty},
                        success:function (data) {
                            $('#productbilltable').prepend(data);
                            calculateTotal();
                        }
                    });
                }
            });

            $('body').on("click", ".RemoveProductButon", function (e) { // REMOVE HALT
                e.preventDefault();
                $(this).parent().parent().remove();
                calculateTotal();
            });

            $('body').on('change keyup','.Product,.Quantity',function (e) {
                e.preventDefault();
                var product_id = $("#product_id").val();
                var qty = $("#qty").val();
                if(product_id !=''){
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.GetProductStock') }}",
                        data:{product_id:product_id},
                        success:function (data) {
                            if(qty>0){
                            console.log(data);
                                if(data.BillProduct!= null){
                                    var calc = data.StockDetail.Unit - data.BillProduct;
                                    count(qty,calc);
                                }else{
                                    var calc = data.StockDetail.Unit;
                                    count(qty,calc);
                                }
                            }else{
                                count(qty,0);
                                $(".addbillproduct").hide();
                            }
                        }
                    });
                }
             });

            function count(qty,calc) {
                if(qty<=calc){
                    $(".addbillproduct").show();
                }else{
                    $(".addbillproduct").hide();
                    $(".QuantityLimit").text('Your Quanity Limit is '+calc);
                }
            }

            $('body').on("click", ".AddExtraWork", function (e) { 
                e.preventDefault();
                var ExtraWork = 
                '     <tr>\n' +
                '        <td colspan="" rowspan="" headers="">\n' +
                '           <select class="form-control ExtraWorks" name="extrawork[]">\n' +
                '               <optgroup label="Select Extra Work">\n' +
                                    @foreach($ExtraWorks as $ExtraWork)
                '                       <option value={{ $ExtraWork->id }}>{{ $ExtraWork->name }} </option>\n' +
                                    @endforeach
                '               </optgroup>\n' +
                '           </select>\n' +
                '       </td>\n' +
                '       <td colspan="" rowspan="" headers="">\n'+
                '           <input class="form-control total_amount" id="" type="number" onKeyUp="calculateTotal()" placeholder="Enter Amount" name="amount[]">\n' +
                '       </td>\n' +
                '       <td colspan="" rowspan="" headers="">\n' +
                '           <i class="fa fa-close fa-1x RemoveExtraWorkButon btn" style="color:red;"></i>\n' +
                '       </td>\n' +
                '    </tr>';
                $('.AppendAddExtraWork').append(ExtraWork);
            });

            $('body').on("click", ".RemoveExtraWorkButon", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                calculateTotal();
            });

            $('#total_paid_amount').on('keyup',function (e) {
                e.preventDefault();
                calculateTotal()
            });

            $('#paid_amount').on('keyup',function (e) {
                e.preventDefault();
                calculateTotal()
            });

            $('#discount_amount').on('keyup',function (e) {
                e.preventDefault();
                calculateTotal()
            });


        });


        function calculateTotal() {
            var total=0;
            $(".total_amount").each(function() {
                total = parseInt($(this).val()) + parseInt(total);
            });
            $('#TOTALBILL').html(total);
            $('.HiddenTotalBill').val(total);
            $('#BalanceAmount').html(parseInt(total) - parseInt($('#total_paid_amount').val()) - parseInt($('#discount_amount').val()) );
            $('#DueAmount').html(parseInt(total) - parseInt($('#paid_amount').val()));
        }

        function paymentType()
        {
            var payment_type=$("#payment_type").val();

            if(payment_type=='cheque'||'card')
            {
                $("#total_amount").hide();
                $("#balance_amount").hide();
            }
            if(payment_type=='cash')
            {
                $("#total_amount").show();
                $("#balance_amount").show();
            }
        }

        function VehicleDetails()
        {
            Customer_Id = $(".CustomerName").val();
            $.ajax({
                type: 'get',
                url: '{{ route('admin.GetVehicleName') }}',
                data:{Customer_Id:Customer_Id},
                success:function (data) {
                    $('#Vehicle_Id').val(data.vehicle_type.name);
                    var Product = '<option value="">Select</option>';
                    $.each(data.Products, function (index, value) {
                        Product += '<option value="'+value.id+'">'+value.Product_Name+'</option>';
                    });
                    $('.Product').html(Product);
                }
            });
        }

    </script>

@endsection
