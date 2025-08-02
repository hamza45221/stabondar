<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Contact;
use App\Models\Mainhero;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $main = Mainhero::first();
        $case = Cases::all();
        return view('frontpages.index',compact('main','case'));
    }

    public function contact()
    {
        $contact = Contact::first();
//        $main = Mainhero::first();
        return view('frontpages.contact',compact('contact',));
    }
}
