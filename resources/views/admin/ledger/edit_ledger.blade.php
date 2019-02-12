@extends('admin.layouts.master')

@section('Current-Page')
Edit Ledger
@endsection

@section('Parent-Menu')
  Ledger
@endsection

@section('Menu')
Edit Ledger
@endsection

@section('content')
    
    <div class="tile">
      <div class="pad">
        <div class="row">
          <div class="col-lg-2 col-xs-1"></div>
          <div class="col-lg-3 col-xs-4 ">
              <form action="{{ route('admin.updateLedger',$Ledger->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-form-label col-form-label-lg" for="inputLarge">Enter Name</label>
                  <input class="form-control form-control-lg" id="inputLarge" value="{{ $Ledger->name }}" type="text" name="name">
                </div>
                <div class="tile-footer">
                  <button class="btn btn-primary" type="submit">Update Ledger</button>
                </div>
            </form>
          </div>
          <div class="col-lg-7"></div>
        </div>
        <div class="row section-gap">
          <div class="col-lg-2"></div>
        </div>
      </div>
    </div>
  @endsection