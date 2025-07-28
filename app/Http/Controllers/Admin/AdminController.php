<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Mainhero;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {


        $home=Home::first();
        if (!$home){
            $home=new Home();
        }
        $heromain = Mainhero::first();
        return view('admin.heromain',compact('heromain'));

    }
}
