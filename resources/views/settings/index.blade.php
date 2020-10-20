@extends('layouts.app')

@section('title','Some Company Ltd. | Owner Settings')
@section('content')

<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @include('partials.msg')
            <div class="card-header card-header-primary">
              <h4 class="card-title">Owner Company Settings</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('settings.update', $owner->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Company Name</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="company_name" value="{{ $owner->company_name }}">
                          </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Contact Person</label>
                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="contact_person" value="{{ $owner->contact_person }}">
                        </div>
                    </div>
                    <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Address</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="address"  value="{{ $owner->address}}">
                          </div>
                   </div>
                   <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Postcode</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="postcode"  value="{{ $owner->postcode }}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">City</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="city"  value="{{ $owner->city }}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Country</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="country"  value="{{ $owner->country }}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Email</label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email"  value="{{ $owner->email }}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Phone</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone"  value="{{ $owner->phone }}">
                        </div>
                    </div>
                     <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Vat Id</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pib"  value="{{ $owner->pib }}">
                        </div>
                    </div>
                     <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Company Id</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="maticni"  value="{{ $owner->maticni }}">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Bank Account</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="bank_account"  value="{{ $owner->bank_account }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right ml-3" type="submit">Save</button>
                            <a href="{{ route('home') }}" class="btn btn-danger float-right">Back</a>
                        </div>
                    </div>

                </form>

            </div>
          </div>
        </div>

      </div>
    </div>

</div>

@endsection
