<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Contact;
use App\Models\Mainhero;
use App\Models\Popup;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $main = Mainhero::first();
        $case = Cases::all();
        $popup = Popup::first();
        return view('frontpages.index',compact('main','case','popup'));
    }

    public function contact()
    {
        $contact = Contact::first();
//        $main = Mainhero::first();
        return view('frontpages.contact',compact('contact',));
    }
}
