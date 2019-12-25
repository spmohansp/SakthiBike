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
        <div class="row">
                  <div class="col-lg-12">
                    <div class="">
                          <div class="row" >
                            <div class="col-lg-3">
                              Show
                                <select style="width:30%" class="form-control-sm " onchange="()" id="">
                                  <option value="10">10</option>
                                  <option value="25">25</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                  <option value="All">All</option>
                                </select>
                            Entries
                            </div>
                            <div class="col-lg-7">
                            </div>
                            <div class="col-lg-2">
                              <form onsubmit="return tablesearch()">
                                <input class="form-control" onchange="return tablesearch()" type="text" id="search" placeholder="Search" >
                              </form>
                            </div>
                          </div>
                          <br>
                      <div class="card-body table-responsive" id="printdiv">
                        <table class="table table-hover table-bordered" id="reporttable">
                          <thead>
                            <tr>
                              <th class="csvth">S.no</th>
                              <th class="csvth">Date</th>
                              <th class="csvth">Bill No</th>
                              <th class="csvth">Customer Name</th>
                              <th class="csvth">Total Cost</th>
                              <th class="csvth">Balance</th>
                              <th class="csvth">Status</th>
                              <th class="hidden-print" ><center>Action</center></th>
                            </tr>
                          </thead>
                          <tbody  id="tablebody">
                            @foreach($Bills as $key=>$Bill)
                              <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $Bill->date }}</td>
                                <td>{{ $Bill->bill_number }}</td>
                                <td>{{ @$Bill->Client->name }}</td>
                                <td>{{ @$Bill->bill_amount }}</td>
                                <td>{{ @$Bill->balance_amount }}</td>
                                <td>{{ $Bill->payment_status }}</td>
                                <td><a href="{{ route('admin.editPrint',$Bill->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                                <a href="{{ route('admin.printBill',$Bill->id) }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true" style="color:#fff"></i></button></a>
                                <a href="{{ route('admin.deleteBill',$Bill->id) }}"><button class="btn btn-primary" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true" style="color:#fff"></i></button></a></td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="pull-right" id="tablepagination">
                    </div>
                    <br>
                      <br>
                        <br>
                    </div>
                  </div>
                </div>
      </div>
    </div>
@endsection
