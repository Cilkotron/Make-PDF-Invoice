<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Brian2694\Toastr\Facades\Toastr;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $owner = Settings::all()->first();
        if($owner) {
            return view('settings.index', ['owner' => $owner]);
        } else {
            return view('settings.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
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
            'contact_person' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pib' => 'required',
            'maticni' => 'required',
            'bank_account' => 'required',
        ]);
        $owner = new Settings();
        $owner->company_name = $request->company_name;
        $owner->contact_person = $request->contact_person;
        $owner->address = $request->address;
        $owner->postcode = $request->postcode;
        $owner->city = $request->city;
        $owner->country = $request->country;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->pib = $request->pib;
        $owner->maticni = $request->maticni;
        $owner->bank_account = $request->bank_account;
        $owner->save();

        Toastr::success('Owner Company Settings Successefully Added!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('settings.index');
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
        //
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
            'contact_person' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pib' => 'required',
            'maticni' => 'required',
            'bank_account' => 'required',
        ]);
        $owner = Settings::all()->first();
        $owner->company_name = $request->company_name;
        $owner->contact_person = $request->contact_person;
        $owner->address = $request->address;
        $owner->postcode = $request->postcode;
        $owner->city = $request->city;
        $owner->country = $request->country;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->pib = $request->pib;
        $owner->maticni = $request->maticni;
        $owner->bank_account = $request->bank_account;
        $owner->save();

        Toastr::success('Owner Company Settings Successefully Updated!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
