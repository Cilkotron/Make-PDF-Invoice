@extends('layouts.app')

@section('title','Some Company Ltd. | Contact')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="card card-responsive">
            @include('partials.msg')
            <div class="card-header">
              <h4 class="card-title">Messages</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered"  id="table" style="width:100%">
                  <thead class="text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>

                @foreach($messages as $key => $message)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $message->name}}</td>
                        <td>{{ $message->email}}</td>
                        <td>{{ $message->subject}}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $message->message}}</td>
                        <td>
                         @if($message->status == true )
                                   <span class="badge badge-pill badge-success">Read</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Not Read</span>
                                @endif
                        </td>
                        <td>

                            <a href="{{ route('message.edit', $message->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fas fa-edit"></i></a>
                             @if($message->status == false)
                                <form id="status-form-{{ $message->id }}" action="{{ route('message.status', $message->id) }}" style="display: none;" method="POST">
                                    @csrf
                                </form>
                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Have you read this message?')){
                                        event.preventDefault();
                                        document.getElementById('status-form-{{ $message->id }}').submit();
                                        }else {
                                        event.preventDefault();
                                        }" title="mark as read"><i class="fas fa-check-square"></i></button>
                            @endif

                            <form id="delete-form-{{ $message->id }}" action="{{ route('message.delete', $message->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" title="delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $message->id }}').submit();
                            }else {
                                event.preventDefault();
                                    }"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

</div>

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush
