@extends('layouts.app')

@section('title','Some Company Ltd. | Service')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{ route('service.create') }}" class="btn btn-primary btn-md mb-3">Add New</a>
          <div class="card card-responsive">
            @include('partials.msg')
            <div class="card-header">
              <h4 class="card-title">Services</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered"  id="table" style="width:100%">
                  <thead class="text-primary">

                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                @if($services)
                @foreach($services as $key => $service)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $service->title }}</td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $service->description }}</td>
                        <td>{{ $service->price }}</td>
                        <td>

                            <a href="{{ route('service.addToInvoice', $id = $service->id, ['id' => $service->id] ) }}" class="btn btn-info btn-sm" title="add to invoice"><i class="fas fa-file-pdf"></i></a>
                            <a href="{{ route('service.edit',$service->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fas fa-edit"></i></a>

                            <form id="delete-form-{{ $service->id }}" action="{{ route('service.destroy',$service->id) }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" title="delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $service->id }}').submit();
                            }else {
                                event.preventDefault();
                                    }"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                @endif

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
