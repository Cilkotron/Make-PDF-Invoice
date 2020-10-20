@extends('layouts.app')

@section('title','Some Company Ltd. | Company')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{ route('company.create') }}" class="btn btn-primary btn-md mb-3">Add New</a>
          <div class="card card-responsive">
            @include('partials.msg')
            <div class="card-header">
              <h4 class="card-title">Companies/Clients</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered"  id="table" style="width:100%">
                  <thead class="text-primary">
                    <th>Company/Client Name</th>
                    <th>Address</th>
                    <th>Address Details</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>

                @foreach($companies as $key => $company)
                    <tr>
                        <td>{{ $company->company_name}}</td>
                        <td>{{ $company->address}}</td>
                        <td>{{ $company->postcode}}, {{ $company->city}}, {{ $company->country}}</td>
                        <td>{{ $company->email}}</td>
                        <td>{{ $company->phone}}</td>
                        <td>

                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="fas fa-edit"></i></a>

                            <form id="delete-form-{{ $company->id }}" action="{{ route('company.destroy',$company->id) }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" title="delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $company->id }}').submit();
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
