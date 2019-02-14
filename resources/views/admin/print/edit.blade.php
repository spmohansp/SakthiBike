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
            <div class="pad">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-12" style="padding:5px;">

                        <form action="{{ route('admin.UpdateBill',$Bill->id) }}" method="post">
                            {{ csrf_field() }}
                        <div class="tile">
                            <h3 style="margin-top:0px;">Customer Details</h3>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Customer name</label>
                                        <select class="form-control" name="client_id"  id="demoSelect" >
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
                                        <label>Customer Name</label>
                                        <br>
                                        <span id="client_name"></span>
                                        <!--<select class="form-control Selectpicker" style="width:100% !important">
                                            <option>Enter Customer Phone Number</option>
                                            <option>Product1</option>
                                            <option>Product2</option>
                                        </select>-->
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success " style="padding:10px 20px;" >Save Bill</button>
                                    <!--
                                    <div class="form-group">
                                      <label>Bill No</label>
                                        <input class="form-control mobilenumber" type="text" placeholder="Enter Bill No" disabled>
                                    </div>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Payment type</label>
                                        <div class="form-group" >
                                            <select class="form-control Selectpicker"  onchange="paymentType()" name="payment_type" id="discount_type" style="width:100% !important" required>
                                                <optgroup label="Select Payment type" >
                                                    <option value="cash" {{ $Bill->payment_type=='cash'?'selected':'' }}>Cash</option>
                                                    <option value="cheque" {{ $Bill->payment_type=='cheque'?'selected':'' }}>Cheque</option>
                                                    <option value="card" {{ $Bill->payment_type=='card'?'selected':'' }}>Card</option>
                                                </optgroup>
                                            </select>
                                        </div>
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
                                        <select class="form-control Selectpicker" onchange="showpaymentstatus()" name="payment_status" id="payment_status" style="width:100% !important" required>
                                            <optgroup label="Select Payment" >
                                                <option value="1" {{ $Bill->payment_status=='1'?'selected':'' }} >Paid</option>
                                                <option value="2" {{ $Bill->payment_status=='2'?'selected':'' }}>Partially Paid</option>
                                                <option value="3" {{ $Bill->payment_status=='3'?'selected':'' }}>Due</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 payment2" style="display:none">
                                    <div class="form-group">
                                        <label>Paid Amount</label>
                                        <input class="form-control nextrow" value="{{ $Bill->paid_amount }}" type="text" placeholder="Enter Amount" min="1" name="paid_amount" id="paid_amount" onchange="showdueamount()">
                                    </div>
                                </div>
                                <div class="col-md-4 payment2" style="display:none">
                                    <div class="form-group">
                                        <label>Due Amount</label><br>
                                        <span id="DueAmount">{{ $Bill->Due_Amount }}</span>
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
                                                <select class="form-control demoSelect1" id="product_id">
                                                    <optgroup label="Select Products">
                                                        @foreach($Products as $Product)
                                                            <option value="{{ $Product->id }}">{{ $Product->Product_Name_English }}</option>
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
                                                <th>CGST</th>
                                                <th>SGST</th>
                                                <th>CESS</th>
                                                <th>Total Cost</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="productbilltable">
                                                @foreach($Bill->BillProducts as $Product)
                                                    <tr><input type="hidden" value="{{ $Product->id }}" name="bill_Product[]">
                                                        <th>{{ @$Product->Product->Product_Name_English }}<input type="hidden" value="{{ $Product->Product->id }}" name="product_id[]"></th>
                                                        <th>{{ $Product->quantity }}<input type="hidden" value="{{ $Product->quantity }}" name="qty[]"></th>
                                                        <th>{{  @$Product->Product->Selling_Price }}</th>
                                                        <th>{{ $Product->CGST }}<input type="hidden" value="{{ $Product->CGST }}" name="CGST[]"></th>
                                                        <th>{{ $Product->SGST }}<input type="hidden" value="{{ $Product->SGST }}" name="SGST[]"></th>
                                                        <th>{{ $Product->CESS }}<input type="hidden" value="{{ $Product->CESS }}" name="CESS[]"></th>
                                                        <th>{{ $Product->Total_Cost }}<input type="hidden" class="total_amount" value="{{ $Product->Total_Cost }}" name="total_amount[]"></th>
                                                        <th><button type="button" class="btn btn-primary btn-sm RemoveProductButon"><i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <th colspan="7">
                                                    <h4 class="pull-right"><b>Total</b> :</h4>
                                                </th>
                                                <th colspan="2">
                                                    <h4><b><i class="fa fa-inr"></i> <b id="TOTALBILL"></b></b></h4>
                                                </th>

                                            </thead>
                                            <thead id="total_amount">
                                                <th colspan="7">
                                                    <h4 class="pull-right"><b>Cash Given</b> :</h4>
                                                </th>
                                                <th colspan="2">
                                                    <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="total_paid_amount" value="{{ $Bill->paid_amount }}" name="paid_amount" required></b></h4>
                                                </th>

                                            </thead>
                                            <thead id="balance_amount">
                                                <th colspan="7">
                                                    <h4 class="pull-right"><b>Balance</b> :  </h4>
                                                </th>
                                                <th colspan="2">
                                                    <h4><b><i class="fa fa-inr"></i><b id="BalanceAmount" name="BalanceAmount" ></b></b></h4>
                                                </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </form>

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

        $('#demoSelect').select2();
        $('.demoSelect1').select2();

    </script>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#TOTALBILL').html(0);
                calculateTotal();
                paymentType();
                showpaymentstatus();
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
                            }
                        });
                    }
                 });

                $('body').on("click", ".RemoveProductButon", function (e) { // REMOVE HALT
                    e.preventDefault();
                    $(this).parent().parent().remove();
                    calculateTotal();
                });
                $('#paid_amount').on('keyup',function (e) {
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
                $('#BalanceAmount').html(parseInt($('#total_paid_amount').val()) - parseInt(total) );
                $('#DueAmount').html(parseInt(total) - parseInt($('#paid_amount').val()));
            }

        function paymentType() {
            var payment_type=$("#payment_type").val();

            if(payment_type=='cheque'||'card') {
                $("#total_amount").hide();
                $("#balance_amount").hide();
            } else if(payment_type=='cash') {
                $("#total_amount").show();
                $("#balance_amount").show();
            }
        }

        function showpaymentstatus() {
            var payment_status=$("#payment_status").val();
            console.log(payment_status);
            if(payment_status==2) {
                $(".payment2").show();
            }  else {
                $(".payment2").hide();
            }
        }
    </script>
@endsection
