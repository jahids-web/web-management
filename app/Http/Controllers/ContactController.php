<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactFrom;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    // 

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    // 

    public function AdminStoreContact(Request $request){
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');

    }
    // 

    public function DeleteAbout($id)
    {
        $delete = Contact::find($id)->Delete();
        return Redirect()->back()->with('success', 'About Delete Successfully');
    }

    //

    public function Contact(){
        $contact = 'DB'::table('contacts')->first();
        return view('pages.contact',compact('contact'));
    }
    // 

    public function ContactFrom(Request $request){
        ContactFrom::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success', 'Your Message Send Successfully');
    }
    // 

    public function AdminMassage(){
        $messages = ContactFrom::all();
        return view('admin.contact.message', compact('messages'));
    }
    // 

    public function DeleteMassage($id){
        $delete = ContactFrom::find($id)->Delete();
        return Redirect()->back()->with('success', 'Massage Delete Successfully');
    }
























// end 

}
