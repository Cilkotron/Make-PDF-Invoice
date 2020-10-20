@extends('layouts.app')

@section('title','Konstruktiv Design | Service')
@section('content')

<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @include('partials.msg')
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add New Service</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body align-items-center">
                <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Title </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Description </label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                   </div>
                   <div class="row  my-3">
                        <div class="col-md-4">
                            <label class="bmd-label-floating float-right font-weight-bold">Price</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="price" step="any">
                        </div>
             </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right ml-3" type="submit">Save</button>
                            <a href="{{ route('service.index') }}" class="btn btn-danger float-right">Back</a>
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
