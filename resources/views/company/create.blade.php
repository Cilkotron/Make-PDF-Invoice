@extends('layouts.app')

@section('title','Konstruktiv Design | Company')
@section('content')

<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @include('partials.msg')
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add Company/Client Account </h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Company/Client Name</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="company_name">
                          </div>
                    </div>
                    <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Address</label>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="address">
                          </div>
                   </div>
                   <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Postcode</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="postcode">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">City</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Country</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="country">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Email</label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Phone</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                     <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">PIB</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="pib">
                        </div>
                    </div>
                     <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Matični broj</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="maticni">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right ml-3" type="submit">Save</button>
                            <a href="{{ route('company.index') }}" class="btn btn-danger float-right">Back</a>
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
