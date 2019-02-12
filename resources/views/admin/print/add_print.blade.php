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
    <div class="tile">
      <div class="pad">
        <div class="row  ">
          <div class="col-lg-8">

          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="button" >Save Invoice</button>
          </div>
        </div><br>
        <div class="row">
          <div class="col-lg-2 "></div>

          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="tile-body">
              <label class="col-form-label col-form-label-lg" for="inputLarge">Customer Mobile Number</label>
                <select class="form-control" id="demoSelect" multiple="">
                  <optgroup label="Select Cities">
                    <option>9876543210</option>
                    <option>9876543211</option>
                    <option>9876543213</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9811265410</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                    <option>9876543210</option>
                  </optgroup>
                </select>
              </div>
          </div>
          <div class="col-lg-4 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Customer Name</label>

            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-4 col-xs-4">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg" for="exampleSelect1">Payment Status</label>
              <select class="form-control" id="exampleSelect1">
                <option>Paid</option>
                <option>Not Paid</option>
                <option>Pending</otion>
              </select>
          </div>
          </div>
          <div class="col-lg-7"></div>
        </div>

      </div>
    </div>
    <div class="tile">
      <div class="pad">

        <div class="row">
          <div class="col-lg-2 "></div>

          <div class="col-lg-2 col-xs-4 w3-center">
            <div class="tile-body">
              <label class="col-form-label col-form-label-lg" for="exampleSelect1"></label>
              <input class="form-control form-control" id="inputLarge" placeholder="Enter Name" type="text">

              </div>
          </div>
          <div class="col-lg-2 col-xs-4 w3-center">
            <div class="form-group">
              <label class="col-form-label col-form-label-lg" for="exampleSelect1"></label>
                <input class="form-control form-control" id="inputLarge" placeholder="Enter Quantity" type="text">

            </div>

          </div>
          <div class="col-lg-2 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">CGST</label>

            </div>

          </div>
          <div class="col-lg-2 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">SGST</label>

            </div>

          </div>
          <div class="col-lg-2 col-xs-4 w3-center">
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">CESS</label>

            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary"style="margin-left:62.8%" type="submit" > <i class="fa fa-plus"></i> Add</button>
          </div>
        </div>

      </div>
    </div>
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th> Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>CGST</th>
                  <th>SGST</th>
                  <th>CESS</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th colspan="2"></th>
                  <th colspan="5" style="text-align:right"> <h4>Total : </h4> </th>
                  <th></th>
                </tr>
                <tr>
                  <th colspan="2"></th>
                  <th colspan="5" style="text-align:right"> <h4>Discount : </h4> </th>
                  <th></th>
                </tr>
                <tr>
                  <th colspan="2"></th>
                  <th colspan="5" style="text-align:right"> <h4>Grand Total : </h4> </th>
                  <th></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
 
  <script src="js/jquery-3.2.1.min.js"></script>


    <!-- The javascript plugin to display page loading on top-->

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
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
    </script>

   @endsection 