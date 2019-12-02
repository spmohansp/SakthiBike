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
                                <select class="form-control" name="client_id"  id="demoSelect" >
                                    <optgroup label="Select Customer">
                                        @foreach($Clients as $Client)
                                            <option value="{{ $Client->id }}" {{ old('client_id') == $Client->id ? 'selected' : '' }}>{{ $Client->name }} || {{ $Client->phone_no }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Payment type</label>
                                <div class="form-group">
                                    <select class="form-control Selectpicker"  onchange="paymentType()" name="payment_type" id="payment_type" style="width:100% !important" required>
                                        <optgroup label="Select Payment type" >
                                            <option value="cash" {{ old('payment_type') == "cash" ? 'selected' : '' }}>Cash</option>
                                            <option value="cheque" {{ old('payment_type') == "cheque" ? 'selected' : '' }}>Cheque</option>
                                            <option value="card" {{ old('payment_type') == "card" ? 'selected' : '' }}>Card</option>
                                        </optgroup>
                                    </select>
                                </div>
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
                                        <option value="3">Due</option>
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
                        <div class="col-md-4 payment2" style="display:none">
                            <div class="form-group">
                                <label>Due Amount</label><br>
                                <span id="DueAmount" name="" ></span>
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
                                    </tbody>
                                    <thead>
                                    <th colspan="7">
                                        <h4 class="pull-right"><b>Total</b> :</h4>
                                    </th>
                                    <th colspan="2">
                                        <h4><b><i class="fa fa-inr"></i> <b id="TOTALBILL"></b></b></h4>
                                    </th>

                                    </thead >
                                    <thead id="total_amount">
                                    <th colspan="7">
                                        <h4 class="pull-right"><b>Cash Given</b> :</h4>
                                    </th>
                                    <th colspan="2">
                                        <h4><b><i class="fa fa-inr"></i><b></b><input type="number" id="total_paid_amount" name="total_paid_amount" ></b></h4>
                                    </th>

                                    </thead>
                                    <thead id="balance_amount">
                                    <th colspan="7">
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

        $('#demoSelect').select2();
        $('.demoSelect1').select2();

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
      </script>




@endsection
