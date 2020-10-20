@extends('layouts.app')

@section('title','Konstruktiv Design | Contact')


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
                  <h4 class="card-title">Edit Message</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                        <div class="row my-3">
                            <div class="col-md-4">
                                <label class="bmd-label-floating float-right font-weight-bold">Name</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="name" value="{{ $message->name }}">
                            </div>
                      </div>
                      <div class="row my-3">
                            <div class="col-md-4">
                                <label class="bmd-label-floating float-right font-weight-bold">Email</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="email" value="{{ $message->email }}">
                            </div>
                     </div>
                     <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Subject</label>
                          </div>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="subject" value="{{ $message->subject}}">
                          </div>
                      </div>
                      <div class="row my-3">
                          <div class="col-md-4">
                              <label class="bmd-label-floating float-right font-weight-bold">Message</label>
                          </div>
                          <div class="col-md-6">
                                 <textarea class="form-control" name="message" rows="3">{{ $message->message }}</textarea>
                          </div>
                      </div>
  
                
                        <div class="row">
                            <div class="col-md-12">
                                 @if($message->status == false)
                                    <form id="status-form-{{ $message->id }}" action="{{ route('message.status', $message->id) }}" style="display: none;" method="POST">
                                        @csrf
                                    </form>
                                    <button type="button" class="btn btn-info float-right ml-3" onclick="if(confirm('Have you read this message?')){
                                            event.preventDefault();
                                            document.getElementById('status-form-{{ $message->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }" title="mark as read">Mark
                                    </button>
                                @endif
                                <a href="{{ route('message.index') }}" class="btn btn-danger float-right">Back</a>
                            </div>
                        </div>


                </div>
              </div>
            </div>

          </div>
        </div>

</div>

@endsection

@push('scripts')

@endpush
