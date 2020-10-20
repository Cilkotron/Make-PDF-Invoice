<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Faktura</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: DejaVu Sans;
            font-style: normal;
            font-weight: 400;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: 12px;
            color: #495057;
        }
        th {
            font-size: 10px;
            color:   #495057;
            font-weight: bold;
        }

        td {
            font-size: 10px;
            margin-bottom: 50px;
        }

        .invoice_to {
            border: solid #1167b1 1.5px;
            text-align: center;
            font-weight: bold;
        }
        .invoice_from {
            font-weight: bold!important;
        }

        #invoice_details {
            padding: 20px;
            text-align: left;
        }
        #table-head {
            font-weight: 450;
            font-size: 11px!important;
        }
        #description {
            font-size: 10px!important;

        }
        .footer {
            font-size: 9px!important;
            width: 100%;
            text-align: left;
        }

        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #FFF;
            color: #1167b1!important;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        h5 {
            color:  #1167b1;
            font-weight: bolder;
        }
        #specifikacija {
            font-size: 10px!important;
        }

    </style>
</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left">
                <img src="../public/img/logo2.jpg" alt="Some Company Logo" style="height:200px; width: 400px; padding: 20 0 0 20;" />
            </td>
            <td align="right" style="width: 60%; padding: 20 60 0 0;">
                <span class="invoice_from"><b>Some Company Ltd.</b></span> | <span>Lorem ipsum</span>
                <br>
                <span> Some Street 18/2</span>
                <br>
                <span>18000, Nis, Serbia</span>
                <br>
                <span>+381 60 123456789</span>
                <br>
                <span> office@somecompany.com</span>
                <br>
                <span><a href="#">www.somecompany.com</a></span>
                <br>
                <span>VAT: 123456789</span>
                <br>
                <span>Company ID: 98765432</span>
                <br>
                <span>Bank Account: 124-0000456789-91 </span>
            </td>
        </tr>


    </table>
</div>

<div align="center">
    <h5>Invoice {{ $bill->invoice_number }}</h5>
</div>
<br>
<div>
    <table width="80%" align="center">
        <tr>
            <td align="left" id="invoice_details">
                <span>Invoice date: &nbsp; &nbsp; &nbsp; {{ $bill->invoice_date }}</span>
                <br>
                <span>Invoice place: &nbsp; &nbsp; Nis-Mediana</span>
                <br>
                <span>Supplay date: &nbsp; &nbsp; {{ $bill->invoice_date }}</span>
                <br>
                <span>Supplay place:&nbsp; &nbsp; Nis-Mediana</span>
                <br>
            </td>
            <td>
                <br>
                <br>
            </td>
            <td align="right" class="invoice_to">
                <span class="invoice_from">{{ $company[0]['company_name'] }}</span>
                <br>
                <span>{{ $company[0]['address'] }}</span>, <span>{{ $company[0]['city']}}, {{ $company[0]['postcode'] }}, {{ $company[0]['country'] }}</span>
                <br>
                <span>{{ $company[0]['email'] }}</span>, <span>{{ $company[0]['phone'] }}</span>
                <br>
                @if($company[0]['pib'])
                <span>Vat: {{ $company[0]['pib'] }}</span>,
                @endif
                @if($company[0]['maticni'])
                <span>Company ID: {{ $company[0]['maticni'] }}</span>
                @endif

        </td>
        </tr>
    </table>
</div>
<br>
<br>
<br>
<br>
<div>
    <table align="center" width="80%">
        <tr class="my-5">
            <th align="left">Service</th>
            <th align="left">Description</th>
            <th align="right">QTY</th>
            <th align="right">Price</th>
            <th align="right">Total Price</th>

        </tr>
        @foreach($items->items as $item)
        <tr class="my-5">
            <td align="left">{{$item['item']['title'] }}</td>
            <td align="left" id="description">{{$item['item']['description']}}</td>
            <td align="right">{{ number_format($item['qty'], 2) }}</td>
            <td align="right">{{ number_format($item['item']['price'], 2)}}</td>
            <td align="right">{{ number_format($items->totalPrice, 2)}}</td>
        </tr>
        @endforeach

    </table>
</div>
<br>
<br>

<br>
<br>

<div>
    <table width="80%" align="center">
        <tr>
            <td align="right">
                <span class="table-head invoice_from"><b>TOTAL AMOUNT: {{ number_format($items->totalPrice, 2) }} {{ $bill->currency }}</b></span>
                <br>
            </td>
        </tr>
    </table>

</div>
<br>
<br>
<br>

@if($bill->note)
    <div class="table-footer" >
        <table width="80%" align="center">
            <tr>
                <th align="left">Note: </th>
            </tr>
            <tr>
                <td>{{ $bill->note }}</td>
            </tr>
        </table>
    </div>
    @else
    <div class="my-5">
        <table width="80%" align="center">
            <tr>
                <th align="left">Note: </th>
            </tr>
            <tr>
                <td>No Note</td>
            </tr>
        </table>
    </div>
@endif






<div class="information footer" style="position: absolute; bottom: 0;">
    <table width="90%" align="center">
        <tr>
            <td>
            <span>VAT: 123456789</span>&nbsp;|&nbsp;<span>Company ID: 98765432</span>
            <br>
            <span>Bank Account: 124-0000456789-91</span>
        </td>
            <td align="right">
                &copy; {{ date('Y') }} Lorem Ipsum Some Company Ltd.
            </td>
        </tr>
    </table>
</div>

</body>
</html>
