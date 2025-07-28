<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Mainhero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactMessage(Request $request)
    {
        Mail::to('hj1087546@gmail.com')->send(new ContactMail($request->all()));
        return redirect()->back()->with('success', 'Thank you for contacting us...!');
    }


    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact',compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = Contact::first() ?? new Contact();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('upload', ['disk' => 'public']);
            $contact->image = 'storage/' . $path;
        }

        $contact->help_label_1       = $request->help_label_1;
        $contact->help_label_2       = $request->help_label_2;
        $contact->range_label_1      = $request->range_label_1;
        $contact->range_label_2      = $request->range_label_2;
        $contact->details_label_1    = $request->details_label_1;
        $contact->details_label_2    = $request->details_label_2;
        $contact->contact_info_label = $request->contact_info_label;

        $contact->save();
        return back()->with('success', 'Contact saved successfully!');
    }


}
