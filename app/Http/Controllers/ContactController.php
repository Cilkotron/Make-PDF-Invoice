<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{

    public function send(Request $request) {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject =  $request->subject;
        $contact->message = $request->message;
        $contact->status = false;
        Notification::route('mail', $contact->email)
        ->notify(new MessageSend());
        $contact->save();
        Toastr::success('Message sent successfully.','Success',["positionClass" => "toast-top-right"]); 
        return redirect()->back();
    }


    public function index()
    {
        $messages = Contact::all();
        return view('contact.index', ['messages' => $messages]);
    }

    public function edit($id)
    {
        $message = Contact::find($id);
        return view('contact.edit',  compact('message'));
    }

    public function status($id) {
        $message = Contact::find($id);
        $message->status = true;
        $message->save();
        Toastr::success('Message is marked as read', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }
    
    public function destroy($id) {
        $message = Contact::find($id);
        $message->delete();
        Toastr::success('Contact message successfully deleted!', 'Success', ["positionClass" =>"toast-top-right"]);
        return redirect()->back();
    }



  

}
