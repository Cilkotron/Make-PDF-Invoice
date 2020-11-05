@extends('layouts.app')

@section('title','Some Company Ltd. | Service')


@push('css')

@endpush

@section('content')

<div class="content my-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                @include('partials.msg')
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Service</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('service.update', $service->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row my-3">
                              <div class="col-md-4">
                                  <label class="bmd-label-floating float-right font-weight-bold">Title </label>
                              </div>
                              <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $service->title }}">
                              </div>
                        </div>
                        <div class="row my-3">
                              <div class="col-md-4">
                                  <label class="bmd-label-floating float-right font-weight-bold">Description</label>
                              </div>
                              <div class="col-md-6">
                                <textarea name="description" class="form-control" rows="3">{{ $service->description }}"</textarea>
                              </div>
                       </div>
                        <div class="row my-3">
                            <div class="col-md-4">
                                    <label class="bmd-label-floating float-right font-weight-bold">Price</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" step="any" name="price" value="{{ $service->price }}">
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

@push('scripts')

@endpush
