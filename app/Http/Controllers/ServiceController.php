<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Service;
use App\Invoice;
use App\Company;
use App\Bill;
use App\Settings;
use Illuminate\Support\Facades\Session;
use PDF;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|between:0,99.99',
        ]);
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        Toastr::success('Service Successefully Added!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $service = Service::find($id);
       return view('service.edit',  compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        Toastr::success('Service Successefully Updated!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        Toastr::success('Service Successefully Deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }

    public function getAddToInvoice(Request $request, $id)
    {
       $service =  Service::find($id);
       $oldInvoice = session()->has('invoice') ? session()->get('invoice') : null;
       $invoice = new Invoice($oldInvoice);
       $invoice->add($service, $service->id);

       $request->session()->put('invoice', $invoice);
       return redirect()->route('service.index');
    }

    public function getInvoice() {
        if(!session()->has('invoice')) {
            $owner = Settings::all()->first();
           return view('service.invoice', ['owner' => $owner]);
        }
        $oldInvoice = session()->get('invoice');
        $invoice = new Invoice($oldInvoice);
        $companies = Company::all();
        $owner = Settings::all()->first();
        return view('service.invoice', ['services' => $invoice->items, 'totalPrice' => $invoice->totalPrice, 'companies' => $companies, 'owner'=> $owner]);
    }

    public function getReduceByOne($id) {
        $oldInvoice = session()->has('invoice') ? session()->get('invoice') : null;
        $invoice = new Invoice($oldInvoice);
        $invoice->reduceByOne($id);
        Session::put('invoice', $invoice);
        return redirect()->route('service.invoice');

     }

     public function getRemoveItem($id) {
        $oldInvoice = session()->has('invoice') ? session()->get('invoice') : null;
        $invoice = new Invoice($oldInvoice);
        $invoice->removeItem($id);

        if(!empty($invoice->items)) {
           Session::put('invoice', $invoice);
        } else {
           Session::forget('invoice');
        }
        return redirect()->route('service.invoice');

     }

     public function getBill() {
        if(!session()->has('invoice')) {
           return view('service.invoice');
        }
        $oldInvoice = session()->get('invoice');
        $invoice = new Invoice($oldInvoice);
        $total = $invoice->totalPrice;
        return view('service.invoice', ['total' => $total]);
     }

     public function postBill(Request $request) {
        if(!session()->has('invoice')) {
           return view('service.invoice');
        }
        $oldInvoice = session()->get('invoice');
        $invoice = new Invoice($oldInvoice);

         $bill = new Bill();
         $bill->invoice = json_encode($invoice);
         $bill->invoice_number = $request->input('invoice_number');
         $bill->invoice_date = $request->input('invoice_date');
         $bill->currency = $request->input('currency');
         $bill->note = $request->input('note');
         $bill->company_id = $request->input('company_id');
         $bill->save();
        session()->forget('invoice');
        Toastr::success('Successfully created invoice!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('home');
     }

     public function pdfBill($id) {
        $bill = Bill::find($id);
        $bill->invoice = json_decode($bill->invoice);
        $company = Company::where('id', $bill->company_id)->get()->first();
        $owner = Settings::all()->first();
         // view()->share('bill', $bill);
         $pdf = PDF::loadView('service.bill', [
             'bill' => $bill,
             'company' => $company,
             'items' => $bill->invoice,
             'owner' => $owner
         ]);
         return $pdf->stream('Invoice/'. $bill->invoice_number .'.pdf');


     }

    public function deleteBill($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        Toastr::success('Invoice Successefully Deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }



}
