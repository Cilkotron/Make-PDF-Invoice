@extends('layouts.app')

@section('title','Some Company Ltd. | Invoice')




@section('content')
<section class="page-section portfolio" id="portfolio">
    <div class="container mt-5">
        <div class="information">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-thumbnail" src="{{ asset('img/logo2.png') }}" alt="Some Company Logo" style="height:200px; width: 400px; display: block; margin: 0 auto;" />
                </div>
               <div class="col-md-6">
                   @if($owner)
                    <h3>{{ $owner->company_name }}</h3>
                    <h5>{{ $owner->contact_person }}</h5>
                    <span> {{ $owner->email }} | <a href="#" style="color: blue; ">www.somecompany.com</a></span>
                    <br>
                    <span>{{ $owner->phone }} </span>
                    <br>
                    <span>{{ $owner->address }}, {{ $owner->postcode }} {{ $owner->city }}, {{ $owner->country }}</span>
                    <br>
                    <span>VAT: {{ $owner->pib }} | Company ID: {{ $owner->maticni }}</span>
                    <br>
                    <span>Bank account: {{ $owner->bank_account }}</span>
                    @endif
               </div>

            </div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('invoice'))
                <form action="{{ route('service.addBill') }}" method="POST">
                    @csrf
                    <table class="table-resposive">
                        <thead>
                            <th>Company/Client</th>
                        </thead>
                        <tr>
                            <td class="one">
                                <select class="form-control" name="company_id" id="">
                                    <option value="" selected disabled>--Please select--</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table-resposive">
                        <thead>
                            <th>Invoice Number</th>
                            <th>Invoice Date </th>
                            <th>Invoice Currency</th>
                        </thead>
                        <tr>
                            <td class="eight"><input class="form-control" type="text" name="invoice_number" placeholder="Invoice Number"></td>
                            <td class="nine"><input class="form-control" type="date" name="invoice_date" placeholder="Invoice Date"></td>
                            <td class="ten" align="left">
                                <select class="form-control" name="currency">
                                    <option value="" selected disabled>--Please select--</option>
                                    <option value="rsd">RSD</option>
                                    <option value="eur">EUR</option>
                                    <option value="usd">USD</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table-resposive">
                        <thead>
                        <tr>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                       {{--    @dd($service) --}}
                            <tr>
                                <td class="eleven">{{ $service['item']['title'] }}</td>
                                <td class="twelve" style="max-width: 250px;">{{ $service['item']['description'] }}</td>
                                <td class="sixteen">{{ number_format($service['item']['price'], 2) }}</td>
                                <td class="thirteen">@if(isset($service['qty'])) {{ $service['qty']}} @endif</td>
                                <td class="fourteen">@if(isset($service['price'])) {{ number_format($service['price'], 2) }} @endif</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" type="button" href="{{ route('service.reduceByOne', $id = $service['item']['id'], ['id' => $service['item']['id'] ]) }}">Reduce Qty</a>
                                    <a class="btn btn-primary btn-sm" type="button" href="{{ route('service.remove', $id = $service['item']['id'], ['id' => $service['item']['id'] ]) }}">Remove</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <th class="something">Total Amount</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="something">{{ number_format($totalPrice, 2) }} </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table-resposive">
                        <thead>
                            <th>Note</th>
                        </thead>
                        <tr>
                            <td class="fifteen"><textarea class="form-control" name="note" cols="30" rows="3" placeholder="Add Some Note..."></textarea>

                        </tr>
                    </table>

            </div>
        </div>
        <div class="container my-5" align="center">
            <button class="btn btn-primary" type="submit">Create Invoice</button>
        </div>
        </form>

        <br>

          </div>
      </div>
      @else
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-4 my-5">
                    <h2 class="my-5" align="center" style="color: #084f5c!important;">No Services</h2>
                    <div class="container my-5" align="center">
                        <h4 class="mb-3">Please Add Service to Invoice</h4>
                        <a href="{{ route('service.index') }}"><button class="btn btn-info">Go to Services</button></a>
                    </div>
                </div>
            </div>

        </div>

        @endif




    <div class="information my-5" style="position: relative; bottom: 0;">
        </div>
    </div>
</section>

@endsection



