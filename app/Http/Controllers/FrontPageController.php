<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mainhero;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $main = Mainhero::first();
        return view('frontpages.index',compact('main'));
    }

    public function contact()
    {
        $contact = Contact::first();
        $main = Mainhero::first();
        return view('frontpages.contact',compact('contact','main'));
    }

    public function contactMessage(){

    }
}
