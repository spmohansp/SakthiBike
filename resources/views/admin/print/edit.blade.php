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
                                        <select class="form-control" name="client_id"  id="Customer" >
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
                                        <div class="form-group">
                                            <input class="form-control nextrow " type="text" placeholder="Enter Quantity" min="1" id="qty">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" id="addbillproduct"  class="btn btn-primary "  style="padding:10px 20px;" > Add Product</button>
                                        </div>
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
                                                      <input type="checkbox" name="extraAmount[]" {{ in_array($ExtraWork->id, json_decode($Bill->extra_work_id)) ? '':'checked' }} class="ExtraWorkCheckBox" value="{{ $ExtraWork->id }}" data-extra-name="{{ $ExtraWork->name  }}" data-id="{{ $ExtraWork->amount }}"> {{ $ExtraWork->name }}
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
                                                    <input type="hidden" class="HiddenAppendExtraAmount" value="0">
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

        calculateTotal();

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
        
        $(document).ready(function() {
            $('.ExtraWorkCheckBox').trigger('click');
        });

        $('.ExtraWorkCheckBox').click('click',function(){
            var val = 0;
            var extra_amount_name = [];
            var extra_amount = [];
            var extra_total  = 0;
            var initial_total_amount=  +($('.HiddenTotalBill').val());
            var total_paid_amount = $('#total_paid_amount').val();
            var discount_amount = $('#discount_amount').val();
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
            
            $('#BalanceAmount').html(parseInt(total_amount - total_paid_amount - discount_amount));

            if(val == 0){
                $('#TOTALBILL').html($('.HiddenTotalBill').val());
                $('#appendExtraAmount').empty();

            }

            if(total_amount == 0){
                 $('#BalanceAmount').html(parseInt(initial_total_amount - total_paid_amount - discount_amount));
            }

        });

  </script>

@endsection