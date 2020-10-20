<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bill;
use Brian2694\Toastr\Facades\Toastr;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'company_name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->postcode = $request->postcode;
        $company->city = $request->city;
        $company->country = $request->country;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->pib = $request->pib;
        $company->maticni = $request->maticni;
        $company->save();

        Toastr::success('Company/Client Account Successefully Added!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('company.index');
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
        $company = Company::find($id);
        return view('company.edit',  compact('company'));
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
            'company_name' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);
        $company = Company::find($id);
        $company->company_name = $request->company_name;
        $company->address = $request->address;
        $company->postcode = $request->postcode;
        $company->city = $request->city;
        $company->country = $request->country;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->pib = $request->pib;
        $company->maticni = $request->maticni;
        $company->save();

        Toastr::success('Company/Client Account Successefully Updated!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        Toastr::success('Company/Client Account Successefully Deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }



    public function getBills() {
        $bills = Bill::all();
        $bills->transform(function($bill, $key) {
            $bill->invoice = unserialize($bill->invoice);
            return $bill;
        });
        return view('home', ['bills' => $bills]);
    }

}
