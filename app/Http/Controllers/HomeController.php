<?php

namespace App\Http\Controllers;
use App\Bill;
use App\Company;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $bills =  Bill::all();
        if($bills) {
            $bills->transform(function($bill, $key) {
                $bill->invoice = unserialize($bill->invoice);
                return $bill;
            });
            $companies = Company::all();
            return view('home', ['bills' => $bills, 'companies' => $companies]);
        } else {
            return view('home'); 
        }
        



    }

}
