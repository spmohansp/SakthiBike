@extends('admin.layouts.master')

@section('Current-Page')
Add Print 
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Add Print
@endsection

@section('content')

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.saveClient') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="" aria-describedby="emailHelp" placeholder="Enter Customer Name" name="name">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <input class="form-control form-control-lg" id="" type="number" aria-describedby="emailHelp" placeholder="Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" value="{{ old('phone_number') }}" name="phone_number" minlength="0" maxlength="10">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Bike Number" name="bike_no">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <input class="form-control form-control-lg" id="" type="text" aria-describedby="emailHelp" placeholder="Enter Service Km" name="service_km">
                                      </div>
                                    </div>
                                  </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit">Add Client</button>
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

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.saveBill') }}" method="post">
                {{ csrf_field() }}
                <div class="tile">
                    <h3 style="margin-top:0px;">Customer Details</h3>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                 <label>Enter Customer name</label>
                                <div style="float:right;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Customer</button>
                                </div>
                                <select class="form-control" name="client_id"  id="Customer" >
                                    <optgroup label="Select Customer">
                                        @foreach($Clients as $Client)
                                            <option value="{{ $Client->id }}" {{ old('client_id') == $Client->id ? 'selected' : '' }}>{{ $Client->name }} || {{ $Client->phone_number }} || {{ $Client->bike_no }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
                            </div>
                        </div>   
                    </div>

                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payment status</label>
                                <select class="form-control Selectpicker" onchange="showpaymentstatus()" name="payment_status" id="payment_status" style="width:100% !important" required>
                                    <optgroup label="Select Payment" >
                                        <option value="1">Paid</option>
                                        <option value="2">Partially Paid</option>
                                        <option value="3">Not Paid</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 payment2" style="display:none">
                            <div class="form-group">
                                <label>Paid Amount</label>
                                <input class="form-control nextrow" type="text" placeholder="Enter Amount" min="1" name="paid_amount" id="paid_amount" onchange="showdueamount()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Attended</label>
                                <select class="form-control" name="employees[]" required multiple>
                                    @foreach($Employees as $Employee)
                                        <option value="{{ $Employee->id }}">{{ $Employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Add Products</label>
                            <div class="form-group" >
                                <select class="form-control Product" id="product_id">
                                    <optgroup label="Select Products">
                                        @foreach($Products as $Product)
                                            <option value="{{ $Product->id }}">{{ $Product->Product_Name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Quantity </label>
                            <div class="form-group">
                                <input class="form-control nextrow Quantity" type="text" placeholder="Enter Quantity" min="1" id="qty">
                                <span class="QuantityLimit" style="color:red;font-size: 18px;"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label></label>
                            <div class="form-group">
                                <button type="button" id="addbillproduct"  class="btn btn-primary addbillproduct"  style="padding:10px 20px;" > Add Product</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tile">
                    <div class="row">
                        <div class="col-md-12">
                            <label><h5><b>Extra Work</b></h5></label>
                            <div class="row">
                                 @foreach($ExtraWorks as $ExtraWork)
                                    <div class="col-sm-1">
                                        <div class="input-group ">
                                            <span class="input-group-addon">
                                              <input type="checkbox" name="extraAmount[]" class="ExtraWorkCheckBox" value="{{ $ExtraWork->id }}" data-extra-name="{{ $ExtraWork->name  }}" data-id="{{ $ExtraWork->amount }}"> {{ $ExtraWork->name }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
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
                                    </tbody>
                                    
                                    <tbody id="appendExtraAmount">
                                    </tbody>

                                    <thead>
                                        <th colspan="4">
                                            <h4 class="pull-right"><b>Total</b> :</h4>
                                            <input type="hidden" class="HiddenTotalBill" value="0">
                                            <input type="hidden" class="HiddenAppendExtraAmount" value="0">
                                        </th>
                                        <th colspan="1">
                                            <h4><b><i class="fa fa-inr"></i> <b id="TOTALBILL"></b></b></h4>
                                        </th>
                                    </thead >

                                    <thead id="total_amount">
                                        <th colspan="4">
                                            <h4 class="pull-right"><b>Cash Given</b> :</h4>
                                        </th>
                                        <th colspan="2">
                                            <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="total_paid_amount" name="total_paid_amount" ></b></h4>
                                        </th>

                                    </thead>

                                    <thead id="discount">
                                        <th colspan="4">
                                            <h4 class="pull-right"><b>Discount</b> :</h4>
                                        </th>
                                        <th colspan="2">
                                            <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="discount_amount" name="discount_amount" value="0"></b></h4>
                                        </th>

                                    </thead>

                                    <thead id="balance_amount">
                                        <th colspan="4">
                                            <h4 class="pull-right"><b>Balance</b> :  </h4>
                                        </th>
                                        <th colspan="2">
                                            <h4><b><i class="fa fa-inr"></i><b id="BalanceAmount"></b></b></h4>
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

   @endsection

@section('loadMore')

    <script src="{{ url('billing/js/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('billing/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('billing/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript">
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

    </script>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#TOTALBILL').html(0);
                $("#addbillproduct").click(function () {
                    var product_id = $("#product_id").val();
                    var qty = $("#qty").val();
                    if(product_id !='' && qty !=''){
                        $.ajax({
                            type: 'get',
                            url: '/admin/product/getProduct',
                            data:{product_id:product_id,qty:qty},
                            success:function (data) {
                                $('#productbilltable').append(data);
                                calculateTotal();
                                GetQuantityCount(product_id,qty);
                            }
                        });
                    }
                 });

                function GetQuantityCount(product_id,qty) {
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.GetProductCount') }}",
                        data:{product_id:product_id,qty:qty},
                        success:function (data) {
                            var count = data.Unit - qty;
                            if(count >0){
                                $(".addbillproduct").show();
                            }else{
                                $(".addbillproduct").hide();
                                $(".QuantityLimit").text('Your Quanity Limit is '+data.Unit);
                            }
                        }
                    });
                }

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
                                var Count = data.Unit;
                                //console.log(Count);
                                if(qty<=Count){
                                    $(".addbillproduct").show();
                                }else{
                                    $(".addbillproduct").hide();
                                    $(".QuantityLimit").text('Your Quanity Limit is '+Count);
                                }
                            }
                        });
                    }
                 });

                $('body').on("click", ".RemoveProductButon", function (e) { // REMOVE HALT
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
                totalAmount = parseInt(total)+ parseInt($('.HiddenAppendExtraAmount').val() );
                $('#TOTALBILL').html(totalAmount);
                $('.HiddenTotalBill').val(total);
                $('#BalanceAmount').html(parseInt(totalAmount) - parseInt($('#total_paid_amount').val()) - parseInt($('#discount_amount').val()) );
                $('#DueAmount').html(parseInt(total) - parseInt($('#paid_amount').val()));
            }
    </script>
    <script>
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

        function showpaymentstatus()
        {
            var payment_status=$("#payment_status").val();
            if(payment_status==2)
            {
                $(".payment2").show();
            }
            else
            {
                $(".payment2").hide();
            }
        }

        $('.ExtraWorkCheckBox').click('click',function(e){

            var val = 0;
            var extra_amount_name = [];
            var extra_amount = [];
            var extra_total  = 0;
            var initial_total_amount=  +($('.HiddenTotalBill').val());
            var total_paid_amount = $('#total_paid_amount').val();
            var total_amount= 0;

            $('.ExtraWorkCheckBox:checkbox:checked').each(function(i){
                
                extra_amount_name[i] = {
                    name :   $(this).attr('data-extra-name')  ,
                    amount:  $(this).attr('data-id')
                };

                val = parseInt(val) + parseInt($(this).attr('data-id'));
                $('.HiddenAppendExtraAmount').val(val);
                $('#TOTALBILL').html(parseInt(val + initial_total_amount));
                total_amount = parseInt(val + initial_total_amount);
            });


            $('#appendExtraAmount').empty();

            $.each(extra_amount_name,function(index , value){
                    $('#appendExtraAmount').append(
                                           '<tr>'+
                                            '<td colspan="4"><h4 class="pull-right"><b>' + value.name + '</b> :</h4> </td>'+
                                            '<td colspan="1"> <h4><b><i class="fa fa-inr"></i> <b>'+ value.amount +'</b></b></h4> </td>'+
                                            '</tr>');


            });
            
            $('#BalanceAmount').html(parseInt(total_amount - total_paid_amount));

            if(val == 0){
                $('#TOTALBILL').html($('.HiddenTotalBill').val());
                $('#appendExtraAmount').empty();

            }

            if(total_amount == 0){
                 $('#BalanceAmount').html(parseInt(initial_total_amount - total_paid_amount));
            }

        });

      </script>




@endsection
