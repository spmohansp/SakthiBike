@extends('admin.billing.layouts.master')

@section('Current-Page')
Ledger
@endsection

@section('Parent-Menu')
Transactions
@endsection

@section('Menu')
Ledger
@endsection

@section('content')
    
    <div class="tile">
      <div class="pad">
        <div class="row section-gap">
          <div class="col-lg-2 col-xs-1"></div>
          <div class="col-lg-3 col-xs-4 ">
            <form action="{{ route('admin.addLedger') }}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
                <label class="col-form-label col-form-label-lg" for="inputLarge">Enter Name</label>
                <input class="form-control form-control-lg" id="inputLarge" type="text" name="name">
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" >Submit</button>
            </div>
          </form>
          </div>
          <div class="col-lg-7"></div>
        </div>
        <div class="row section-gap">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-4 col-xs-12">
              <div class="tile">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($ledger))
                    @foreach($Ledger as $Ledgers)
                    <tr>
                      <td>{{ $Ledgers->id }}</td>
                      <td>{{ $Ledgers->name }}</td>
                      <td>
                           <a href="{{ route('admin.editLedger',$Ledgers->id) }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true" style="color:#fff"></i></button></a>
                            <a href="{{ route('admin.deleteLedger',$Ledgers->id) }}"> <button class="btn btn-primary" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash" aria-hidden="true" style="color:#fff" ></i></button></a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="3">No Record Found(s)</td>
                    @endif
                   </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  @endsection