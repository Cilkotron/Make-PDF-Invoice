@extends('layouts.app')

@section('title','Konstruktiv Design | Invoice')

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
              <h4 class="card-title">Invoices</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered"  id="table" style="width:100%">
                  <thead class="text-primary">

                    <th>Id</th>
                    <th>Company/Client Name</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Services</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                @if($bills)
                @foreach($bills as $key => $bill)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @foreach($companies as $company)
                                @if($company->id == $bill['company_id'])
                                {{ $company['company_name'] }}
                                @endif
                            @endforeach
                       </td>

                        <td>{{ $bill['invoice_number'] }}</td>
                        <td>{{ $bill['invoice_date']}}</td>
                        <td>
                            @dd($bill->invoice)
                            @foreach($bill->invoice['items'] as $item )
                                {{$item['item']['title']}}, qty: {{ $item['qty'] }}, total: {{ number_format($item['price'], 2) }} <span><b>&#8658;</b></span>
                            @endforeach
                        </td>
                        <td>{{ number_format($bill->invoice['totalPrice'], 2) }}</td>
                        <td>

                            <a href="{{ route('service.pdfBill', $bill['id'] ) }}" class="btn btn-info btn-sm" title="pdf"><i class="fas fa-file-pdf"></i></a>

                            <form id="delete-form-{{ $bill['id'] }}" action="{{route('service.delete',  $bill['id'] )   }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" title="delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $bill['id'] }}').submit();
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


@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush


@endsection
