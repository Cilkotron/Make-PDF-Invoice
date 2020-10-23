<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class NavbarController extends Controller
{
    public function index()
    {
        $messages = Contact::where('status', 0)->get();
        $countMessages = $messages->count();
        return view('partials.navbar', compact('countMessages', $countMessages));
    }
}
